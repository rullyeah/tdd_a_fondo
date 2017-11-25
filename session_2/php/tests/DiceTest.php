<?php 

use PHPUnit\Framework\TestCase;
use Src\Dice\Dice;
use Src\Dice\RollGeneratorStub;

class DiceTest extends TestCase
{
    public function testDiceShouldReturnANumberGreaterThanOrEqualTheMinimum()
    {
        $rollGenerator = new RollGeneratorStub(Dice::MIN_ROLL);
        $dice = new Dice($rollGenerator);

        $theRoll = $dice->roll();

        $this->assertGreaterThanOrEqual(Dice::MIN_ROLL, $theRoll);
    }

    public function testDiceShouldReturnANumberLessThanOrEqualTheMaximum()
    {
        $rollGenerator = new RollGeneratorStub(Dice::MAX_ROLL);
        $dice = new Dice($rollGenerator);

        $theRoll = $dice->roll();

        $this->assertLessThanOrEqual(Dice::MAX_ROLL, $theRoll);
    }
}