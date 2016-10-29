<?php

class Video extends Handler{
    
    public static $name = "video";
    
    public function RenderList() {
        $data = $this->api->get($this->task);

        ?>
<div class="container">
    <h4>All Videos</h4>
    <div class="video-list">
        <?php foreach($data as $item): ?>
        <div class="card-panel">
            <a href="<?= taskurl('video/' . $item->_id) ?>">
            <?= $item->title ?>
            </a>
        </div>
        <?php endforeach; ?>
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
            <iframe class="video" src="<?= $generated_url ?>">
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
            <div class="card-image">
                <img src="<?= $show->poster ?>" />
            </div>
            <?= $show->title ?>
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
}