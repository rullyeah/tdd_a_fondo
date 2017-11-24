<?php

namespace Src;

class Itinerary
{
    private $handin;
    private $handoff;
    private $intermediateStops;

    public function __construct ($handin, $handoff)
    {
        $this->handin = $handin;
        $this->handoff = $handoff;
        $this->intermediateStops = array();
    }

    public function handin()
    { 
        return $this->handin;
    }

    public function handoff()
    { 
        return $this->handoff;
    }

    public function addIntermediateStop($intermediateStop)
    {
        $this->intermediateStops[] = $intermediateStop;
    }

    public function intermediateStops()
    { 
        return $this->intermediateStops;
    }

    private function allStops()
    {
        return array_merge(
            array( $this->handin ), 
            $this->intermediateStops,
            array( $this->handoff )
        );
    }

    public function complete(Stop $stopToComplete)
    {
        foreach ($this->allStops() as $stop) {
            if ($stop->equals($stopToComplete)) {
                $stop->complete();
            }
        }
    }

    public function completed()
    {
        $completed = true;
        foreach ($this->allStops() as $stop){
            $completed = $stop->completed() || $completed; 
        }   

        return $completed;
    }
}