<?php
namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;


/**
 * Users Controler
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles']
        ];
        $users = $this->paginate($this->Users);

        $promotions = $this->Users->find('all')->distinct('promotion');

        $this->set(compact('users','promotions'));
        $this->set('_serialize', ['users']);


    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Portfolios_users');
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);
        if($id==$this->Auth->User('id') OR $this->Auth->User('role_id')==1) {
            $autoriser= true;
        }
        else{
            $autoriser=false;
        }

        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $portfolios = $this->Portfolios_users->find('all', [
            'contain' => ['Portfolios'],
            'conditions' => ['user_id' => $id ]
        ]);

        $this->set('user', $user);
        $this->set('roles', $roles);
        $this->set('portfolios', $portfolios);
        $this->set('autoriser',$autoriser);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $picture = $this->Upload->getPicture($this->request->data['picture'],'user',$user->id, 300,300, false);
                $this->request->data['picture_url'] = $picture;
                $user = $this->Users->patchEntity($user, $this->request->data);
                $this->Users->save($user);

                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('images', 'erreur','user', 'roles'));
        $this->set('_serialize', ['user']);

    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user'));
        $this->set('roles', $roles);
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        //$this->Auth->allow(['add', 'logout']);
        $this->Auth->allow(['logout']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(['controller' => 'Users', 'action' => 'view',$this->Auth->user('id')]);
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
        $this->set('con',$this->request->params['action']);
        $this->viewBuilder()->layout('login');
    }

    public function logout()
    {
        $this->request->session()->destroy();
        return $this->redirect($this->Auth->logout());
    }
}
