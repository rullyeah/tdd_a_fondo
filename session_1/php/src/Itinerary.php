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
        $this->intermediateStops[$intermediateStop->id()] = $intermediateStop;
    }

    public function intermediateStops()
    { 
        return $this->intermediateStops;
    }

    private function allStops()
    {
        return array_merge(
            array( $this->handin->id() => $this->handin ), 
            $this->intermediateStops,
            array( $this->handoff->id() => $this->handoff )
        );
    }

    public function complete(Stop $stopToComplete)
    {
        $stop = $this->find($stopToComplete);

        if (isset($stop)){
            $stop->complete();
        }
    }

    public function find(Stop $stop)
    {
        $allStops = $this->allStops();
        if ( ! isset($allStops[$stop->id()])) {
            throw new  \Exception();
        }

        return $allStops[$stop->id()];  
    }

    public function completed()
    {
        $completed = true;

        foreach ($this->allStops() as $stop){
            $completed = $stop->completed() && $completed; 
        }   

        return $completed;
    }
}