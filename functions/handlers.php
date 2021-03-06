<?php

class Handler{
    
    /**
     * Task root for the Handler to manage - eg. "video" will handler
     * "video" and "video/[id]" tasks
     * 
     * @var string
     */
    public static $name;
    
    public static $use_api = true;
    
    public function __construct($task, $api) {
        
        $this->api = $api;
        $this->task = $task;
        
        if($this::$use_api && $task[1]){
            $this->data = $api->get($task);
        }
       
        
    }
    
    public function Render(){
        
        if(!$data) $data = $this->api->get($this->task);
        
        if($this->task[1]){
            $this->RenderOne();
        }else{
            $this->RenderList();
        }
        
    }
    
    public function RenderList() {
        if(!$data) $data = $this->api->get($this->task);
        
        echo "<ul>";
        foreach($data as $item){
            echo "<li><a href=\"" . taskurl( $this->task[0] .  '/' . $item->_id) . "\">" . $item->title . "</a></li>";
        }
        echo "</ul>";
        
    }
    
    public function RenderOne(){
        echo $this->data->title;
    }
    
    public function PrintSocialMediaMeta(){
        
    }
    
    public function Headers(){
    }
    
    public static function GetHandlerForTask($task){
        
        foreach(get_declared_classes() as $class){
            if(is_subclass_of($class, 'Handler')){
                if($class::$name == $task[0]){
                    return $class;
                }
            }
        }
        //Use default handler if not found
        return "Handler";
    }
    
}