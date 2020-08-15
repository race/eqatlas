<?php
/*
 * Get the page name from the URL
 * check if valid page, otherwise give 404 error
 *
 * If valid, load:
 *** Page class
 *** Model (later)
 *** View
 ***
 */
require_once('./libs/general.php');
require_once('./controllers/page.php');
$Page = new Page();
if (!isset($_GET['view'])) {
  $view = 'index';
} else {
  $view = $_GET['view'];
}
$routes = explode('/', $view);
$directory = '';
if (!empty($routes)) {
  switch ($routes[0]) {
    // whitelist other directories here for each case
    case 'map' :
      $directory = $routes[0];
      $view = $routes[1];
      break;
    default :
      $view = $routes[0];
  }
}
// @todo move this to DB / Model
$pages = array(
  'commons' => array(
    'title' => 'West Commonlands',
  ),
  'ecommons' => array(
    'title' => 'East Commonlands',
  ),
  'butcher' => array(
    'title' => 'Butcherblock Mountains',
  ),
  'kaladim' => array(
    'title' => 'Dwarven City of Kaladim',
  ),
  'kaladima' => array(
    'title' => 'South Kaladim',
  ),
  'kaladimb' => array(
    'title' => 'North Kaladim',
  ),
  'gfay' => array(
    'title' => 'Greater Faydark'
  ),
  'kelethin' => array(
    'title' => 'Elvish City of Kelethin within the Greater Faydark'
  ),
);
if (in_array($view, array_keys($pages))) {
  //$Page->name = $_GET['view']; // if we don't whitelist here it could allow for an attacker to traverse directories
  $Page->name = $view;
  $Page->title = ucfirst($Page->name) . ' | ' . $pages[$view]['title'] . ' | EQ Atlas';
}
switch ($view) {
  case '';
  case 'index' :
    $Page->name = 'index';
    $Page->title = 'Home Index | EQ Atlas';
    break;
  case 'commons' :
  case 'ecommons' :
  case 'gfay' :
  case 'kelethin' :
  case 'butcher' :
  case 'kaladim' :
  case 'kaladima' :
  case 'kaladimb' :
    // valid pages
    break;
  default :
    $Page->title = '404 Not Found';
    echo '<h1>404 Not Found</h1>';
    exit();
}
?>
<html>
  <?php
  include('./templates/header.php');
  include('./templates/body.php');
  ?>
</html>
