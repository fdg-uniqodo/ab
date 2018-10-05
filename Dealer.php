<?php


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
        $this->deck = $game->refreshDeck();
    }

    /**
     * @param Player $player
     */
    public function deal(Player $player)
    {
        if ($this->deck->isEmpty()) {
            $this->deck = $this->game->refreshDeck();
        }
        $player->acceptCard($this->deck->getCard());
    }
}
