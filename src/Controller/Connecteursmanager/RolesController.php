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
        if($this->request->is(['post','patch','put']))
        {
            foreach($this->request->data['permissions']['_ids'] as $id)
            {
                $query = $this->Roles->PermissionsRoles->query();
                $query->insert(['role_id','permission_id'])
                    ->values([
                        'role_id' => $this->request->data['role_id'],
                        'permission_id' => $id
                    ])
                    ->execute();
            }
            return $this->redirect(['controller' => 'Permissions','action' => 'index']);
        }
        $roles = $this->Roles->find('list');
        $permissions = $this->Roles->Permissions->find('list');
        $this->set(compact(['role','roles','permissions']));
    }

}
