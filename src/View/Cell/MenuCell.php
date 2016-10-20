<?php
namespace App\View\Cell;

use Cake\View\Cell;

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
        $this->loadModel('Roles');
        $this->loadModel('Connectors');
        $this->loadModel('Users');
        $user = $this->Users->find('all')
            ->where(['id'=> $id]);
        //on récupère l'id de la colonne role_id
        $role= $this->Users->find('all')
            ->select('role_id')
            ->where(['id'=> $id]);
        //on affiche les permissions selon le rôle et si on a demandé qu'il soit afficher dans le menu
        $perm = $this->Permissions->find('all')
            ->contain('Connectors', 'Roles', 'Users')
            ->where(['menu' => 1])
            ->matching('Roles')->where(['Roles.id =' => $role])
            ->matching('Connectors')->where(['Connectors.controller LIKE'=>'users']);

        $gererPerm = $this->Permissions->find('all')
            ->contain('Connectors', 'Roles', 'Users')
            ->where(['menu' => 1])
            ->matching('Roles')->where(['Roles.id =' => $role])
            ->matching('Connectors')->where(['Connectors.controller LIKE'=>'permission%']);
        
        $this->set('_serialize', ['permission']);
        $this->set(compact('perm','i','gererPerm','role', 'user'));
    }
}
