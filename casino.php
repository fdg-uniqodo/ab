<?php

$game = new Game(
    new \DateTime(),
    new \DateTime('+1 minutes')
);

$game->play();
