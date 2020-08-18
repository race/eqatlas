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
  'everfrost' => array(
    'title' => 'Everfrost Peaks'
  ),
  'everfrost-caves' => array(
    'title' => 'Everfrost Caves'
  ),
  'permafrost' => array(
    'title' => 'Permafrost Keep'
  ),
  'halas' => array(
    'title' => 'Barbaric City of Halas',
  ),
  'blackburrow' => array(
    'title' => 'Blackburrow',
  ),
  'qeynoshills' => array(
    'title' => 'Qeynos Hills',
  ),
  'crushbone' => array(
    'title' => 'Clan Crushbone',
  ),
  'nektulos' => array(
    'title' => 'Nektulos Forest',
  ),
  'neriak' => array(
    'title' => 'Dark Elvish City of Neriak',
  ),
  'neriaka' => array(
    'title' => 'Neriak Foreign Quarter | Dark Elvish City of Neriak',
  ),
  'neriakb' => array(
    'title' => 'Neriak Commons | Dark Elvish City of Neriak',
  ),
  'neriakc' => array(
    'title' => 'Neriak Third Gate | Dark Elvish City of Neriak',
  ),
  'lavastorm' => array(
    'title' => 'Lavastorm Mountains',
  ),
  'najena' => array(
    'title' => 'Najena',
  ),
  'solusekseye' => array(
    'title' => 'Soldunga | Solusek\'s Eye (Sol A)',
  ),
  'nagafenslair' => array(
    'title' => 'Soldungb | Nagafen\'s Lair (Sol B)',
  ),
  'templesro' => array(
    'title' => 'Temple of Solusek Ro',
  ),
  'northro' => array(
    'title' => 'Northern Desert of Ro',
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
  case 'everfrost' :
  case 'everfrost-caves' :
  case 'permafrost' :
  case 'halas' :
  case 'blackburrow' :
  case 'qeynoshills' :
  case 'crushbone' :
  case 'nektulos' :
  case 'neriak' :
  case 'neriaka' :
  case 'neriakb' :
  case 'neriakc' :
  case 'lavastorm' :
  case 'najena' :
  case 'solusekseye' :
  case 'nagafenslair' :
  case 'templesro' :
  case 'northro' :
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
