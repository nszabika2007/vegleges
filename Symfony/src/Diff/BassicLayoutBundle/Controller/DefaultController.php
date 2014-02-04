<?php

namespace Diff\BassicLayoutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BassicLayoutBundle:Default:index.html.twig', array('name' => $name));
    }
}
