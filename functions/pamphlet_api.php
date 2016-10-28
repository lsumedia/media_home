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
    
    /* Return search results for a given term */
    function search($query, $limit = null, $offset = null, $category = null){
        
        global $config;
        
        if(!$category){
            $category = $config['category'];
        }
        
        $url = $this->root . 'api_public.php?a=search&q=' . $query;
        if($limit) $url .+ '&l=' . $limit;
        if($offset) $url .+ '&o=' . $offset;
        if($category) $url .+ '&c=' . $category;
        $data = json_decode(file_get_contents($url));

        return $data;
    }
    
    /* Return URL for the generate function for a given task */
    function generated($path){
        if(is_array($path)){
            $path = implode('/',$path);
        }
        return $this->root . 'generated.php?a=' . $path;
    }
    
    
}