<?php


class PamphletAPI{
    
    
    public function __construct($api_root) {
        
        $this->root = $api_root;
    }
    
    /**
     * Return object containing data for a given path
     * 
     * 
     * @param optional string $path Pamphlet path
     * @param optional array $filter MongoDB filter (optional)
     */
    function get($path, $filter = [], $limit = 0){
        $path = implode('/', $path);
        
        $url = $this->root . 'api_public.php?a=' . $path;
        if($filter) $url .+ '&f=' . $filter;
        if($limit) $url .+ '&l=' . $limit;
       
        $data = json_decode(file_get_contents($url));
        
        return $data;
        
    }
    
    /* Return URL for the generate function for a given task */
    function generated($path){
        return $this->root . 'generated.php?a=' . $path;
    }
    
    
}