<?php
namespace App\Controller\Component;
use Cake\Controller\Component;
use ReflectionClass;
use ReflectionMethod;


class CommonComponent extends Component
{
    public function getFrontControllers()
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

    public function getAdminControllers()
    {
        $files = scandir('../src/Controller/Admin/');
        $results = [];
        $ignoreList = [
            '.',
            '..',
            'PagesController.php',
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

    public function getAdminActions($controllerName)
    {
        $className = 'App\\Controller\\Admin\\'.$controllerName;
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

    public function getFrontActions($controllerName)
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
        $Front_controllers = $this->getFrontControllers();

        $resources['Front'] = [];
        foreach($Front_controllers as $controller)
        {
            $Front_actions = $this->getFrontActions($controller);
            //Empty controller Ignore
            if(!empty($Front_actions[$controller])){
                $resources['Front'] = array_merge($resources['Front'], $Front_actions);
            }
        }

        $Admin_controllers = $this->getAdminControllers();
        $resources['Admin'] = [];
        foreach($Admin_controllers as $controller)
        {
            $Admin_actions = $this->getAdminActions($controller);
            //Empty controller Ignore
            if(!empty($Admin_actions[$controller])){
                $resources['Admin'] = array_merge($resources['Admin'], $Admin_actions);
            }
        }
        return $resources;
    }
}