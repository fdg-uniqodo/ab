<?php


abstract class AbstractPerson implements Person
{
    public $id;

    public function getId()
    {
        return $this->id;
    }
}
