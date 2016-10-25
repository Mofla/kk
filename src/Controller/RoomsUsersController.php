<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RoomsUsers Controller
 *
 * @property \App\Model\Table\RoomsUsersTable $RoomsUsers */
class RoomsUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Rooms', 'Users']
        ];
        $roomsUsers = $this->paginate($this->RoomsUsers);

        $this->set(compact('roomsUsers'));
        $this->set('_serialize', ['roomsUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Rooms User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $roomsUser = $this->RoomsUsers->get($id, [
            'contain' => ['Rooms', 'Users']
        ]);

        $this->set('roomsUser', $roomsUser);
        $this->set('_serialize', ['roomsUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $roomsUser = $this->RoomsUsers->newEntity();
        if ($this->request->is('post')) {
            $roomsUser = $this->RoomsUsers->patchEntity($roomsUser, $this->request->data);
            if ($this->RoomsUsers->save($roomsUser)) {
                $this->Flash->success(__('The rooms user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rooms user could not be saved. Please, try again.'));
            }
        }
        $rooms = $this->RoomsUsers->Rooms->find('list', ['limit' => 200]);
        $users = $this->RoomsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('roomsUser', 'rooms', 'users'));
        $this->set('_serialize', ['roomsUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rooms User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $roomsUser = $this->RoomsUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $roomsUser = $this->RoomsUsers->patchEntity($roomsUser, $this->request->data);
            if ($this->RoomsUsers->save($roomsUser)) {
                $this->Flash->success(__('The rooms user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rooms user could not be saved. Please, try again.'));
            }
        }
        $rooms = $this->RoomsUsers->Rooms->find('list', ['limit' => 200]);
        $users = $this->RoomsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('roomsUser', 'rooms', 'users'));
        $this->set('_serialize', ['roomsUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rooms User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $roomsUser = $this->RoomsUsers->get($id);
        if ($this->RoomsUsers->delete($roomsUser)) {
            $this->Flash->success(__('The rooms user has been deleted.'));
        } else {
            $this->Flash->error(__('The rooms user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
