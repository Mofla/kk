<?php
namespace App\Controller\Connecteursmanager;

use App\Controller\AppController;

/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 */
class RolesController extends AppController
{


    public function add()
    {
        $role = $this->Roles->find('all',['contain' => ['Permissions']]);
        if($this->request->is(['post','patch']))
        {
            $role = $this->Roles->patchEntity($role,$this->request->data);
            $this->Roles->saveAll($role,['deep' => true]);
        }
        $roles = $this->Roles->find('list');
        $permissions = $this->Roles->Permissions->find('list');
        $this->set(compact(['role','roles','permissions']));
    }

}
