<?php


class Player {
    /** @var string */
    public $card;

    public function __construct(Person $person)
    {
    }

    /**
     * @param string $card
     */
    public function accept($card) {
        $this->card = $card;
    }
}
