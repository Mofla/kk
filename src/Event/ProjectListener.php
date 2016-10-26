<?php

namespace App\Event;

use Cake\Event\EventListenerInterface;
use Cake\Event\EventManager;
use Cake\Log\Log;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

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
//        debug(count($event->data['event']['users']));
//       die();
        $subject =  $event->data['event'];

        $diariesTable = TableRegistry::get('Diaries');
        $entriesTable = TableRegistry::get('Entries',['contain'=>'Diaries']);

        for ($i = 0; $i < count($subject['users']); $i++) {

            $diarie = $diariesTable->newEntity();
            $diarie->user_id = $subject['users'][$i]['id'];
            $diarie->project_id= $subject['users'][$i]['_joinData']['project_id'];
            $diariesTable->save($diarie);

            $entrie = $entriesTable->newEntity();
            $entrie->diary_id = $diarie->id;
            $entrie->date = Time::now();
            $entrie->content = 'le Projet '.$subject['name'].' viens d\'être crée';
            $entriesTable->save($entrie);
        }


    }
}
