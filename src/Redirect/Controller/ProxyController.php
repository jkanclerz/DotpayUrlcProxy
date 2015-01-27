<?php

namespace Redirect\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Redirect\Form\RedirectParameterType;
use Redirect\Model\Redirect;

class ProxyController
{
    protected $proxy;

    public function __construct($proxy)
    {
        $this->proxy = $proxy;
    }

    public function proxyAction(Request $request)
    {
        $this->proxy->proxyRequest($request);

        return new Response($this->proxy->getContent());
    }
}
