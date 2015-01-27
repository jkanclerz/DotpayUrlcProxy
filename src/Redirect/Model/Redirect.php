<?php

namespace Redirect\Model;

class Redirect
{
    protected $emailWildcard;
    protected $redirectUrl;

    /**
     * Gets the value of emailWildcard.
     *
     * @return mixed
     */
    public function getEmailWildcard()
    {
        return $this->emailWildcard;
    }
    
    /**
     * Sets the value of emailWildcard.
     *
     * @param mixed $emailWildcard the email wildcard 
     *
     * @return self
     */
    public function setEmailWildcard($emailWildcard)
    {
        $this->emailWildcard = $emailWildcard;

        return $this;
    }

    /**
     * Gets the value of redirectUrl.
     *
     * @return mixed
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }
    
    /**
     * Sets the value of redirectUrl.
     *
     * @param mixed $redirectUrl the redirect url 
     *
     * @return self
     */
    public function setRedirectUrl($redirectUrl)
    {
        $this->redirectUrl = $redirectUrl;

        return $this;
    }
}