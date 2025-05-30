<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], [], []],
    '_profiler_xdebug' => [[], ['_controller' => 'web_profiler.controller.profiler::xdebugAction'], [], [['text', '/_profiler/xdebug']], [], [], []],
    '_profiler_font' => [['fontName'], ['_controller' => 'web_profiler.controller.profiler::fontAction'], [], [['text', '.woff2'], ['variable', '/', '[^/\\.]++', 'fontName', true], ['text', '/_profiler/font']], [], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    'generate_groupes' => [[], ['_controller' => 'App\\Controller\\GroupeController::generateGroupes'], [], [['text', '/generate-groupes']], [], [], []],
    'app_home' => [[], ['_controller' => 'App\\Controller\\HomeController::index'], [], [['text', '/']], [], [], []],
    'personnel_list' => [[], ['_controller' => 'App\\Controller\\PersonnelController::list'], [], [['text', '/personnel/list']], [], [], []],
    'personnel_new' => [[], ['_controller' => 'App\\Controller\\PersonnelController::new'], [], [['text', '/personnel/new']], [], [], []],
    'personnel_dispo' => [['id'], ['_controller' => 'App\\Controller\\PersonnelController::dispo'], [], [['text', '/dispo'], ['variable', '/', '[^/]++', 'id', true], ['text', '/personnel']], [], [], []],
    'personnel_indisponibilite' => [[], ['_controller' => 'App\\Controller\\PersonnelController::nouvelleIndisponibilite'], [], [['text', '/personnel/personnel/indisponibilite']], [], [], []],
    'planning_available' => [[], ['_controller' => 'App\\Controller\\PlanningController::getAvailable'], [], [['text', '/planning/available']], [], [], []],
    'planning_update' => [[], ['_controller' => 'App\\Controller\\PlanningController::update'], [], [['text', '/planning/update']], [], [], []],
    'planning_delete' => [[], ['_controller' => 'App\\Controller\\PlanningController::delete'], [], [['text', '/planning/delete']], [], [], []],
    'planning_add_ajax' => [[], ['_controller' => 'App\\Controller\\PlanningController::addAjax'], [], [['text', '/planning/add-ajax']], [], [], []],
    'planning_generate_ajax' => [[], ['_controller' => 'App\\Controller\\PlanningController::generateAjax'], [], [['text', '/planning/generate-ajax']], [], [], []],
    'planning_events' => [[], ['_controller' => 'App\\Controller\\PlanningController::events'], [], [['text', '/planning/events']], [], [], []],
    'planning_calendar' => [[], ['_controller' => 'App\\Controller\\PlanningController::calendar'], [], [['text', '/planning/calendar']], [], [], []],
    'planning_list' => [[], ['_controller' => 'App\\Controller\\PlanningController::list'], [], [['text', '/planning/list']], [], [], []],
    'planning_temps_travail' => [['id'], ['_controller' => 'App\\Controller\\PlanningController::voirTempsTravail'], [], [['text', '/temps-travail'], ['variable', '/', '[^/]++', 'id', true], ['text', '/planning/personnel']], [], [], []],
    'planning_new' => [[], ['_controller' => 'App\\Controller\\PlanningController::new'], [], [['text', '/planning/new']], [], [], []],
    'planning_generate' => [['year', 'week'], ['_controller' => 'App\\Controller\\PlanningController::generate'], [], [['variable', '/', '[^/]++', 'week', true], ['variable', '/', '[^/]++', 'year', true], ['text', '/planning/generate']], [], [], []],
    'planning_setup' => [[], ['_controller' => 'App\\Controller\\PlanningSetupController::setup'], [], [['text', '/planning/setup']], [], [], []],
    'app_register' => [[], ['_controller' => 'App\\Controller\\RegistrationController::register'], [], [['text', '/register']], [], [], []],
    'app_login' => [[], ['_controller' => 'App\\Controller\\SecurityController::login'], [], [['text', '/login']], [], [], []],
    'app_logout' => [[], ['_controller' => 'App\\Controller\\SecurityController::logout'], [], [['text', '/logout']], [], [], []],
    'App\Controller\GroupeController::generateGroupes' => [[], ['_controller' => 'App\\Controller\\GroupeController::generateGroupes'], [], [['text', '/generate-groupes']], [], [], []],
    'App\Controller\HomeController::index' => [[], ['_controller' => 'App\\Controller\\HomeController::index'], [], [['text', '/']], [], [], []],
    'App\Controller\PersonnelController::list' => [[], ['_controller' => 'App\\Controller\\PersonnelController::list'], [], [['text', '/personnel/list']], [], [], []],
    'App\Controller\PersonnelController::new' => [[], ['_controller' => 'App\\Controller\\PersonnelController::new'], [], [['text', '/personnel/new']], [], [], []],
    'App\Controller\PersonnelController::dispo' => [['id'], ['_controller' => 'App\\Controller\\PersonnelController::dispo'], [], [['text', '/dispo'], ['variable', '/', '[^/]++', 'id', true], ['text', '/personnel']], [], [], []],
    'App\Controller\PersonnelController::nouvelleIndisponibilite' => [[], ['_controller' => 'App\\Controller\\PersonnelController::nouvelleIndisponibilite'], [], [['text', '/personnel/personnel/indisponibilite']], [], [], []],
    'App\Controller\PlanningController::getAvailable' => [[], ['_controller' => 'App\\Controller\\PlanningController::getAvailable'], [], [['text', '/planning/available']], [], [], []],
    'App\Controller\PlanningController::update' => [[], ['_controller' => 'App\\Controller\\PlanningController::update'], [], [['text', '/planning/update']], [], [], []],
    'App\Controller\PlanningController::delete' => [[], ['_controller' => 'App\\Controller\\PlanningController::delete'], [], [['text', '/planning/delete']], [], [], []],
    'App\Controller\PlanningController::addAjax' => [[], ['_controller' => 'App\\Controller\\PlanningController::addAjax'], [], [['text', '/planning/add-ajax']], [], [], []],
    'App\Controller\PlanningController::generateAjax' => [[], ['_controller' => 'App\\Controller\\PlanningController::generateAjax'], [], [['text', '/planning/generate-ajax']], [], [], []],
    'App\Controller\PlanningController::events' => [[], ['_controller' => 'App\\Controller\\PlanningController::events'], [], [['text', '/planning/events']], [], [], []],
    'App\Controller\PlanningController::calendar' => [[], ['_controller' => 'App\\Controller\\PlanningController::calendar'], [], [['text', '/planning/calendar']], [], [], []],
    'App\Controller\PlanningController::list' => [[], ['_controller' => 'App\\Controller\\PlanningController::list'], [], [['text', '/planning/list']], [], [], []],
    'App\Controller\PlanningController::voirTempsTravail' => [['id'], ['_controller' => 'App\\Controller\\PlanningController::voirTempsTravail'], [], [['text', '/temps-travail'], ['variable', '/', '[^/]++', 'id', true], ['text', '/planning/personnel']], [], [], []],
    'App\Controller\PlanningController::new' => [[], ['_controller' => 'App\\Controller\\PlanningController::new'], [], [['text', '/planning/new']], [], [], []],
    'App\Controller\PlanningController::generate' => [['year', 'week'], ['_controller' => 'App\\Controller\\PlanningController::generate'], [], [['variable', '/', '[^/]++', 'week', true], ['variable', '/', '[^/]++', 'year', true], ['text', '/planning/generate']], [], [], []],
    'App\Controller\PlanningSetupController::setup' => [[], ['_controller' => 'App\\Controller\\PlanningSetupController::setup'], [], [['text', '/planning/setup']], [], [], []],
    'App\Controller\RegistrationController::register' => [[], ['_controller' => 'App\\Controller\\RegistrationController::register'], [], [['text', '/register']], [], [], []],
    'App\Controller\SecurityController::login' => [[], ['_controller' => 'App\\Controller\\SecurityController::login'], [], [['text', '/login']], [], [], []],
    'App\Controller\SecurityController::logout' => [[], ['_controller' => 'App\\Controller\\SecurityController::logout'], [], [['text', '/logout']], [], [], []],
];
