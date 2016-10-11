<?php
namespace App\Controller\forums;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;


class ForumsController extends AppController
{

    public function index()
    {
        $cat = $this->Forums->Categories->find('all')
        ->contain(['Forums.Users', 'Forums.Posts']);

        $this->set(compact('cat'));
    }

    public function view($id = null)
    {
        $forum = $this->Forums->get($id, [
            'contain' => ['Threads.Users','Threads.Posts']
        ]);

        $this->set('forum', $forum);
        $this->set('_serialize', ['forum']);
    }
}
