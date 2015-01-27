<?php

namespace Redirect\Model;

use Redirect\Model\Manager;
use Redirect\Model\Redirect;

class RedirectManager extends Manager
{
    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function save($redirect)
    {
        $data = [
            'email_wildcard' => $redirect->getEmailWildcard(),
            'redirect_url' => $redirect->getRedirectUrl(),
        ];

        $this->db->insert('redirects', $data);
    }

    public function update($redirect)
    {

    }

    public function delete($redirect)
    {

    }

    public function getRepository()
    {
        return new RedirectRepository($this->db);
    }
}