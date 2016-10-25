<?php

/* Basic error container function */
function error($content){
    return '<span class="error" style="color: #ff0000;">' . $content . '</span>';
}

/* Error display settings */
if(0 || isset($_GET['debug'])){	//Error reporting - disable for production
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
}else{
    ini_set('display_errors', '0');     //don't show any errors...
    error_reporting(E_ALL | E_STRICT);  // ...but do log them
}

/* Try to load configuration */

if((!include 'config.php') && (!include 'config.sample.php')){
    
    echo error("Config file could not be loaded!");
    die();
    
}

/* Load in dependencies */

/* Load in views */