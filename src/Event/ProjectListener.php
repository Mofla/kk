<?php

namespace App\Event;

use Cake\Event\EventListenerInterface;
use Cake\Event\EventManager;
use Cake\Log\Log;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class ProjectListener implements EventListenerInterface
{
    public function implementedEvents()
    {
        return [
            'Model.Project.add' => 'addproject',
        ];
    }
    public function addproject($event)
    {
//        debug($event->data['event']['users'][0]['_joinData']['project_id']);
//        die();
        $subject =  $event->data['event'];

//        Log::write('info',$event);

        $diariesTable = TableRegistry::get('Diaries');
        $diarie = $diariesTable->newEntity();

        $diarie->user_id = $subject['users'][0]['id'];
        $diarie->project_id= $subject['users'][0]['_joinData']['project_id'];

       $diariesTable->save($diarie);

    }
}
