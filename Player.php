<?php


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
