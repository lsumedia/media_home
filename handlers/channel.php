<?php

class ChannelHandler extends Handler{
    
    public static $name = "channel";
    
    public function RenderList() {
        $data = $this->api->get($this->task);
        
        echo "<ul>";
        foreach($data as $item){
            echo "<li><a href=\"" . taskurl('channel/' . $item->_id) ."\">" . $item->title . "</a></li>";
        }
        echo "</ul>";
        
    }
    
    public function RenderOne(){
        $data = $this->api->get($this->task);
        
        $generated_url = $this->api->generated($this->task);
        
        ?>

<div class="video-darkbox">
    <div class="container video-pane">
        <div class="video-container">
            <iframe class="video" src="<?= $generated_url ?>&autoplay=1">
                Your browser does not support iframes. I'm afraid there's not much hope for you.
            </iframe>
        </div>
    </div>
</div>

<div class="container video-info">
    <div class="card-panel z-depth-0">
        <h4><?= $data->title ?></h4>
        <p><?= $data->description ?></p>
    </div>
</div>

<?php
    }
    
    public function Headers(){
        global $config;
        if($this->task[1]){
            //Use inverted logo
            $config['logo'] = $config['logo_inverse'];
            echo '<link rel="stylesheet" href="css/video.css" />';
        }
    }
}

