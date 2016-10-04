<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Connectors Controller
 *
 * @property \App\Model\Table\ConnectorsTable $Connectors
 */
class ConnectorsController extends AppController
{



    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Common');
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Permissions']
        ];
        $connectors = $this->paginate($this->Connectors);

        $this->set(compact('connectors'));
        $this->set('_serialize', ['connectors']);
    }

    /**
     * View method
     *
     * @param string|null $id Connector id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $connector = $this->Connectors->get($id, [
            'contain' => ['Permissions']
        ]);

        $this->set('connector', $connector);
        $this->set('_serialize', ['connector']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $connector = $this->Connectors->newEntity();
        if ($this->request->is('post')) {
            $connector = $this->Connectors->patchEntity($connector, $this->request->data);
            if ($this->Connectors->save($connector)) {
                $this->Flash->success(__('The connector has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The connector could not be saved. Please, try again.'));
            }
        }
        $permissions = $this->Connectors->Permissions->find('list', ['limit' => 200]);

        $getcontrol = $this->Common->getControllers();
        $this->set(compact('connector', 'permissions','getcontrol'));
        $this->set('_serialize', ['connector']);
    }

    public function ajaxgetfunctionlist(){
        if ($this->request->is('ajax')) {
            $id = $this->request->data('id');
            $list_actions_controller = $this->Common->getControllerActions($id);
        }

        $this->set(compact('list_actions_controller'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Connector id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $connector = $this->Connectors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $connector = $this->Connectors->patchEntity($connector, $this->request->data);
            if ($this->Connectors->save($connector)) {
                $this->Flash->success(__('The connector has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The connector could not be saved. Please, try again.'));
            }
        }
        $permissions = $this->Connectors->Permissions->find('list', ['limit' => 200]);
        $this->set(compact('connector', 'permissions'));
        $this->set('_serialize', ['connector']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Connector id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $connector = $this->Connectors->get($id);
        if ($this->Connectors->delete($connector)) {
            $this->Flash->success(__('The connector has been deleted.'));
        } else {
            $this->Flash->error(__('The connector could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
