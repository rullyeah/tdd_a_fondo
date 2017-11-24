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
        $this->status = self::PENDING;
    }

    public function id()
    {
        return $this->location;
    }

    public function complete()
    {
        $this->status = self::COMPLETED;
    } 

    public function completed()
    {
        return $this->status == self::COMPLETED;
    }

    public function equals(Stop $other)
    {
        return $this->id() == $other->id();
    }
}
