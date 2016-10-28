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
        
*/
        /*foreach($query as $connector) {
            $registered_module[$connector->module] = [];
            foreach ($connector->permissions as $permission) {
                $registered_module[$permission->name][$connector->module][$connector->controller][] = $connector->function;
                print_r($registered_module);
            }
        } */
        $query = $this->Permissions->find('all')
            ->contain(['Connectors','Roles'])
            ->matching('Roles')->where(['Roles.id =' => $role]);

        $registered= [];
        foreach($query as $permission) {
            foreach ($permission->connectors as $connector) {
                $registered[$connector->module][$connector->controller][] = $connector->function;
            }
        }

        $xmlObject= Xml::build(WWW_ROOT.'menu.xml');
        $parent= [];
        $firstChild = [];
        $secondChild= [];
        foreach ($xmlObject as $xml) {
            $parent[Xml::xml_attribute($xml, 'prefix')][Xml::xml_attribute($xml, 'controller')][]= Xml::xml_attribute($xml, 'action');
            if (Xml::xml_attribute($xml->menuItem, 'prefix') != null) {
               foreach ($xml->menuItem as $xmls){
                 $firstChild[Xml::xml_attribute($xmls, 'prefix')][Xml::xml_attribute($xmls, 'controller')][]= Xml::xml_attribute($xmls, 'action');
                 if (Xml::xml_attribute($xmls->menuItem, 'prefix') != null){
                     foreach ($xmls->menuItem as $xmla){
                         $secondChild[Xml::xml_attribute($xmla, 'prefix')][Xml::xml_attribute($xmla, 'controller')][]= Xml::xml_attribute($xmla, 'action');
                     }
                 }
               }
            }
        }
       // echo '<pre>',print_r($parent),'</pre>';
/*        foreach ($parent as $p){
            echo '<pre>',print_r($p),'</pre>';
        }*/



        $this->set('_serialize', ['permission', 'xmlObject']);
        $this->set(compact('i','role', 'user','query','xmlObject'));

    }

}
