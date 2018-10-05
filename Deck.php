<?php


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
