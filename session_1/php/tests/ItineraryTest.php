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

  public function testItineraryCanHaveSameIntermediateStops()
  {
    $firstIntermediateStop = new Stop('Albéric');
    $secondIntermediateStop = new Stop('Xátiva');

    $this->itinerary->addIntermediateStop($firstIntermediateStop);
    $this->itinerary->addIntermediateStop($secondIntermediateStop);

    $this->assertContains($firstIntermediateStop, $this->itinerary->intermediateStops());
    $this->assertContains($secondIntermediateStop, $this->itinerary->intermediateStops());
  }
}