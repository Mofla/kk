<?php
namespace App\Controller\Dashboard;

use App\Controller\AppController;
use App\Event\ProjectListener;
use Cake\Event\EventManager;
use Cake\Event\Event;
use Cake\Event\EventList;

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
            'contain' => ['Users', 'Tasks.Users', 'Tasks.States']
        ])->where(['finished' => 0]);


        $this->set(compact('projects'));
        $this->set('_serialize', ['projects']);
    }

    public function medias($id = null)
    {

        $project = $this->Projects->get($id, [
            'contain' => 'Files'
        ]);

        $file = $this->Projects->Files->newEntity();

        if ($this->request->is('post')) {
            #upload de fichier
            $picture = $this->Upload->getFile($this->request->data['upload'],'dashboard', false);
            $this->request->data['upload'] = $picture;

            $file = $this->Projects->Files->patchEntity($file, $this->request->data);
            $file->name = $picture;

            if ($this->Projects->Files->save($file)) {
                return $this->redirect(['action' => 'gestion', $project->id ]);
            }
        }

        $this->set(compact('project', 'file'));
        $this->set('_serialize', ['file']);
    }


    public function deletefile($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $file = $this->Projects->Files->get($id);

        //deletes file
        $this->Upload->deleteImage('dashboard', $file->name);

        if ($this->Projects->Files->delete($file)) {

            $this->Flash->success(__('The file has been deleted.'));
        } else {
            $this->Flash->error(__('The file could not be deleted. Please, try again.'));
        }
        return $this->redirect($this->referer());
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
        $this->Projects->eventManager()->on(new ProjectListener());

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
        $this->Projects->eventManager()->on(new ProjectListener());
        $project = $this->Projects->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->data);
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                if ($project->finished == 1) {
                    $this->redirect(['controller' => 'portfolios/Portfolios', 'action' => 'edit', $project->id, 'prefix' => false]);
                }
                else {
                    return $this->redirect($this->referer());
                }
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
