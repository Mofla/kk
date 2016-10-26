<?php
namespace App\Controller\Tchat;

use App\Controller\AppController;

/**
 * Rooms Controller
 *
 * @property \App\Model\Table\RoomsTable $Rooms */
class RoomsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $rooms = $this->paginate($this->Rooms,[
            'contain' => ['Users', 'Tchats']
        ]);

        $this->set(compact('rooms'));
        $this->set('_serialize', ['rooms']);
    }

    /**
     * View method
     *
     * @param string|null $id Room id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $room = $this->Rooms->get($id, [
            'contain' => ['Users', 'Tchats']
        ]);

        $this->set('room', $room);
        $this->set('_serialize', ['room']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $room = $this->Rooms->newEntity();
        if ($this->request->is('post')) {
            $room = $this->Rooms->patchEntity($room, $this->request->data);
            if ($this->Rooms->save($room)) {

                return $this->redirect(['action' => 'index']);
            } else {
            }
        }
        $users = $this->Rooms->Users->find('list', ['valueField' => 'username']);
        $this->set(compact('room', 'users'));
        $this->set('_serialize', ['room']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Room id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $room = $this->Rooms->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $room = $this->Rooms->patchEntity($room, $this->request->data);
            if ($this->Rooms->save($room)) {

                return $this->redirect(['action' => 'index']);
            } else {
            }
        }
        $users = $this->Rooms->Users->find('list', ['valueField' => 'username']);
        $this->set(compact('room', 'users'));
        $this->set('_serialize', ['room']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Room id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $room = $this->Rooms->get($id);
        if ($this->Rooms->delete($room)) {
        } else {
        }

        return $this->redirect(['action' => 'index']);
    }
}
