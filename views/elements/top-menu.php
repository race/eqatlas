<?php
$nav = isset($_GET['view']) ? $_GET['view'] : 'index';

// @todo replace with scalable structure stored in & retrieved from DB
$nav_options = array(
  'index' => 'Home',
  //'atlas' => 'Ye Old Atlas'
);
?>
<div class="top-menu">
  <?php
  foreach ($nav_options as $page => $label) {
    if ($nav == $page) { ?>
      <span><?php echo $label; ?></span>
      <?php
    } else { ?>
      <a href="/<?php echo $page; ?>.php"><?php echo $label; ?></a>
      <?php
    }
    if (has_next($nav_options, $page)) {
      echo ' | ';
    }
  }
  ?>
  | <a href="/atlas.html">Ye Old Atlas</a>
</div>
