<?php

namespace Redirect\Form;

use Symfony\Component\Form\FormBuilder;

class RedirectParameterType
{
    protected $builder;

    public function buildForm(FormBuilder $builder, $options = array())
    {
        $this->builder = $builder;
        $builder
            ->add('emailWildcard')
            ->add('redirectUrl')
        ;
    }

    public function getForm()
    {
        return $this->builder->getForm();
    }


}