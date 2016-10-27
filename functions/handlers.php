<?php

class Handler{
    
    /**
     * Task root for the Handler to manage - eg. "video" will handler
     * "video" and "video/[id]" tasks
     * 
     * @var string
     */
    public static $name;
    
    public function __construct($task, $api) {
        
        $this->api = $api;
        $this->task = $task;
        
        
        
    }
    
    public function Render(){
        
        if($this->task[1]){
            $this->RenderOne();
        }else{
            $this->RenderList();
        }
        
    }
    
    public function RenderOne(){
        
    }
    
    public function RenderList(){
        
    }
    
    public function PrintSocialMediaMeta(){
        
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