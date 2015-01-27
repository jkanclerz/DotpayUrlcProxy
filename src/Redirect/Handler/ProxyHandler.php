<?php

namespace Redirect\Handler;
use Symfony\Component\HttpFoundation\Request;

class ProxyHandler
{
    protected $browser;
    protected $redirectRepo;
    protected $logger;

    protected $content;

    public function __construct($browser, $redirectRepo, $logger)
    {
        $this->browser = $browser;
        $this->redirectRepo = $redirectRepo;
        $this->logger = $logger;
    }

    public function proxyRequest(Request $request)
    {
        $this->logger->addInfo('============= URLC =============');
        $this->logger->addInfo(var_export($request->request->all(), true));

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
        $this->logger->addInfo('============= URLC - PROXY=============');
        $this->logger->addInfo(var_export($request->request->all(), true));
        $response = $this->browser->post($url, $request->request->all());

        $this->logger->addInfo('============= URLC - APP - RESPONSE =============');
        $this->logger->addInfo(var_export($response->getContent(), true));
        $this->content = $response->getContent();
    }
}