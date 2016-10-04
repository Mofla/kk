<?php
namespace App\Controller\Component;
use Cake\Controller\Component;
use ReflectionClass;
use ReflectionMethod;


class CommonComponent extends Component
{
    public function getControllers()
    {
        $files = scandir('./src/Controller');
        $results = [];
        $ignoreList = [
            '.',
            '..',
            'Component',
            'Admin',
            'PagesController.php',
            'AppController.php',
            'ErrorController.php',
        ];
        foreach($files as $file){
            if(!in_array($file, $ignoreList)) {
                $controller = explode('.', $file)[0];
                //array_push($results, str_replace('Controller', '', $controller));
                array_push($results, $controller);
            }
        }
        return $results;
    }

    public function getActions($controllerName)
    {
        $className = 'App\\Controller\\'.$controllerName;
        $class = new ReflectionClass($className);
        $actions = $class->getMethods(ReflectionMethod::IS_PUBLIC);

        $results = [$controllerName => []];
        $ignoreList = ['beforeFilter', 'afterFilter', 'initialize'];
        foreach($actions as $action){
            if($action->class == $className && !in_array($action->name, $ignoreList)){
                array_push($results[$controllerName], $action->name);
            }
        }
        return $results;
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
        $this->loadModel('Connectors');
        $this->loadModel('Roles');
        $auth = $this->Roles->get($this->Auth->User('role_id'))->select(['name']);
    }
}