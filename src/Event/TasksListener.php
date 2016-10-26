<?php
namespace App\Event;

use Cake\Event\EventListenerInterface;
use Cake\Event\EventManager;
use Cake\Log\Log;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class TasksListener implements EventListenerInterface
{
    public function implementedEvents()
    {
        return [
            'Model.Task.addtask' => 'addtask',
        ];
    }
    public function addtask($event)
    {
        $task =  $event->data['event'];
//        debug($task);
//        die();
        $diariesTable = TableRegistry::get('Diaries');
        $entriesTable = TableRegistry::get('Entries',['contain'=>'Diaries']);
        $project_id = $task['project_id'];
                                                                                    //pour chaque utilisateurs
            for ($i = 0; $i < count($task['users']); $i++) {
                $user_id = $task['users'][$i]['id'];
                                                                                    //recupération de diaries_id
                $query = $diariesTable->find()
                    ->select(['id'])
                    ->where([
                        'user_id' => $user_id,
                        'project_id' => $project_id,
                    ]);
                                                                                     //enregistrement de la nouvelles notes
                $entrie = $entriesTable->newEntity();
                $entrie->diary_id = $query;
                $entrie->date = Time::now();
                $entrie->content = 'Vous avez été assigné à la nouvelle tache : '.$task['name'];
                $entriesTable->save($entrie);
            }
    }
}