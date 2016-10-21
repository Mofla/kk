<?php
namespace App\Controller\Forums;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;


class ForumsController extends AppController
{

    public function index()
    {
        $cat = $this->Forums->Categories->find('all')
        ->contain(['Forums.Lasttopicuser','Forums.Users', 'Forums' => function($q) {
            return $q->order(['Forums.sort' => 'ASC']);
        }])
        ->order(['Categories.sort' => 'ASC']);

        $this->set(compact('cat'));
    }

    public function view($id = null)
    {
        $forum = $this->Forums->get($id, [
            'contain' => ['Threads.Users','Threads.Posts','Threads.Lastuserthread']
        ]);

        $this->set('forum', $forum);
        $this->set('_serialize', ['forum']);
    }
}
