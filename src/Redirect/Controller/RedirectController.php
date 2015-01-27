<?php

namespace Redirect\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Redirect\Form\RedirectParameterType;
use Redirect\Model\Redirect;

class RedirectController
{
    protected $formFactory;
    protected $twig;
    protected $router;
    protected $manager;

    public function __construct($formFactory, $twig, $router, $manager)
    {
        $this->formFactory = $formFactory;
        $this->twig = $twig;
        $this->router = $router;
        $this->manager = $manager;
    }

    public function indexAction(Request $request)
    {
        $repository = $this->manager->getRepository();
        $redirects = $repository->findAll();

        return new Response(
            $this->twig->render(
                'Redirect/index.html.twig',
                array(
                    'redirects' => $redirects,
                )
            )
        );
    }

    public function createAction(Request $request)
    {
        $redirect = new Redirect();
        $form = $this->getForm($redirect);

        if ($request->isMethod('POST') && $form->handleRequest($request) && $form->isValid()) {
            $this->create($redirect);

            $url = $this->router->generate('redirect_index');

            return new RedirectResponse($url);
        }

        return new Response(
            $this->twig->render(
                'Redirect/create.html.twig',
                array(
                    'form' => $form->createView()
                )
            )
        );
    }

    public function getForm($redirect)
    {
        $formType = new RedirectParameterType();
        $formType->buildForm($this->formFactory->createBuilder('form', $redirect));

        return $formType->getForm();
    }

    protected function create($redirect)
    {
        $this->manager->save($redirect);
    }
}
