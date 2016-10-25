<?php
namespace App\Controller\Component;
use Cake\Controller\Component;
use Cake\Database\Schema\Table;
use ReflectionClass;
use ReflectionMethod;
use Cake\ORM\TableRegistry;
use Cake\Controller\Component\AuthComponent;


class CommonComponent extends Component
{
    public $components = ['Auth'];

    public function scanEverything($table = false)
    {
        $path = './src/Controller';
        $directories = scandir($path);
        // all things to ignore :
        $ignoreDirectories = ['Component'];
        $ignoreControllers = ['.', '..', 'empty'];
        $ignoreClasses = ['beforeFilter', 'afterFilter', 'initialize'];
        // end ignore
        // array declaration :
        $files = [];
        // end declaration
        foreach($directories as $directory)
        {
            if ($directory === '.' or $directory === '..') continue;

            if(is_dir($path . '/' . $directory) && !in_array($directory,$ignoreDirectories))
            {
                if(!array_key_exists($directory,$files))
                {
                    $files[$directory] = [];
                }
                $controllers = scandir($path . '/' . $directory);
                foreach ($controllers as $controller)
                {
                    if(!in_array($controller,$ignoreControllers))
                    {
                        $controller_renamed = str_replace('Controller.php','',$controller);
                        if(!array_key_exists($controller_renamed,$files[$directory]))
                        {
                            $files[$directory][$controller_renamed] = [];
                        }
                        $className = 'App\\Controller\\'.$directory.'\\'.$controller_renamed.'Controller';
                        $class = new ReflectionClass($className);
                        $actions = $class->getMethods(ReflectionMethod::IS_PUBLIC);
                        foreach($actions as $action){
                            if($action->class == $className && !in_array($action->name, $ignoreClasses)){
                                // if we want actions as keys or not
                                if(!$table)
                                {
                                    $files[$directory][$controller_renamed][] = $action->name;
                                }
                                else
                                {
                                    $table = TableRegistry::get('Connectors');
                                    $permissions = $table->find('all',[
                                        'contain' => 'Permissions',
                                        'conditions' => [
                                            'module' => $directory,
                                            'controller' => $controller_renamed,
                                            'function' => $action->name
                                        ]
                                    ])->first();
                                    ($permissions) ? $id = ['id' => $permissions->permission->id, 'name' => $permissions->permission->name, 'description' => $permissions->permission->description, 'menu' => $permissions->permission->menu] : $id = false;
                                    $files[$directory][$controller_renamed][$action->name] = ["permissions"=>$id,"value"=>false];
                                }
                            }
                        }

                    }

                }

            }
        }
        return $files;
    }

    public function getModules()
    {
        return array_keys($this->scanEverything());
    }

    public function getControllers($module)
    {
        return array_keys($this->scanEverything()[$module]);
    }

    public function getActions($module,$controller)
    {
        return $this->scanEverything()[$module][$controller];
    }


    //Return Front And Admin Controller => actions list
    public function getResources()
    {
        $controllers = $this->getControllers();

        $resources = [];
        foreach($controllers as $controller)
        {
            $actions = $this->getActions($controller);
            //Empty controller Ignore
            if(!empty($actions[$controller])){
                $resources = array_merge($resources, $actions);
            }
        }


        return $resources;
    }

    public function getPermissions()
    {
        $roles = TableRegistry::get('Roles');
        // know user's role
        $rights = $roles->find()->select(['name'])->where(['id' => $this->request->session()->read('Auth.User.role_id')])->first();
        // to do : if no results found -> define as guest
        $rights = $rights->name;

        $connectors = $roles->find()->matching('Permissions.Connectors')->select(['Connectors.controller','Connectors.function'])->where(['Roles.name' => $rights]);
        // let's list all authorized functions
        $actions = [];
        foreach($connectors as $connector)
        {
            // get Controller
            $key = str_replace('Controller','',$connector['_matchingData']['Connectors']->controller);
            // get Action
            $value = $connector['_matchingData']['Connectors']->function;
            // Push a table
            $actions[$key][] = $value;
        }
        // Write allowed actions in actual session
        return $actions;
    }

    public function checkPermissions($controller,$action)
    {
        $session = $this->getPermissions();
        if(array_key_exists($controller,$session) && in_array($action,$session[$controller]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function isAdmin()
    {
        $roles = TableRegistry::get('Roles');
        $rights = $roles->find()->select(['id'])->where(['id' => $this->request->session()->read('Auth.User.role_id')])->first();
        if($rights->id == 1){
            return true;
        }
        else
        {
            return false;
        }
    }

    public function listPermissions()
    {
        $table = TableRegistry::get('Roles');
        $roles= $table->find('all',[
            'contain' => ['Permissions','Permissions.Connectors']
        ]);
        $all_permissions = [];
        $registered_permissions = [];
        $results = [];

        // get all existing modules->controllers->function for each roles
        foreach($roles as $role)
        {
            $all_permissions[$role->name] = $this->scanEverything();
        }

        // get all permissions listed in the db for each role
        foreach($roles as $role)
        {
            //$registered_permissions[$role->name] = [];
            $registered_permissions[$role->name] = $this->scanEverything();
            $users_permissions[$role->name] = $this->scanEverything(true);

            foreach($role->permissions as $permission)
            {
                foreach ($permission->connectors as $connector)
                {
                    if(in_array($connector->function,$registered_permissions[$role->name][$connector->module][$connector->controller]))
                    {
                        // change array with permission_id and true;
                        $users_permissions[$role->name][$connector->module][$connector->controller][$connector->function]['value'] = true;
                    }
                    //$registered_permissions[$role->name][$connector->module][$connector->controller][] = $connector->function;
                }
            }
        }
        return $users_permissions;
    }
}