<!DOCTYPE html>
<html lang="ru" class="h-100">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body class="d-flex flex-column">
    <div class="container-fluid header-container">     
            <div class='container u8-container'>
                <header class="d-flex flex-row justify-content-center header">
                    <div class='logo'>
                        <?php the_custom_logo(); ?>
                    </div>
                    <div class='header-sitename'>
                        <h1><?php bloginfo( 'name' ); ?></h1>
                        <h5><?php bloginfo( 'description' ); ?></h5>
                    </div>
                </header>
            </div>
    </div>
    