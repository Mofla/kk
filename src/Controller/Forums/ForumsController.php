<?php
namespace App\Controller\forums;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
require_once(ROOT . DS . 'src'. DS . 'Controller'. DS . 'Component' . DS . 'ImageTool.php');
use ImageTool;

/**
 * Forums Controller
 *
 * @property \App\Model\Table\ForumsTable $Forums
 */
class ForumsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $cat = $this->Forums->Categories->find('all')
        ->contain(['Forums.Users', 'Forums.Posts']);

        $this->set(compact('cat'));
    }

    /**
     * View method
     *
     * @param string|null $id Forum id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $forum = $this->Forums->get($id, [
            'contain' => ['Threads.Users','Threads.Posts']
        ]);

        $this->set('forum', $forum);
        $this->set('_serialize', ['forum']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $forum = $this->Forums->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['lasttopic'] = '1';
            $this->request->data['lastuser'] = '2';

            if (!empty($_FILES['icon']) ) {
                $img = $_FILES['icon']['name'];
                $extention = explode('.', $img);
                $rename = str_replace($extention[0], Time::now()->format("Ymdhms"), $img);
                $temp = $_FILES['icon']['tmp_name'];
                $pathimg = WWW_ROOT . "uploads" . DS . "icons" . DS . $rename;
                move_uploaded_file($temp, $pathimg);
               ImageTool::resize(array(
                    'input' => $pathimg,
                    'output' => $pathimg,
                    'width' => 50,
                    'height' => 50,
                   'mode' => 'fit'
                ));
                $this->request->data['icon'] = $rename;
            }

            $forum = $this->Forums->patchEntity($forum, $this->request->data);
            if ($this->Forums->save($forum)) {
                $this->Flash->success(__('The forum has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The forum could not be saved. Please, try again.'));
            }
        }

        $cat = $this->Forums->Categories->find('list');
        $this->set(compact('forum','cat'));
        $this->set('_serialize', ['forum']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Forum id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $forum = $this->Forums->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $forum = $this->Forums->patchEntity($forum, $this->request->data);
            if ($this->Forums->save($forum)) {
                $this->Flash->success(__('The forum has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The forum could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('forum'));
        $this->set('_serialize', ['forum']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Forum id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $forum = $this->Forums->get($id);
        if ($this->Forums->delete($forum)) {
            $this->Flash->success(__('The forum has been deleted.'));
        } else {
            $this->Flash->error(__('The forum could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
