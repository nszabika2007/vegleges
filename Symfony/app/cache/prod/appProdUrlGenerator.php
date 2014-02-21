<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appProdUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRoutes = array(
        'stats_homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Diff\\StatsBundle\\Controller\\StatsController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/stats',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'order_trip_homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Diff\\OrderTripBundle\\Controller\\OrderController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/orders',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'view_order' => array (  0 =>   array (    0 => 'OrderID',    1 => 'Finalize',  ),  1 =>   array (    '_controller' => 'Diff\\OrderTripBundle\\Controller\\OrderController::viewAction',    'Finalize' => '',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'Finalize',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'OrderID',    ),    2 =>     array (      0 => 'text',      1 => '/orders/view',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'view_trip' => array (  0 =>   array (    0 => 'TripID',    1 => 'Finalize',  ),  1 =>   array (    '_controller' => 'Diff\\OrderTripBundle\\Controller\\TripController::viewAction',    'Finalize' => '',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'Finalize',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'TripID',    ),    2 =>     array (      0 => 'text',      1 => '/trips/view',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'trip_homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Diff\\OrderTripBundle\\Controller\\TripController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/trips',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'trip_upload' => array (  0 =>   array (    0 => 'TripID',  ),  1 =>   array (    '_controller' => 'Diff\\OrderTripBundle\\Controller\\TripController::uploadAction',    'TripID' => 0,  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'TripID',    ),    1 =>     array (      0 => 'text',      1 => '/trips/upload',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'finalize_trip' => array (  0 =>   array (    0 => 'TripID',  ),  1 =>   array (    '_controller' => 'Diff\\OrderTripBundle\\Controller\\TripController::finalizeTripAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'TripID',    ),    1 =>     array (      0 => 'text',      1 => '/trips/finalize',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'submit_order_bill' => array (  0 =>   array (    0 => 'OrderID',  ),  1 =>   array (    '_controller' => 'Diff\\OrderTripBundle\\Controller\\OrderController::OrderBillAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'OrderID',    ),    1 =>     array (      0 => 'text',      1 => '/orders/bill',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'trip_cerere' => array (  0 =>   array (    0 => 'TripID',  ),  1 =>   array (    '_controller' => 'Diff\\OrderTripBundle\\Controller\\TripController::cerereAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'TripID',    ),    1 =>     array (      0 => 'text',      1 => '/trip/cerere',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'trip_declaratie' => array (  0 =>   array (    0 => 'TripID',  ),  1 =>   array (    '_controller' => 'Diff\\OrderTripBundle\\Controller\\TripController::declaratieAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'TripID',    ),    1 =>     array (      0 => 'text',      1 => '/trip/declaratie',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'logout_page' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Diff\\LoginBundle\\Controller\\LoginController::logoutAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/logoutt',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'trip_user_stats' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Diff\\OrderTripBundle\\Controller\\OrderTripUserStatsController::tripAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/usage/trips',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'order_user_stats' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Diff\\OrderTripBundle\\Controller\\OrderTripUserStatsController::orderAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/usage/orders',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'trip_delete' => array (  0 =>   array (    0 => 'TripID',  ),  1 =>   array (    '_controller' => 'Diff\\OrderTripBundle\\Controller\\TripController::deleteAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'TripID',    ),    1 =>     array (      0 => 'text',      1 => '/trips/delete',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'order_delete' => array (  0 =>   array (    0 => 'OrderID',  ),  1 =>   array (    '_controller' => 'Diff\\OrderTripBundle\\Controller\\OrderController::deleteAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'OrderID',    ),    1 =>     array (      0 => 'text',      1 => '/orders/delete',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'product_delete' => array (  0 =>   array (    0 => 'ProductID',    1 => 'OrderID',  ),  1 =>   array (    '_controller' => 'Diff\\OrderTripBundle\\Controller\\OrderController::deleteProductAction',    'Finalize' => '',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'OrderID',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'ProductID',    ),    2 =>     array (      0 => 'text',      1 => '/orders/deleteProduct',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'bill_delete' => array (  0 =>   array (    0 => 'Type',    1 => 'ID',    2 => 'BillID',  ),  1 =>   array (    '_controller' => 'Diff\\OrderTripBundle\\Controller\\BillController::deleteAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'BillID',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'ID',    ),    2 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'Type',    ),    3 =>     array (      0 => 'text',      1 => '/bills/delete',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'add_order' => array (  0 =>   array (    0 => 'OrderID',  ),  1 =>   array (    '_controller' => 'Diff\\OrderTripBundle\\Controller\\OrderController::addAction',    'OrderID' => 0,  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'OrderID',    ),    1 =>     array (      0 => 'text',      1 => '/orders/add',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'add_edit_trip' => array (  0 =>   array (    0 => 'TripID',  ),  1 =>   array (    '_controller' => 'Diff\\OrderTripBundle\\Controller\\TripController::addAction',    'TripID' => 0,  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'TripID',    ),    1 =>     array (      0 => 'text',      1 => '/trips/add',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'login' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Diff\\LoginBundle\\Controller\\LoginController::loginAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/login',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'login_check' => array (  0 =>   array (  ),  1 =>   array (  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/login_check',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'logout' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Diff\\LoginBundle\\Controller\\LoginController::logoutAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/logout',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Diff\\AdminBundle\\Controller\\AdminController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'admin_global_submit' => array (  0 =>   array (    0 => 'UserID',  ),  1 =>   array (    '_controller' => 'Diff\\AdminBundle\\Controller\\AdminController::submitAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'UserID',    ),    1 =>     array (      0 => 'text',      1 => '/global/submit',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Diff\\UserBundle\\Controller\\UserController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'edit_user' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Diff\\UserBundle\\Controller\\UserController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/edit',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'edit_password' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Diff\\UserBundle\\Controller\\UserController::editpasswordAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/editpassword',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
