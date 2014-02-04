<?php

use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Parameter;

$container->setParameter('UserHelper.class', 'Diff\UserBundle\Helper\UserHelper');

$container	-> setDefinition(
							'UserHelper', 
							new Definition('%UserHelper.class%')
						) 
			-> addMethodCall(
							'Set_SecurityContext', array(
							new Reference('security.context'),
						))
			-> addMethodCall(
							'set_EntityManager', array(
							new Reference('doctrine.orm.entity_manager'),
						));