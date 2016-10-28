<?php

class ChannelHandler extends Handler{
    
    public static $name = "channel";
    
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
        $config['logo'] = "res/img/media_mono.png";
        ?>
<style>
    main{
        margin-top:0px;
    }
    nav{
        background-color:white;
    }
    nav ul a{
        color:black;
    }
    .dropdown-content li > a, .dropdown-content li > span{
        color:black;
    }
    /*.brand-logo img{ -webkit-filter:invert(100); filter:invert(100); }*/
</style>
        <?php
    }
}

