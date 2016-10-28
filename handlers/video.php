<?php

class Video extends Handler{
    
    public static $name = "video";
    
    public function RenderList() {
        $data = $this->api->get($this->task);
        
        echo "<ul>";
        foreach($data as $item){
            echo "<li><a href=\"" . taskurl('video/' . $item->_id) ."\">" . $item->title . "</a></li>";
        }
        echo "</ul>";
        
    }
    
    public function RenderOne(){
        $data = $this->api->get($this->task);
        echo $data->title;
    }
}