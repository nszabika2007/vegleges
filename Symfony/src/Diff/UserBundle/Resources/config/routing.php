<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('user_homepage', new Route('user', array(
    '_controller' 		=> 'UserBundle:User:index'
)));

$collection->add('edit_user', new Route('user/edit', array(
    '_controller' 		=> 'UserBundle:User:edit'
)));

return $collection;
