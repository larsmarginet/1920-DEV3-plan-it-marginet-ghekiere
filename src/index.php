<?php
session_start();
ini_set('display_errors', true);
error_reporting(E_ALL);

$routes = array(
  'home' => array(
    'controller' => 'Workouts',
    'action' => 'index'
  ),
  'intensity' => array(
    'controller' => 'Workouts',
    'action' => 'intensity'
  ),
  'workout' => array(
    'controller' => 'Workouts',
    'action' => 'workout'
  ),
  'activity' => array(
    'controller' => 'Workouts',
    'action' => 'activity'
  ),
  'detail' => array(
    'controller' => 'Workouts',
    'action' => 'detail'
  ),
  'addworkout' => array(
    'controller' => 'Workouts',
    'action' => 'addworkout'
  )
);

if(empty($_GET['page'])) {
  $_GET['page'] = 'home';
}
if(empty($routes[$_GET['page']])) {
  header('Location: index.php');
  exit();
}

$route = $routes[$_GET['page']];
$controllerName = $route['controller'] . 'Controller';

require_once __DIR__ . '/controller/' . $controllerName . ".php";

$controllerObj = new $controllerName();
$controllerObj->route = $route;
$controllerObj->filter();
$controllerObj->render();
