<?php

namespace Redirect\Model;

abstract class Manager
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    abstract public function save($object);
    abstract public function update($object);
    abstract public function delete($object);
}