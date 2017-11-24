<?php

use PHPUnit\Framework\TestCase;
use Src\Itinerary;
use Src\Stop;

class ItineraryTest extends TestCase
{
  public function testItineraryHasHandIn() {
    $handin = new Stop('Valencia');
    $handoff = new Stop('Alcoi');
    $itinerary = new Itinerary($handin, $handoff);

    $this->assertEquals($handin, $itinerary->handin(), 'Itinerary has Hand-in');
  }

  public function testItineraryHasHandOff() {
    $handin = new Stop('Valencia');
    $handoff = new Stop('Alcoi');
    $itinerary = new Itinerary($handin, $handoff);

    $this->assertEquals($handoff, $itinerary->handoff(), 'Itinerary has Hand-off');
  }
}