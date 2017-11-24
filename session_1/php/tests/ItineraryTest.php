<?php

use PHPUnit\Framework\TestCase;
use Src\Itinerary;
use Src\Stop;
use Src\StopNotExistsException;

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

  public function testItineraryIsCompletedWhenAllTheStopsAreCompleted()
  {
    $firstIntermediateStop = new Stop('Albéric');
    $secondIntermediateStop = new Stop('Xátiva');
    $this->itinerary->addIntermediateStop($firstIntermediateStop);
    $this->itinerary->addIntermediateStop($secondIntermediateStop);

    $this->itinerary->arriveTo($this->handin);
    $this->itinerary->arriveTo($firstIntermediateStop);
    $this->itinerary->arriveTo($secondIntermediateStop);
    $this->itinerary->arriveTo($this->handoff);
    $completed = $this->itinerary->completed();

    $this->assertTrue($completed);
  }

  public function testTryToCompleteARouteThatIsNotInTheItineraryThrowsException()
  {
    $fakeStop = new Stop('Albéric');

    $this->expectException(StopNotExistsException::class);
    $this->itinerary->arriveTo($fakeStop);
  }

  public function testMustBePossibleConsultNextStopToComplete()
  {
    $firstIntermediateStop = new Stop('Albéric');
    $this->itinerary->addIntermediateStop($firstIntermediateStop);
    $this->itinerary->arriveTo($this->handin);

    $nextStop = $this->itinerary->nextStopToComplete();
    $this->itinerary->arriveTo($firstIntermediateStop);
    $nextStopThen = $this->itinerary->nextStopToComplete();

    $this->assertEquals($firstIntermediateStop, $nextStop);
    $this->assertEquals($this->handoff, $nextStopThen);

  }

}