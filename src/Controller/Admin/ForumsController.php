<?php
namespace App\Controller\Admin;;

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
//---------------------------------------------------------------------------------------------FORUMS
    public function addforum()
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
                return $this->redirect(['action' => 'addforum']);
            } else {
                $this->Flash->error(__('The forum could not be saved. Please, try again.'));
            }
        }

        $cat = $this->Forums->Categories->find('list');
        $this->set(compact('forum','cat'));
        $this->set('_serialize', ['forum']);
    }

    public function listforum()
    {
        $forum = $this->Forums->find('all');

        $this->set(compact('forum'));
        $this->set('_serialize', ['forum']);
    }

    public function editforum($id = null)
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

    public function deleteforum($id = null)
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
//---------------------------------------------------------------------------------------------CATEGORIES
    public function listcategory()
    {
        $categories = $this->Forums->Categories->find('all');

        $this->set(compact('categories'));
        $this->set('_serialize', ['categories']);
    }

    public function addcategory()
    {
        $category = $this->Forums->Categories->newEntity();
        if ($this->request->is('post')) {
            $category = $this->Forums->Categories->patchEntity($category, $this->request->data);
            if ($this->Forums->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'addcategory']);
            } else {
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
    }

    public function editcategory($id = null)
    {
        $category = $this->Forums->Categories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Forums->Categories->patchEntity($category, $this->request->data);
            if ($this->Forums->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Forums->Categories->get($id);
        if ($this->Forums->Categories->delete($category)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
