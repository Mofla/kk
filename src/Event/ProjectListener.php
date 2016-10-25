<?php

namespace App\Event;

use Cake\Event\EventListenerInterface;
use Cake\Log\Log;

class ProjectListener implements EventListenerInterface
{
    public function implementedEvents()
    {
        $eventsFired = EventManager::instance()->getEventList();
        $firstEvent = $eventsFired[0];
        var_dump($firstEvent);
        return [
            'Model.Project.add' => 'addproject',
        ];
    }
    public function addproject( $event, $projects)
    {
        Log::write('info',$event,$projects);
        var_dump($event);
        debug.log($event);
        var_dump($event.log);
        die();
    }
}
