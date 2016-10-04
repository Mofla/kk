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
        $get = $this->Common->getFrontControllers();
        $this->set('get',$get);
    }
}
