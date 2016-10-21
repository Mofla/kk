<?php
namespace App\Event;

use Cake\Event\EventListenerInterface;


class TasksEventListener implements EventListenerInterface
{
    public function implementedEvents()
    {
        return [
            'Model.Tasks.edittask' => 'editentries',
        ];
    }
    public function editentries($event, $order )
    {
        debug($event);
        debug($order);
        die();

    }
}