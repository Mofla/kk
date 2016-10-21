<?php
namespace App\Controller\Dashboard;

use App\Controller\AppController;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 */
class ProjectsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */


    public function index()
    {
        $this->viewBuilder()->layout('dashboard');
        $projects = $this->Projects->find('all', [
            'contain' => ['Tasks.Users', 'Tasks.States']
        ]);




        $this->set(compact('projects'));
        $this->set('_serialize', ['projects']);
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $project = $this->Projects->get($id, [
            'contain' => ['Users', 'Diaries', 'Tasks.States', 'FromToTasks']
        ]);
        $to = $this->Projects->FromToTasks->find()->select(['from_id']);
        $endPoints = $this->Projects->Tasks->find()->where(['Tasks.id NOT IN' => $to])->toArray();


        $this->set(compact('endPoints'));
        $this->set('project', $project);
        $this->set('_serialize', ['project']);
    }

    public function gestion($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $project = $this->Projects->get($id, [
            'contain' => ['Users', 'Diaries', 'Tasks.States', 'FromToTasks']
        ]);
        $this->set('project', $project);
        $this->set('_serialize', ['project']);
    }
    public function graph($id = null)
    {

        $project = $this->Projects->get($id, [
            'contain' => ['Users', 'Diaries', 'Tasks.States', 'FromToTasks']
        ]);
        $to = $this->Projects->FromToTasks->find()->select(['from_id']);
        $endPoints = $this->Projects->Tasks->find()->where(['Tasks.id NOT IN' => $to])->toArray();


        $this->set(compact('endPoints'));
        $this->set('project', $project);
        $this->set('_serialize', ['project']);
    }
    public function liste($id = null)
    {

        $project = $this->Projects->get($id, [
            'contain' => ['Users', 'Diaries', 'Tasks.States']
        ]);


        $this->set('project', $project);
        $this->set('_serialize', ['project']);
    }

    public function timeline($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => ['Users', 'Diaries', 'Tasks.States']
        ]);

        $this->set('project', $project);
        $this->set('_serialize', ['project']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $forum = $this->Projects->Forums->newEntity();

        $project = $this->Projects->newEntity();
        if ($this->request->is('post')) {
            $forum = $this->Projects->Forums->patchEntity($forum, $this->request->data);
            $forum->category_id = 16;
            if ($this->Projects->Forums->save($forum)) {
                $this->Flash->success(__('The project has been saved.'));
                $project = $this->Projects->patchEntity($project, $this->request->data);
                $project->forum_id = $forum->id;
                if ($this->Projects->save($project)) {
                    $this->Flash->success(__('The project has been saved.'));

                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The project could not be saved. Please, try again.'));
                }

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The project could not be saved. Please, try again.'));
            }
        }
        $users = $this->Projects->Users->find('list', [
            'keyField' => 'id',
            'valueField' => function($q){
                return $q['firstname'].' '.$q['lastname'];
            }
        ]);
        $this->set(compact('project', 'users'));
        $this->set('_serialize', ['project']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->data);
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'view', $project->id]);
            } else {
                $this->Flash->error(__('The project could not be saved. Please, try again.'));
            }
        }
        $users = $this->Projects->Users->find('list', ['limit' => 200]);
        $this->set(compact('project', 'users'));
        $this->set('_serialize', ['project']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
