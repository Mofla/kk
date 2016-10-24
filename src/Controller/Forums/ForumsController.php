<?php
namespace App\Controller\Forums;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\ORM\Query;


class ForumsController extends AppController
{

    public function index()
    {
        $cat = $this->Forums->Categories->find('all')
        ->contain(['Forums.Lasttopicuser','Forums.Users', 'Forums' => function($q) {
            return $q->order(['Forums.sort' => 'ASC']);
        }])
            ->where(['id !=' => 16])
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

    public function search()
    {
        if ($this->request->is(['post'])) {
            $array = [];
            if (!empty($this->request->data['query'])) {
                $push = $this->request->data['query'];
                $pushall = "subject LIKE '%$push%'";
                array_push($array, $pushall);
            }

            $results = $this->Forums->Threads->find('all', [
                'contain' => ['Users','Posts','Lastuserthread']
            ])
                ->where(['Threads.id >' => 0, $array]);

            $this->set(compact('results'));
        }
    }
}
