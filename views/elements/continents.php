<?php
$nav_options = array(
  'antonica' => 'Antonica',
  'faydwer' => 'Faydwer',
  'odus' => 'Odus',
  'kunark' => 'Kunark',
  'velious' => 'Velious'
);
?>
<div class="top-menu">
  <?php
  foreach ($nav_options as $page => $label) { ?>
    <a href="/index#<?php echo $page; ?>"><?php echo $label; ?></a>
    <?php

    if (has_next($nav_options, $page)) {
      echo ' | ';
    }
  }
  ?>
  <br><br>
</div>
