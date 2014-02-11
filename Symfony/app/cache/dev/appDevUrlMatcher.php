<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

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

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
        }

        if (0 === strpos($pathinfo, '/demo')) {
            if (0 === strpos($pathinfo, '/demo/secured')) {
                if (0 === strpos($pathinfo, '/demo/secured/log')) {
                    if (0 === strpos($pathinfo, '/demo/secured/login')) {
                        // _demo_login
                        if ($pathinfo === '/demo/secured/login') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                        }

                        // _security_check
                        if ($pathinfo === '/demo/secured/login_check') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_security_check',);
                        }

                    }

                    // _demo_logout
                    if ($pathinfo === '/demo/secured/logout') {
                        return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
                    }

                }

                if (0 === strpos($pathinfo, '/demo/secured/hello')) {
                    // acme_demo_secured_hello
                    if ($pathinfo === '/demo/secured/hello') {
                        return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
                    }

                    // _demo_secured_hello
                    if (preg_match('#^/demo/secured/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',));
                    }

                    // _demo_secured_hello_admin
                    if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello_admin')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',));
                    }

                }

            }

            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
