<?php

namespace Src;

class Itinerary
{
    private $handin;
    private $handoff;

    public function __construct ($handin, $handoff)
    {
        $this->handin = $handin;
        $this->handoff = $handoff;
    }

    public function handin()
    { 
        return $this->handin;
    }

    public function handoff()
    { 
        return $this->handoff;
    }
}