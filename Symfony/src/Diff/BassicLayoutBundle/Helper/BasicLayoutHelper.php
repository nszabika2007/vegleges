<?php

namespace Diff\BassicLayoutBundle\Helper;

use Symfony\Bundle\FrameworkBundle\Templating\DelegatingEngine AS SymfonyTemplating;
use Symfony\Component\HttpFoundation\Response;
use Diff\UserBundle\Helper\UserHelper AS UserHelper ;

Class BasicLayoutHelper 
{
	
	/**
	*	Contains the Basic Layout Templates Path.
	*/
	
	CONST BASIC_LAYOUT_TEMPLATE_PATH = 'BassicLayoutBundle:BassicLayout:index.html.php';
	
	/**
	*	Contains The Symfony Templateing Object from Dependency Injection . 
	*/
	
	Private $Templating ;
	
	Private $MenuDisplay = TRUE ;
	
	/**
	*	Contains the Custom User Helper Class from Dependency Injection . 
	*/
	
	Private $UserHelper ;
	
	/**
	*	Contains the Bundle:TemplateFolder:Template.html.twig/php .
	*/
	
	Private $TemplatePath = '';
	
	/**
	*	Contains the Template Parameters that are passed on.
	*/
	
	Private $TemplateParamter = Array( ) ;
	
	/**
	*	Contains the Page Title.
	*/
	
	Private $PageTitle = "Diff Projekt";
	
	/**
	*	Contains the Content Of the Template.
	*/
	
	Private $Content;
	
	/**
	*	Contains the currently logged in Users Object.
	*/
	
	Private $UserObject ;
	
	function __construct(  )
	{
		
	}
	
	/**
	*	Sets Up The Symfony Template object.
	*	Loads from Services.yml file.
	*/
	
	public function Set_TemplatingDependency( SymfonyTemplating $Templating )
	{
		$this -> Templating = $Templating ;
	}
	
	/**
	*	Injects the User Helper.
	*/
	
	public function Set_UserHelper( UserHelper $UserHelper )
	{
		$this -> UserHelper = $UserHelper;
	}
	
	/**
	*	@Parameter String $TemplatePath .
	*	Sets Up the Templates Path.
	*/
	
	public function Set_TemplatePath( $TemplatePath )
	{
		$this -> TemplatePath = trim( $TemplatePath );
		
		return $this;
	}
	
	/**
	*	@Parameter Array $TemplateParamter.
	*	Sets Up the Template Parameters.
	*/
	
	public function Set_TemplateParamter( $TemplateParamter )
	{
		$this -> TemplateParamter = $TemplateParamter;
		
		return $this;
	}
	
	public function Set_MenuDisplay( $MenuDisplay )
	{
		$this -> MenuDisplay = $MenuDisplay ;
		
		return $this ;
	}
	
	/**
	*	@Parameter String $PageTitle .
	*	Sets Up the Page Title.
	*/
	
	public function Set_PageTitle( $PageTitle )
	{
		$this -> PageTitle = trim( $PageTitle );
		
		return $this ;
	}
	
	/**
	*	Loads the User Object .
	*/
	
	private function Load_UserObject( )
	{
		$this -> UserObject = $this -> UserHelper -> Get_CurrentUser( );
	}
	
	/**
	*	Generates the Content from the Template Path and passes the parameters to it.
	*/
	
	private function GenerateContent( )
	{
	
		if ( empty( $this -> TemplatePath ) )
			throw new Exception( 'The Template Path Cannot be Empty !' );
	
		$this -> Content = $this -> Templating -> render( 
								$this -> TemplatePath,
								$this -> TemplateParamter
							);
	}
	
	public function Get_RenderdContent( )
	{
		return $this -> Templating -> render( 
										$this :: BASIC_LAYOUT_TEMPLATE_PATH ,
										array(
												'Content'		=> $this -> Content,
												'Title'			=> $this -> PageTitle,
												'UserObject'	=> $this -> UserObject,
												'MenuDisplay'	=> $this -> MenuDisplay
										)
								); 
	}
	
	public function Make_PDFRender( $Content )
	{
		return $this -> Templating -> render( 
										$this :: BASIC_LAYOUT_TEMPLATE_PATH ,
										array(
												'Content'		=> $Content,
												'Title'			=> '',
												'UserObject'	=> $this -> UserObject ,
												'MenuDisplay'	=> FALSE
										)
								); 
	}
	
	/**
	*	Generates the full Template .
	*	First Gets the Content from the passed Template path.
	*	Then loads the Basic Layout Template passing the Content .
	*/
	
	public function GenerateTemplate( )
	{
		try
		{
			$this -> GenerateContent();
		}
		catch( Exception $Error )
		{
			die( $Error -> getMessage() );
		}
		
		$this -> Load_UserObject( );
		
		return new Response( 
								$this -> Get_RenderdContent( )
							);
	}
	
}

?>