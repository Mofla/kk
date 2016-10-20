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


    function loadControllerAndActions()
    {
        $path = './src/Controller';
        $dirs = scandir($path);
        $files = [];
        $ignore = [
            '.',
            '..',
            'empty',
            'Component'
        ];
        foreach ($dirs as $dir)
        {
            if ($dir === '.' or $dir === '..') continue;
            if(is_dir($path . '/' . $dir))
            {
                $temp_file = scandir($path . '/' . $dir);
                foreach ($temp_file as $temp)
                {
                    if (!in_array($temp, $ignore) && !in_array($dir,$ignore))
                    {
                        $temp = explode('.',$temp)[0];
                        $files[$dir][] = $temp;
                    }
                }
            }
        }
        return $files;
    }

    public function getControllers()
    {
        $files = $this->loadControllerAndActions();
        return array_keys($files);
    }

    public function getControllerActions($id)
    {
        $files = $this->loadControllerAndActions();
        return $files[$id];
    }

    public function getActions($module,$controller)
    {
        $path = 'App\\Controller\\'.$module.'\\'.$controller;
        $class = new ReflectionClass($path);
        $actions = $class->getMethods(ReflectionMethod::IS_PUBLIC);
        $ignoreList = ['beforeFilter', 'afterFilter', 'initialize'];
        $functions = [''];
        foreach($actions as $action)
        {
            if($action->class == $path &&!in_array($action->name,$ignoreList))
            {
                array_push($functions,$action->name);
            }
        }
        return $functions;
    }


//    public function getControllers()
//    {
//        $files = scandir('./src/Controller');
//        $files = $this->listFolderFiles();
//        $results = [];
//        $ignoreList = [
//            '.',
//            '..',
//            'Component',
//            'PagesController.php',
//            'AppController.php',
//            'ErrorController.php',
//        ];
//        foreach($files as $file){
//            if(!in_array($file, $ignoreList)) {
//                $controller = explode('.', $file)[0];
//                //array_push($results, str_replace('Controller', '', $controller));
//                array_push($results, $controller);
//            }
//        }
//        return $files;
//    }

//    public function getActions($controllerName)
//    {
//        $className = 'App\\Controller\\'.$controllerName;
//        $class = new ReflectionClass($className);
//        $actions = $class->getMethods(ReflectionMethod::IS_PUBLIC);
//
//        $results = [$controllerName => []];
//        $ignoreList = ['beforeFilter', 'afterFilter', 'initialize'];
//        foreach($actions as $action){
//            if($action->class == $className && !in_array($action->name, $ignoreList)){
//                array_push($results[$controllerName], $action->name);
//            }
//        }
//        return $results;
//    }

//    public function getControllerActions($controllerName)
//    {
//        $className = 'App\\Controller\\'.$controllerName;
//        $class = new ReflectionClass($className);
//        $actions = $class->getMethods(ReflectionMethod::IS_PUBLIC);
//
//        $results = [];
//        $ignoreList = ['beforeFilter', 'afterFilter', 'initialize'];
//        foreach($actions as $action){
//            if($action->class == $className && !in_array($action->name, $ignoreList)){
//                array_push($results, $action->name);
//            }
//        }
//        return $results;
//    }


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
}