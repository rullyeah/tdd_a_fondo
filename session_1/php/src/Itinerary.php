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

    public function addIntermediateStop(Stop $stop)
    {
        $this->intermediateStops[$stop->id()] = $stop;
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

    public function arriveTo(Stop $stopToComplete)
    {
        $this->checkHandInIsCompletedOrThis($stopToComplete);
        $stop = $this->find($stopToComplete);

        $stop->complete();
    }

    public function checkHandInIsCompletedOrThis($stopToComplete)
    {
        if ($stopToComplete != $this->handin && !$this->handin->completed()){
            throw new InvalidStopException('First Stop Should be Hand-in');
        }
    }

    public function find(Stop $stop)
    {
        $allStops = $this->allStops();

        if ( ! isset($allStops[$stop->id()])) {
            throw new StopNotExistsException('Stop not found');
        }

        return $allStops[$stop->id()];  
    }

    public function completed()
    {
        return $this->nextStopToComplete() == null;
    }

    public function nextStopToComplete()
    {
        foreach ($this->allStops() as $nextStop){
            if (! $nextStop->completed()){
                return $nextStop;
            }
        }

        return null;
    }
}