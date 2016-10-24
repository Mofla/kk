<?php

namespace App\Event;

use Cake\Event\EventListenerInterface;
use Cake\Log\Log;

class ProjectsEventListener implements EventListenerInterface
{
    public function implementedEvents()
    {
        return [
            'Model.Project.add' => 'addproject',
        ];
    }
    public function addproject( $event)
    {
        Log::write('info',$event);
        debug.log($event);
        var_dump($event.log);
        die();
    }
}
