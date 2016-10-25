<?php

namespace App\Event;

use Cake\Event\EventListenerInterface;
use Cake\Event\EventManager;
use Cake\Log\Log;
use Cake\Event\Event;

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
        var_dump($event);
        die();
//        Log::write('info',$event);
//        $eventsFired = EventManager::instance()->getEventList();
//        $firstEvent = $eventsFired[0];
//       debug($firstEvent);
//       ;
    }
}
