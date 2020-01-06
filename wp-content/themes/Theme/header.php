<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="title" content="" />
  	<meta name="description" content="" />
  	<meta name="keywords" content=""/>
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <title><?php wp_title(' | ', 'true', 'right'); ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_directory'); ?>/css/bootstrap.min.css"/>
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_directory'); ?>/css/animate.css"/>
    <!-- Font Awesome -->
    <script defer src="<?php echo get_bloginfo('template_directory'); ?>/js/all.min.js"></script>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo get_bloginfo('template_directory'); ?>/images/favicon.png">

    <?php wp_head(); ?>

    <!-- STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_directory'); ?>/style.css"/>

  </head class="header">
  <body <?php body_class(); ?>>

    <header class="header">
      <div class="container">
        Header

        <ul class="ul mainMenu">
          <?php
            wp_nav_menu(array(
              'theme_location' => 'primary',
              'container'      => '',
              'items_wrap'     => '%3$s',
              )
            );
          ?>
        </ul>
      </div>
    </header>
