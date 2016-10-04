<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\App;


/**
 * Flo Controller
 *
 * @property \App\Model\Table\FloTable $Flo
 */
class FloController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Common');
    }

    public function get()
    {
        $get = $this->Common->getControllers();
        $table = [];
        foreach($get as $controller)
        {
            array_push($table,$this->Common->getActions($controller));
        }

        $rights = $this->Common->getPermissions();
        $this->set('get',$get);
        $this->set('table',$table);
        $this->set('rights',$rights);
    }
}
