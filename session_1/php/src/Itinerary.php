<?php

namespace Src;

class Itinerary
{
    private $handin;

    public function __construct ($handin)
    {
        $this->handin = $handin;
    }

    public function handin()
    { 
        return $this->handin;
    }
}