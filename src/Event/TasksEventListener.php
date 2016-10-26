<?php
namespace App\Event;

use Cake\Event\EventListenerInterface;
use Cake\Event\EventManager;
use Cake\Log\Log;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;


class TasksEventListener implements EventListenerInterface
{
    public function implementedEvents()
    {
        return [
            'Model.Task.edittask' => 'editentries',
        ];
    }
    public function editentries($event)
    {
        $subject =  $event->data['event'];
debug($subject);
        die();
//        Log::write('info',$event);

        $tasksTable = TableRegistry::get('Tasks');
        $task = $tasksTable->newEntity();

        $task->user_id = $subject['users'][0]['id'];
        $task->project_id= $subject['users'][0]['_joinData']['project_id'];

        $tasksTable->save($task);

    }
}