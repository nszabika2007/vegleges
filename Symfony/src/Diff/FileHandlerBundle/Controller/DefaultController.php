<?php

namespace Diff\FileHandlerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FileHandlerBundle:Default:index.html.twig', array('name' => $name));
    }
}
