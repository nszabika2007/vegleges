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
                return array('_route' => 'logout');
            }

        }

        // admin_homepage
        if ($pathinfo === '/admin') {
            return array (  '_controller' => 'Diff\\AdminBundle\\Controller\\AdminController::indexAction',  '_route' => 'admin_homepage',);
        }

        // user_homepage
        if ($pathinfo === '/user') {
            return array (  '_controller' => 'Diff\\UserBundle\\Controller\\UserController::indexAction',  '_route' => 'user_homepage',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
