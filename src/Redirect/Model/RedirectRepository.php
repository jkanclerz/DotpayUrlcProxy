<?php

namespace Redirect\Model;

use Redirect\Model\Manager;
use Redirect\Model\Redirect;

class RedirectRepository
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $sql = "SELECT * from redirects";

        return $this->db->fetchAll($sql);
    }
}