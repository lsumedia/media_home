<?php

function taskurl($task){
    global $config;
    
    if($config['use_rewrite']){
        return "./a/$task";
    }
    return "./?a=$task";
}