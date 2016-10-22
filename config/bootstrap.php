<?php

/*
 * bootstrap
 */

use Cake\Core\Configure;
use Cake\Event\EventManager;
use RestApi\Middleware\RestApiMiddleware;

EventManager::instance()->on('Server.buildMiddleware', function ($event, $middleware) {
    $middleware->add(new RestApiMiddleware());
});

/*
 * Read configuration file and inject configuration
 */
try {
    Configure::load('RestApi.api', 'default', false);
    Configure::load('api', 'default', true);
} catch (Exception $e) {
    // nothing
}
