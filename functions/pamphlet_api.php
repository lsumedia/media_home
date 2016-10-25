<?php


class pamphlet_api{
    
    
    public function __construct() {
        global $config;
        
        $this->root = $config['api_root'];
    }
    
    /**
     * Return object containing data for a given path
     * 
     * 
     * @param type $path Pamphlet path
     * @param type $filter MongoDB filter (optional)
     */
    function get($path, $filter = []){
        
        
        
        
    }
    
    function generate($task){
        
    }
    
    
}