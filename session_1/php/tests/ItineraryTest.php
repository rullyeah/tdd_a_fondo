<?php

use PHPUnit\Framework\TestCase;
use Src\Itinerary;

class ItineraryTest extends TestCase
{
  public function testItineraryHasHandIn() {
    $handin = 'Valencia';
    $itinerary = new Itinerary($handin);

    $this->assertEquals($handin, $itinerary->handin(), 'Itinerary has Hand-in');
  }
}