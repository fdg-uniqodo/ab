<?php


class Dealer {
    /** @var Deck */
    public $deck;

    /** @var Game  */
    public $game;

    /** @var array */
    public $cardCount;

    /**
     * Dealer constructor.
     * @param Game $game
     */
    public function __construct(Game $game)
    {
        $this->game = $game;
        $this->deck = $game->makeFreshDeck();
        $this->cardCount = [];
    }

    /**
     * @param Player $player
     */
    public function deal(Player $player)
    {
        if ($this->deck->isEmpty()) {
            $this->deck = $this->game->makeFreshDeck();
        }
        $card = $this->deck->getCard();
        $player->accept($card);
        $this->countCard($card);
    }

    public function countCard($card)
    {
        if (!array_key_exists($card, $this->cardCount)) {
            $this->cardCount[$card] = 0;
        }
        $this->cardCount[$card]++;
    }
}
