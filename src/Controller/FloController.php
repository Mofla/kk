<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\App;
use Cake\Event\Event;


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
        $this->set('get',$get);
        $this->set('table',$table);

    }

    public function geta()
    {
        $geta = $this->Common->getAdminActions();
        $this->set('geta',$geta);
    }
}
