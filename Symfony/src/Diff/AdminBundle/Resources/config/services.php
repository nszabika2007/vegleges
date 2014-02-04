<?php

use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Parameter;


$container->setParameter('AdminForm.class', 'Diff\AdminBundle\Form\AdminForm');

$container	-> setDefinition(
							'AdminForm', 
							new Definition('%AdminForm.class%',array(
																		new Reference('form.factory'),
																		new Reference('UserHelper'),
																		new Reference('doctrine.orm.entity_manager'))));