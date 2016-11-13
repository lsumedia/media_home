<?php

class Video extends Handler{
    
    public static $name = "video";
    
    public function RenderList() {
        $data = $this->api->get($this->task,[],10);

        ?>
<div class="container">
    <h4>Recent videos</h4>
    <div class="video-list">
        <div class="row">
        <?php foreach($data as $item){
            Video::PrintItem($item);
        } ?>
        </div>
    </div>
</div>
<?php

    }
    
    public function RenderOne(){
        $data = $this->api->get($this->task);
        
        $generated_url = $this->api->generated($this->task);
        
        if($data->show_id){
            $show = $this->api->get(['show',$data->show_id]);
        }
        
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

<div class="container video-info ">
    <div class="card-panel z-depth-0">
        <h4><?= $data->title ?></h4>
        <p><?= $data->description ?></p>
    </div>
    
    <?php if($show): ?>
        <div class="card horizontal">
            <a href="<?= taskurl('show/'. $show->_id) ?>">
                <div class="card-image">
                    <img src="<?= $show->poster ?>" />
                </div>
                <div class="card-content">
                    <p class="card-title"><?= $show->title ?></p>
                </div>
            </a>
        </div>
    <?php endif; ?>
    
</div>
<?php
    }
    
    public function Headers(){
        global $config;
        //Use inverted logo
        if($this->task[1]){
            $config['logo'] = $config['logo_inverse'];
            echo '<link rel="stylesheet" href="css/video.css" />';
        }
    }
    
    public static function PrintItem($data){
        ?>
        <div class="col s12 m4 l2">
                <a href="<?= taskurl('video/' . $data->_id) ?>">
                    <div class="video-darkbox sixteen-nine z-depth-1">
                        <img src="<?= $data->poster ?>" class="sixteen-nine-inner"/>
                    </div>
                    <?= $data->title ?>
                </a>
            </div>
        <?php
    }
}