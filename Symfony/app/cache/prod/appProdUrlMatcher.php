<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // stats_homepage
        if ($pathinfo === '/stats') {
            return array (  '_controller' => 'Diff\\StatsBundle\\Controller\\StatsController::indexAction',  '_route' => 'stats_homepage',);
        }

        if (0 === strpos($pathinfo, '/orders')) {
            // order_trip_homepage
            if ($pathinfo === '/orders') {
                return array (  '_controller' => 'Diff\\OrderTripBundle\\Controller\\OrderController::indexAction',  '_route' => 'order_trip_homepage',);
            }

            // view_order
            if (0 === strpos($pathinfo, '/orders/view') && preg_match('#^/orders/view/(?P<OrderID>[^/]++)(?:/(?P<Finalize>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'view_order')), array (  '_controller' => 'Diff\\OrderTripBundle\\Controller\\OrderController::viewAction',  'Finalize' => '',));
            }

        }

        if (0 === strpos($pathinfo, '/trips')) {
            // view_trip
            if (0 === strpos($pathinfo, '/trips/view') && preg_match('#^/trips/view/(?P<TripID>[^/]++)(?:/(?P<Finalize>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'view_trip')), array (  '_controller' => 'Diff\\OrderTripBundle\\Controller\\TripController::viewAction',  'Finalize' => '',));
            }

            // trip_homepage
            if ($pathinfo === '/trips') {
                return array (  '_controller' => 'Diff\\OrderTripBundle\\Controller\\TripController::indexAction',  '_route' => 'trip_homepage',);
            }

            // trip_upload
            if (0 === strpos($pathinfo, '/trips/upload') && preg_match('#^/trips/upload(?:/(?P<TripID>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'trip_upload')), array (  '_controller' => 'Diff\\OrderTripBundle\\Controller\\TripController::uploadAction',  'TripID' => 0,));
            }

            // finalize_trip
            if (0 === strpos($pathinfo, '/trips/finalize') && preg_match('#^/trips/finalize/(?P<TripID>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'finalize_trip')), array (  '_controller' => 'Diff\\OrderTripBundle\\Controller\\TripController::finalizeTripAction',));
            }

        }

        // submit_order_bill
        if (0 === strpos($pathinfo, '/orders/bill') && preg_match('#^/orders/bill/(?P<OrderID>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'submit_order_bill')), array (  '_controller' => 'Diff\\OrderTripBundle\\Controller\\OrderController::OrderBillAction',));
        }

        if (0 === strpos($pathinfo, '/trip')) {
            // trip_cerere
            if (0 === strpos($pathinfo, '/trip/cerere') && preg_match('#^/trip/cerere/(?P<TripID>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'trip_cerere')), array (  '_controller' => 'Diff\\OrderTripBundle\\Controller\\TripController::cerereAction',));
            }

            // trip_declaratie
            if (0 === strpos($pathinfo, '/trip/declaratie') && preg_match('#^/trip/declaratie/(?P<TripID>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'trip_declaratie')), array (  '_controller' => 'Diff\\OrderTripBundle\\Controller\\TripController::declaratieAction',));
            }

        }

        // logout_page
        if ($pathinfo === '/logoutt') {
            return array (  '_controller' => 'Diff\\LoginBundle\\Controller\\LoginController::logoutAction',  '_route' => 'logout_page',);
        }

        if (0 === strpos($pathinfo, '/usage')) {
            // trip_user_stats
            if ($pathinfo === '/usage/trips') {
                return array (  '_controller' => 'Diff\\OrderTripBundle\\Controller\\OrderTripUserStatsController::tripAction',  '_route' => 'trip_user_stats',);
            }

            // order_user_stats
            if ($pathinfo === '/usage/orders') {
                return array (  '_controller' => 'Diff\\OrderTripBundle\\Controller\\OrderTripUserStatsController::orderAction',  '_route' => 'order_user_stats',);
            }

        }

        // trip_delete
        if (0 === strpos($pathinfo, '/trips/delete') && preg_match('#^/trips/delete/(?P<TripID>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'trip_delete')), array (  '_controller' => 'Diff\\OrderTripBundle\\Controller\\TripController::deleteAction',));
        }

        if (0 === strpos($pathinfo, '/orders/delete')) {
            // order_delete
            if (preg_match('#^/orders/delete/(?P<OrderID>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'order_delete')), array (  '_controller' => 'Diff\\OrderTripBundle\\Controller\\OrderController::deleteAction',));
            }

            // product_delete
            if (0 === strpos($pathinfo, '/orders/deleteProduct') && preg_match('#^/orders/deleteProduct/(?P<ProductID>[^/]++)/(?P<OrderID>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'product_delete')), array (  '_controller' => 'Diff\\OrderTripBundle\\Controller\\OrderController::deleteProductAction',  'Finalize' => '',));
            }

        }

        // bill_delete
        if (0 === strpos($pathinfo, '/bills/delete') && preg_match('#^/bills/delete/(?P<Type>[^/]++)/(?P<ID>[^/]++)/(?P<BillID>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'bill_delete')), array (  '_controller' => 'Diff\\OrderTripBundle\\Controller\\BillController::deleteAction',));
        }

        // add_order
        if (0 === strpos($pathinfo, '/orders/add') && preg_match('#^/orders/add(?:/(?P<OrderID>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'add_order')), array (  '_controller' => 'Diff\\OrderTripBundle\\Controller\\OrderController::addAction',  'OrderID' => 0,));
        }

        // add_edit_trip
        if (0 === strpos($pathinfo, '/trips/add') && preg_match('#^/trips/add(?:/(?P<TripID>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'add_edit_trip')), array (  '_controller' => 'Diff\\OrderTripBundle\\Controller\\TripController::addAction',  'TripID' => 0,));
        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'Diff\\LoginBundle\\Controller\\LoginController::loginAction',  '_route' => 'login',);
                }

                // login_check
                if ($pathinfo === '/login_check') {
                    return array('_route' => 'login_check');
                }

            }

            // logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'Diff\\LoginBundle\\Controller\\LoginController::logoutAction',  '_route' => 'logout',);
            }

        }

        // admin_homepage
        if ($pathinfo === '/admin') {
            return array (  '_controller' => 'Diff\\AdminBundle\\Controller\\AdminController::indexAction',  '_route' => 'admin_homepage',);
        }

        // admin_global_submit
        if (0 === strpos($pathinfo, '/global/submit') && preg_match('#^/global/submit/(?P<UserID>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_global_submit')), array (  '_controller' => 'Diff\\AdminBundle\\Controller\\AdminController::submitAction',));
        }

        if (0 === strpos($pathinfo, '/user')) {
            // user_homepage
            if ($pathinfo === '/user') {
                return array (  '_controller' => 'Diff\\UserBundle\\Controller\\UserController::indexAction',  '_route' => 'user_homepage',);
            }

            if (0 === strpos($pathinfo, '/user/edit')) {
                // edit_user
                if ($pathinfo === '/user/edit') {
                    return array (  '_controller' => 'Diff\\UserBundle\\Controller\\UserController::editAction',  '_route' => 'edit_user',);
                }

                // edit_password
                if ($pathinfo === '/user/editpassword') {
                    return array (  '_controller' => 'Diff\\UserBundle\\Controller\\UserController::editpasswordAction',  '_route' => 'edit_password',);
                }

            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
