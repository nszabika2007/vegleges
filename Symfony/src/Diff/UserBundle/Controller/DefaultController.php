<?php

namespace Diff\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('UserBundle:User:index.html.php', array('name' => $name));
    }
}
