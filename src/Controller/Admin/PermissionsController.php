<?php
namespace App\Controller\Admin;

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
        $controller = $this->Common->getControllers();
        $this->loadModel('Connectors');

        $permission = $this->Permissions->newEntity();
        $connector = $this->Connectors->newEntity();
        if ($this->request->is('post')) {
            $permission = $this->Permissions->patchEntity($permission, $this->request->data);
            if ($this->Permissions->save($permission)) {
                $this->Flash->success(__('The permission has been saved.'));
            $id = $this->Permissions->id;
                $connector->controller = 'controller';
                $connector->function = 'function';
                $connector->permission_id= $id;
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
        $permission = $this->Permissions->get($id, [
            'contain' => ['Roles']
        ]);
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
}
