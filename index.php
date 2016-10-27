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
        
    </head>
    <body>
        
        <?php $handler->Render(); ?>
        <!-- Load scripts -->
    </body>
</html>

