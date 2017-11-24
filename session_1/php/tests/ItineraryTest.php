<?php

use PHPUnit\Framework\TestCase;
use Src\Itinerary;
use Src\Stop;

class ItineraryTest extends TestCase
{
  private $handin;
  private $handoff;
  private $itinerary;

  public function setUp()
  {
    $this->handin = new Stop('Valencia');
    $this->handoff = new Stop('Alcoi');
    $this->itinerary = new Itinerary($this->handin, $this->handoff);
  }

  public function testItineraryHasHandIn() 
  {
    $this->assertEquals($this->handin, $this->itinerary->handin(), 'Itinerary has Hand-in');
  }

  public function testItineraryHasHandOff() 
  {
    $this->assertEquals($this->handoff, $this->itinerary->handoff(), 'Itinerary has Hand-off');
  }

  public function testItineraryCanHaveAnIntermediateStop()
  {
    $intermediateStop = new Stop('Xátiva');
    $this->itinerary->addIntermediateStop($intermediateStop);

    $this->assertContains($intermediateStop, $this->itinerary->intermediateStops());
  }
}