<?php
namespace App\Controller\ConnecteursManager;

use App\Controller\AppController;
use Cake\Network\Response;
use App\Controller\Component\CommonComponent;

/**
 * Permissions Controller
 *
 * @property \App\Model\Table\PermissionsTable $Permissions
 */
class PermissionsController extends AppController
{
    public $components = ['Common'];
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $permissions = $this->paginate($this->Permissions);

        $this->set(compact('permissions'));
        $this->set('_serialize', ['permissions']);
    }

    /**
     * View method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $permission = $this->Permissions->get($id, [
            'contain' => ['Roles', 'Connectors']
        ]);

        $this->set('permission', $permission);
        $this->set('_serialize', ['permission']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $controller = $this->Common->getModules();
        $this->loadModel('Connectors');

        $permission = $this->Permissions->newEntity();
        $connector = $this->Connectors->newEntity();
        if ($this->request->is('post')) {
            $permission = $this->Permissions->patchEntity($permission, $this->request->data);
            if ($this->Permissions->save($permission)) {
                $id = $permission->id;
                $this->request->data['controller'] = str_replace('Controller','',$this->request->data['controller']);
                $this->request->data['permission_id'] = $id;
                $connector = $this->Connectors->patchEntity($connector, $this->request->data);
                if ($this->Connectors->save($connector)) {
                    $this->Flash->success(__('The permission has been saved.'));

                    return $this->redirect(['action' => 'index']);

                }
            } else {
                $this->Flash->error(__('The permission could not be saved. Please, try again.'));
            }
        }
        $roles = $this->Permissions->Roles->find('list', ['limit' => 200]);
        $this->set(compact('permission', 'roles','controller', 'list_actions_controller'));
        $this->set('_serialize', ['permission']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $controller = $this->Common->getControllers();
        $this->loadModel('Connectors');

        $permission = $this->Permissions->get($id, [
            'contain' => ['Roles']
        ]);
        $connector = $this->Connectors->find('all')
            ->contain('Permissions')
            ->where(['permission_id =' => $id]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $permission = $this->Permissions->patchEntity($permission, $this->request->data);
            if ($this->Permissions->save($permission)) {
                    $this->Flash->success(__('The permission has been saved.'));

                    return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The permission could not be saved. Please, try again.'));
            }
        }
        $roles = $this->Permissions->Roles->find('list', ['limit' => 200]);
        $this->set(compact('permission', 'roles'));
        $this->set('_serialize', ['permission']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $permission = $this->Permissions->get($id);
        $this->loadModel('Permissions_roles');
        //on regarde si la permission est lié à un rôle
        $count = $this->Permissions_roles->find('all')
            ->select('role_id')
            ->where(['permission_id' => $id])
            ->count();
        if ($count == 0) {
            if ($this->Permissions->delete($permission)) {
                $this->Flash->success(__('The permissions has been deleted.'));
            } else {
                $this->Flash->error(__('The permissions could not be deleted. Please, try again.'));
            }
        }else{
            $this->Flash->error(__('Un rôle est lié à la permission que vous souhaitez supprimer'));
          
        }
        return $this->redirect(['action' => 'index']);
    }

    public function addd()
    {
//        $permissions = $this->Permissions->Connectors->find('all',[
//            'contain' => [
//                'Permissions','Permissions.Roles'
//            ]
//        ]);
        if($this->request->is('post'))
        {
            // j'enregistre la permission :
            $permissions = $this->Permissions->newEntity();
            // je permets de
            $data = [
                'name' => $this->request->data['name'],
                'description' => $this->request->data['description'],
                'menu' => $this->request->data['menu']
            ];
            $permissions = $this->Permissions->patchEntity($permissions,$data);
            if($this->Permissions->save($permissions))
            {
                unset($this->request->data['name']);
                unset($this->request->data['description']);
                unset($this->request->data['menu']);
                $permission_id = $permissions->id;
                $data = [];
                foreach ($this->request->data as $key => $value)
                {
                    $explode = explode('-',$key);
                    $insert = [
                        'module' => $explode[0],
                        'controller' => $explode[1],
                        'function' => $explode[2],
                        'permission_id' => $permission_id
                    ];
                    $data[] = $insert;
                }
                $connectors = $this->Permissions->Connectors->newEntities($data);
                if($this->Permissions->Connectors->saveMany($connectors))
                {
                    $this->Flash->success('Nice');
                    return $this->redirect(['action' => 'ddd',$permission_id]);
                }
            }

        }

        $permissions = $this->Common->scanEverything();

        $this->set(compact('permissions'));
    }

    public function ddd($id=null)
    {
        $permissions = $this->Permissions->get($id,[
            'contain' => ['Roles']
        ]);
        if($this->request->is('post'))
        {
            $data = [
                'permission_id' => $id
            ];
            $data = array_merge($data,$this->request->data);
            debug($data);
            // magouiller en rajoutant les infos des permissions dans la request
            $permissions = $this->Permissions->patchEntity($permissions,$data);
            if($this->Permissions->save($permissions))
            {
                $this->Flash->success('Nice');
            }
        }
        $roles = $this->Permissions->Roles->find('list');
        $this->set(compact(['permissions','permissionsRoles','roles']));
    }
}
