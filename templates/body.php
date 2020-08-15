<?php
// @todo remove styles from structure, use CSS exclusively
?>
<body bgcolor="#FFFFFF" background="/images/bg.jpg">
  <?php
  if (!empty($Page->name)) {
    include('./views/elements/nav.php');
    /*
    // removed after adding adjacent zones table
    if ($view != 'index') {
      echo '<hr width="75%"/>';
    }
    */
    include('./views/' . $directory . '/' . $Page->name . '.php');
  }
  ?>
</body>
