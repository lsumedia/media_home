<?php

class Blog extends Handler{
    
    public static $name = "blog";
    
    public function RenderList() {
        $data = $this->api->get($this->task);
        
        echo "<ul>";
        foreach($data as $item){
            echo "<li><a href=\"" . taskurl('blog/' . $item->_id) ."\">" . $item->title . "</a></li>";
        }
        echo "</ul>";
        
    }
    
    public function RenderOne(){
        $data = $this->api->get($this->task);
        
        ?>


<div class="container blog-content">
        <h4><?= $data->title ?></h4>
        <p><?= $data->content ?></p>
</div>

<?php
    }
}