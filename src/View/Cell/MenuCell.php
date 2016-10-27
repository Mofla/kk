<?php
namespace App\View\Cell;

use Cake\Core\App;
use App\Model\Entity\Connector;
use Cake\View\Cell;
use Cake\Utility\Xml;

/**
 * Menu cell
 */
class MenuCell extends Cell
{
    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */

    public function display($id)
    {

        $i= $id;
        $this->loadModel('Permissions');
        $this->loadModel('Connectors');
        $this->loadModel('Roles');
        $this->loadModel('Users');
        $user = $this->Users->find('all')
            ->where(['id'=> $id]);
        //on récupère l'id de la colonne role_id
        $role= $this->Users->find('all')
            ->select('role_id')
            ->where(['id'=> $id]);

        /*$query = $this->Connectors->find('all')
            ->contain(['Permissions','Permissions.Roles'])
            ->matching('Permissions')->where(['menu'=> 1])
            ->matching('Permissions.Roles')->where(['Roles.id =' => $role]);

        foreach($query as $connector) {
            $registered_module[$connector->module] = [];
            foreach ($connector->permissions as $permission) {
                $registered_module[$permission->name][$connector->module][$connector->controller][] = $connector->function;
                print_r($registered_module);
            }
        }*/
        /*$query = $this->Permissions->find('all')
            ->contain(['Connectors','Roles'])
            ->where(['menu'=> 1])
            ->matching('Roles')->where(['Roles.id =' => $role]);

        foreach($query as $permission) {
            $registered_module[$permission->name] = [];
            foreach ($permission->connectors as $connector) {
                $registered_module[$permission->name][$connector->module][$connector->controller][] = $connector->function;
                print_r($registered_module);
            }
        }*/
        $xmlObject= Xml::build(WWW_ROOT.'menu.xml');
        $this->set('_serialize', ['permission', 'xmlObject']);
        $this->set(compact('i','role', 'user','query','modules','xmlObject'));

    }

}
