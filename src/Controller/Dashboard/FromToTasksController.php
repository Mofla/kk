<?php
namespace App\Controller\Dashboard;

use App\Controller\AppController;

/**
 * FromToTasks Controller
 *
 * @property \App\Model\Table\FromToTasksTable $FromToTasks
 */
class FromToTasksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projects', 'Froms', 'Tos']
        ];
        $fromToTasks = $this->paginate($this->FromToTasks);

        $this->set(compact('fromToTasks'));
        $this->set('_serialize', ['fromToTasks']);
    }

    /**
     * View method
     *
     * @param string|null $id From To Task id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fromToTask = $this->FromToTasks->get($id, [
            'contain' => ['Projects', 'Froms', 'Tos']
        ]);

        $this->set('fromToTask', $fromToTask);
        $this->set('_serialize', ['fromToTask']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->autoRender = false;
        $fromToTask = $this->FromToTasks->newEntity();
        if ($this->request->is('post')) {
            $fromToTask = $this->FromToTasks->patchEntity($fromToTask, $this->request->data);
            if ($this->FromToTasks->save($fromToTask)) {
                $this->Flash->success(__('The from to task has been saved.'));

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('The from to task could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('fromToTask', 'projects', 'froms', 'tos'));
        $this->set('_serialize', ['fromToTask']);
    }

    /**
     * Edit method
     *
     * @param string|null $id From To Task id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fromToTask = $this->FromToTasks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fromToTask = $this->FromToTasks->patchEntity($fromToTask, $this->request->data);
            if ($this->FromToTasks->save($fromToTask)) {
                $this->Flash->success(__('The from to task has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The from to task could not be saved. Please, try again.'));
            }
        }
        $projects = $this->FromToTasks->Projects->find('list', ['limit' => 200]);
        $froms = $this->FromToTasks->Froms->find('list', ['limit' => 200]);
        $tos = $this->FromToTasks->Tos->find('list', ['limit' => 200]);
        $this->set(compact('fromToTask', 'projects', 'froms', 'tos'));
        $this->set('_serialize', ['fromToTask']);
    }

    /**
     * Delete method
     *
     * @param string|null $id From To Task id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fromToTask = $this->FromToTasks->get($id);
        if ($this->FromToTasks->delete($fromToTask)) {
            $this->Flash->success(__('The from to task has been deleted.'));
        } else {
            $this->Flash->error(__('The from to task could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function deleteajax()
    {
        $this->request->allowMethod(['post', 'delete']);
        $from = $this->request->data('from_id');
        $to = $this->request->data('to_id');

        $toDelete = $this->FromToTasks->find()->where(['from_id' => $from])->where(['to_id' => $to])->first();


        $fromToTask = $this->FromToTasks->get($toDelete->id);
        if ($this->FromToTasks->delete($fromToTask)) {
            $this->Flash->success(__('The from to task has been deleted.'));
        } else {
            $this->Flash->error(__('The from to task could not be deleted. Please, try again.'));
        }

    }
}
