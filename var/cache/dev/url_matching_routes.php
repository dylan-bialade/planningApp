<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/generate-groupes' => [[['_route' => 'generate_groupes', '_controller' => 'App\\Controller\\GroupeController::generateGroupes'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/personnel/list' => [[['_route' => 'personnel_list', '_controller' => 'App\\Controller\\PersonnelController::list'], null, null, null, false, false, null]],
        '/personnel/new' => [[['_route' => 'personnel_new', '_controller' => 'App\\Controller\\PersonnelController::new'], null, null, null, false, false, null]],
        '/personnel/personnel/indisponibilite' => [[['_route' => 'personnel_indisponibilite', '_controller' => 'App\\Controller\\PersonnelController::nouvelleIndisponibilite'], null, null, null, false, false, null]],
        '/planning/update' => [[['_route' => 'planning_update', '_controller' => 'App\\Controller\\PlanningController::update'], null, ['POST' => 0], null, false, false, null]],
        '/planning/delete' => [[['_route' => 'planning_delete', '_controller' => 'App\\Controller\\PlanningController::delete'], null, ['POST' => 0], null, false, false, null]],
        '/planning/add-ajax' => [[['_route' => 'planning_add_ajax', '_controller' => 'App\\Controller\\PlanningController::addAjax'], null, ['POST' => 0], null, false, false, null]],
        '/planning/generate-ajax' => [[['_route' => 'planning_generate_ajax', '_controller' => 'App\\Controller\\PlanningController::generateAjax'], null, ['POST' => 0], null, false, false, null]],
        '/planning/events' => [[['_route' => 'planning_events', '_controller' => 'App\\Controller\\PlanningController::events'], null, null, null, false, false, null]],
        '/planning/calendar' => [[['_route' => 'planning_calendar', '_controller' => 'App\\Controller\\PlanningController::calendar'], null, null, null, false, false, null]],
        '/planning/list' => [[['_route' => 'planning_list', '_controller' => 'App\\Controller\\PlanningController::list'], null, null, null, false, false, null]],
        '/planning/new' => [[['_route' => 'planning_new', '_controller' => 'App\\Controller\\PlanningController::new'], null, null, null, false, false, null]],
        '/planning/setup' => [[['_route' => 'planning_setup', '_controller' => 'App\\Controller\\PlanningSetupController::setup'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/p(?'
                    .'|ersonnel/([^/]++)/dispo(*:230)'
                    .'|lanning/(?'
                        .'|personnel/([^/]++)/temps\\-travail(*:282)'
                        .'|generate/([^/]++)/([^/]++)(*:316)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        230 => [[['_route' => 'personnel_dispo', '_controller' => 'App\\Controller\\PersonnelController::dispo'], ['id'], null, null, false, false, null]],
        282 => [[['_route' => 'planning_temps_travail', '_controller' => 'App\\Controller\\PlanningController::voirTempsTravail'], ['id'], null, null, false, false, null]],
        316 => [
            [['_route' => 'planning_generate', '_controller' => 'App\\Controller\\PlanningController::generate'], ['year', 'week'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
