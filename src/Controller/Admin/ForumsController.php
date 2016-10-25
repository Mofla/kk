<?php
namespace App\Controller\Admin;

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
        $cat = $this->Forums->Categories->find('all')
        ->contain('Forums')
            ->where(['id !=' => 16]);

        $this->set(compact('cat'));
    }

    public function editforum()
    {
        $forum = $this->Forums->find('all');

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

        return $this->redirect($this->referer());
    }

    public function ajaxeditforum()
    {
        $this->autoRender = false ;
        $table = $this->Forums;
        if ($this->request->is(['post'])) {
            $id = $this->request->data['id'];
            $category = $this->Forums->find()
                ->where(['id' => $id])->first();
            $categories = $this->request->data['title'];
            $category->name = $categories;
            $table->save($category);
        }
    }
    public function saveorderforum()
    {
        $this->autoRender = false;

        if ($this->request->data) {
            $order = $this->request->data['id'];
            $exp = explode(",", $order);
            $number = null ;
            foreach ($exp as $item){
                $number++ ;
                $query = $this->Forums->query();
                $query->update()
                    ->set(['sort' => $number])
                    ->where(['id' => $item])
                    ->execute();
            }
        }
        $this->set(compact('order'));
    }
//---------------------------------------------------------------------------------------------CATEGORIES
    public function listcategory()
    {
        $categories = $this->Forums->Categories->find('all')->where(['id !=' => 16]);
        $category = $this->Forums->Categories->newEntity();

        $this->set(compact('categories','category'));
        $this->set('_serialize', ['categories']);
    }

    public function saveordercategory()
    {
        $this->autoRender = false;

        if ($this->request->data) {
    $order = $this->request->data['id'];
            $exp = explode(",", $order);
            $number = null ;
            foreach ($exp as $item){
                $number++ ;
             $query = $this->Forums->Categories->query();
             $query->update()
                 ->set(['sort' => $number])
                 ->where(['id' => $item])
                 ->execute();
            }
        }
        $this->set(compact('order'));
    }

    public function addcategory()
    {
        $category = $this->Forums->Categories->newEntity();
        $catsort = $this->Forums->Categories->find()
            ->select('sort')
            ->order(['sort' => 'DESC'])
            ->first();
        $csort = $catsort->sort + 1;

        if ($this->request->is('post')) {
            $this->request->data['sort'] = $csort;
            $category = $this->Forums->Categories->patchEntity($category, $this->request->data);
            if ($this->Forums->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'listcategory']);
            } else {
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
    }

    public function ajaxeditcategory()
    {
        $this->autoRender = false ;
        $table = $this->Forums->Categories;
        if ($this->request->is(['post'])) {
            $id = $this->request->data['id'];
            $category = $this->Forums->Categories->find()
                ->where(['id' => $id])->first();
            $categories = $this->request->data['title'];
            $category->name = $categories;
            $table->save($category);
        }
    }

    public function deletecategory($id = null)
{
    $this->request->allowMethod(['post', 'delete']);
    $category = $this->Forums->Categories->get($id);
    if ($this->Forums->Categories->delete($category)) {
        $this->Flash->success(__('The category has been deleted.'));
    } else {
        $this->Flash->error(__('The category could not be deleted. Please, try again.'));
    }

    return $this->redirect(['controller' => 'Forums','action' => 'listcategory']);
}
}
