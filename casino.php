<?php

$game = new Game(
    new \DateTime(),
    new \DateTime('+1 minutes')
);

while ($game->inProgress()) {
    $game->play(new Guest());
}

var_dump($game->players);
