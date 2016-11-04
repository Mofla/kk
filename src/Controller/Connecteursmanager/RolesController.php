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


//    public function add()
//    {
//        $role = $this->Roles->find('all',['contain' => ['Permissions']]);
//        if($this->request->is(['post','patch','put']))
//        {
//            foreach($this->request->data['permissions']['_ids'] as $id)
//            {
//                $query = $this->Roles->PermissionsRoles->query();
//                $query->insert(['role_id','permission_id'])
//                    ->values([
//                        'role_id' => $this->request->data['role_id'],
//                        'permission_id' => $id
//                    ])
//                    ->execute();
//            }
//            return $this->redirect(['controller' => 'Permissions','action' => 'index']);
//        }
//        $roles = $this->Roles->find('list');
//        $permissions = $this->Roles->Permissions->find('list');
//        $this->set(compact(['role','roles','permissions']));
//    }

    public function add()
    {
        if(isset($this->request->data['role_id']))
        {
            $roles = $this->Roles->get($this->request->data['role_id'],[
                'contain' => ['Permissions']
            ]);
            $roles = $this->Roles->patchEntity($roles,$this->request->data);
            if($this->Roles->save($roles))
            {
                $this->Flash->success('Les autorisations ont bien été associées.');
                return $this->redirect(['controller' => 'Permissions','action' => 'index']);
            }
            else {
                $this->Flash->error('Les autorisations n\'ont pas été associées.');
            }
        }
        $role = $this->Roles->find('list');
        $this->set(compact('role','permissions'));
    }

    public function roles(){
        if ($this->request->is('ajax')) {
            $id = $this->request->data('id');
            $permissions = $this->Roles->get($id,['contain' => ['Permissions']]);
            $list = $this->Roles->Permissions->find('list',[
                'contain' => ['Roles']
            ]);
        }
        $this->set(compact('permissions','list','id'));
    }

}
