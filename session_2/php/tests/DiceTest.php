<?php 

use PHPUnit\Framework\TestCase;
use Src\Dice\Dice;

class DiceTest extends TestCase
{
    public function testDiceShouldReturnANumberGreaterThanOrEqualTheMinimum()
    {
        $dice = new Dice;
        $this->assertGreaterThanOrEqual(Dice::MIN_ROLL, $dice->roll());
    }
}