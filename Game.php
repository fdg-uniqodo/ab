<?php

class Game
{
    /** @var Player[] */
    public $players = [];

    /** @var Dealer */
    public $dealer;

//    public $startCondition;
//
//    public $endCondition;

    /**
     * @var array
     */
    public $distribution = [
        'A' => 0.5,
        'B' => 0.5,
    ];

//    public function __construct($startCondition, $endCondition)
//    {
//        $this->startCondition = $startCondition;
//        $this->endCondition = $endCondition;
//    }

    public function play()
    {
        while ($this->inProgress()) {
            // @todo tune distribution here
            $this->join(new Player());
        }
    }

    /**
     * @return bool
     */
    public function inProgress()
    {
        return true;
    }

    /**
     * @param Player $player
     */
    public function join(Player $player)
    {
        $this->dealer->deal($player);
        $this->players[] = $player;
    }

    /**
     * @return Deck
     */
    public function refreshDeck()
    {
        return new Deck($this->distribution);
    }
}


//interface Condition
//{
//    public function met($input);
//}
//
//class StartCondition
//{
//
//}
//
//class EndCondition
//{
//
//}
