<?php

namespace Src;

class Stop
{
    const COMPLETED = true;
    const PENDING = false;

    private $location;
    private $status;

    public function __construct ($location)
    {
        $this->location = $location;
        $this->completed = self::PENDING;
    }

    public function complete()
    {
        $this->completed = self::COMPLETED;
    } 

    public function completed()
    {
        return $this->completed == self::COMPLETED;
    }

    public function equals(self $otherStop )
    {
        return $this->location == $otherStop->location;
    }

    public function id()
    {
        return $this->location;
    }
}
