<?php

use PHPUnit\Framework\TestCase;
use Src\Itinerary;
use Src\Stop;

class ItineraryTest extends TestCase
{
  public function testItineraryHasHandIn() {
    $handin = new Stop('Valencia');
    $itinerary = new Itinerary($handin);

    $this->assertEquals($handin, $itinerary->handin(), 'Itinerary has Hand-in');
  }
}