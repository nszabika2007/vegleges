<?php

namespace Diff\UserBundle\Helper;

use Symfony\Component\Security\Core\SecurityContext AS SymfonySecurityContext ; 
use Doctrine\ORM\EntityManager AS EntityManager ;

Class UserHelper
{
	
	/**
	*	Contains Symfony 's Enitity Manager Object added By Dependency Injection.
	*/
	
	Private $EntityManager ;
	
	/**
	*	Contains Symfony 's Security Context Object added by Dependency Injection.
	*/
	
	Private $SecurityContext ;
	
	/**
	*	Contains the Currently Logged in Users Object.
	*/
	
	private $UserObject ;
	
	function __construct( )
	{
		
	}
	
	/**
	*	Sets up the Entity Manager.
	*/
	
	public function set_EntityManager( EntityManager $EntityManager )
	{
		$this -> EntityManager = $EntityManager;
	}
	
	/**
	*	Sets up the Security Context.
	*/
	
	public function Set_SecurityContext( SymfonySecurityContext $SecurityContext )
	{
		$this -> SecurityContext = $SecurityContext;
	}
	
	/**
	*
	*/
	
	public function Build_UserObject( )
	{
		$UserSessionObject = $this -> SecurityContext -> getToken( ) -> getUser( );
		
		$UserID = $UserSessionObject->getId() ;
		
		$this -> UserObject = $this -> EntityManager -> getRepository( 'UserBundle:User' )
													 -> find( $UserID );
	}
	
	public function Get_UserID( )
	{
		if ( empty( $this -> UserObject ) )
			$this -> Build_UserObject( );
		
		return	$this -> UserObject -> getId( );	
	}
	
	public function Get_CurrentUser( )
	{
		$this -> Build_UserObject( );
		
		return $this -> UserObject;
	}
	
}

?>