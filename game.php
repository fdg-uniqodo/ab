<?php

class Game
{
    /** @var Player[] */
    public $players = [];

    /** @var Dealer */
    public $dealer;

    /**
     * @var array
     */
    public $distribution = [
        'A' => 0.5,
        'B' => 0.5,
    ];

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
    public function getNewDeck()
    {
        return new Deck($this->distribution);
    }
}

class Deck {

    const SIZE = 10;

    /** @var array */
    public $cards = [];

    public function __construct($distribution)
    {
        foreach ($distribution as $suit => $percent) {
            $n = self::SIZE * $percent;
            for ($c = 0; $c < $n; $c++) {
                $this->cards[] = $suit;
            }
        }
    }

    /**
     * @return string
     */
    public function getCard()
    {
        return array_pop($this->cards);
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->cards);
    }
}

class Dealer {
    /** @var Deck */
    public $deck;

    /** @var Game  */
    public $game;

    /**
     * Dealer constructor.
     * @param Game $game
     */
    public function __construct(Game $game)
    {
        $this->game = $game;
        $this->deck = $game->getNewDeck();
    }

    /**
     * @param Player $player
     */
    public function deal(Player $player)
    {
        if ($this->deck->isEmpty()) {
            $this->deck = $this->game->getNewDeck();
        }
        $player->acceptCard($this->deck->getCard());
    }
}

class Player {
    /** @var string */
    public $card;

    /**
     * @param string $card
     */
    public function acceptCard($card) {
        $this->card = $card;
    }
}
