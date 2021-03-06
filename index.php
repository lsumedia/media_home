<?php

/* Initialize PHP code */
require 'init.php';

/* Load API */
$api_root = $config['api_root'];
$api = new PamphletAPI($api_root);

$task_string = filter_input(INPUT_GET, "a");
$task = explode('/', $task_string);

/* Load handler for this page */

$handler_name = Handler::GetHandlerForTask($task);
$handler = new $handler_name($task,$api);

/* Print page headers */
?>
<!doctype html>
<html>
    <head>
        <?= ($config['use_rewrite'])? "<base href=\"{$config['base_url']}\" />" : "" ?> 
        <link rel="stylesheet" href="bower_components/materialize/dist/css/materialize.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet" href="css/style_main.css" />
        <meta name="viewport" content="width=device-width, user-scalable=no" />
        <style>
            .theme-color{ background-color: <?= $config['theme_color'] ?>;}
            .theme-color-force{ background-color: <?= $config['theme_color'] ?> !important;}
            .theme-color-text{ color <?= $config['theme_color'] ?>; }
        </style>
        
        <!-- Load scripts -->
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/materialize/dist/js/materialize.min.js"></script>
        
        <?php $handler->headers(); ?>
    </head>
    <body>
        
        <header>
        <?php require 'components/nav.php'; ?>
        </header>
        
        <main>
        <?php $handler->Render(); ?>
        </main>
        
        <footer>
        <?php require 'components/footer.php'; ?>
        </footer>
        
    </body>
</html>

