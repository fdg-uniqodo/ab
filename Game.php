<?php

class Game
{
    /** @var Player[] */
    public $players = [];

    /** @var Dealer */
    public $dealer;

    /** @var DateTime */
    public $endCondition;

    /** @var DateTime */
    public $startCondition;

    /** @var array */
    public $distribution = [
        'A' => 0.5,
        'B' => 0.5,
    ];

    /**
     * @param DateTime $startCondition
     * @param DateTime $endCondition
     */
    public function __construct(DateTime $startCondition, DateTime $endCondition)
    {
        $this->startCondition = $startCondition;
        $this->endCondition = $endCondition;
        $this->dealer = new Dealer($this);
    }

    public function play(Guest $guest)
    {
        if ($this->inProgress()) {
            $this->join(new Player($guest));
        } else {
            throw new RuntimeException('Game is not currently in progress');
        }
    }

    /**
     * @return bool
     */
    public function inProgress()
    {
        $now = new DateTime();
        return  $now >= $this->startCondition && $now <= $this->endCondition;
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
    public function makeFreshDeck()
    {
        $newDeckDistribution = $this->distribution;

//        // @todo here is where the dynamic distribution correction could happen
//        $count = $this->dealer->cardCount;
//        array_walk($newDeckDistribution, function ($val, $key) {
//        });

        return new Deck($newDeckDistribution);
    }
}
