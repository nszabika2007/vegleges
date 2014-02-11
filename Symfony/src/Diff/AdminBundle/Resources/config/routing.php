<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('admin_homepage', new Route('admin', array(
    '_controller' 	=> 'AdminBundle:Admin:index'
)));
$collection->add('admin_global_submit', new Route('global/submit/{UserID}', array(
    '_controller' 	=> 'AdminBundle:Admin:submit'
)));


return $collection;
