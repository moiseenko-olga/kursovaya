<?php

require_once __DIR__ . '/Db.php';
require_once __DIR__ . '/View.php';
require_once __DIR__ . '/controllers/MainController.php';
require_once __DIR__ . '/controllers/BuildsController.php';

$routes = require __DIR__ . '/routes.php';

$route = trim(urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)), '/');
$route = preg_replace('~^index\.php/?~', '', $route);

$isRouteFound = false;

foreach ($routes as $pattern => $controllerAndAction) {
    preg_match($pattern, $route, $matches);
    if (!empty($matches)) {
        $isRouteFound = true;
        break;
    }
}

if (!$isRouteFound) {
    http_response_code(404);
    echo '<h1>404 — Страница не найдена</h1><a href="/">Вернуться на главную</a>';
    return;
}

unset($matches[0]);

$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];

$controller = new $controllerName();
$controller->$actionName(...$matches);
