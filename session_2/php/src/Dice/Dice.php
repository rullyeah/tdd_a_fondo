<?php
namespace Src\Dice;

class Dice
{
    const MIN_ROLL = 1;
    const MAX_ROLL = 6;

    private $rollGenerator;

    public function __construct(RollGeneratorInterface $rollGenerator)
    {
        $this->rollGenerator = $rollGenerator;
    }

    public function roll()
    {
        return $this->rollGenerator->execute();
    }
}