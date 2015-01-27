<?php

namespace Redirect\Handler;
use Symfony\Component\HttpFoundation\Request;

class ProxyHandler
{
    protected $browser;
    protected $redirectRepo;

    protected $content;

    public function __construct($browser, $redirectRepo)
    {
        $this->browser = $browser;
        $this->redirectRepo = $redirectRepo;
    }

    public function proxyRequest(Request $request)
    {
        $wildCards = $this->redirectRepo->findAll();
        $email = $request->get('email');

        $domainName = substr(strchr($email, '@'), 1);
        foreach ($wildCards as $redirect) {
            
            $domain = substr(strchr($redirect['email_wildcard'], '@'), 1);
            if ($domainName == $domain) {
                $this->proxy($request, $redirect['redirect_url']);
            }
        }
    }

    public function getContent()
    {
        return $this->content;
    }

    protected function proxy($request, $url)
    {
        $response = $this->browser->post($url, $request->request->all());

        $this->content = $response->getContent();
    }
}