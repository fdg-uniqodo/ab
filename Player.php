<?php


class Player extends AbstractPerson {

    /** @var string */
    public $card;

    /**
     * @param Person $person
     */
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
