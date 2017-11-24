<?php

namespace Src;

class Stop
{
    private $location;
    private $completed;

    public function __construct ($location)
    {
        $this->location = $location;
        $this->completed = false;
    }

    public function complete()
    {
        $this->completed = true;
    } 

    public function completed()
    {
        return $this->completed;
    }
}