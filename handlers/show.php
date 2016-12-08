<?php

class ShowHandler extends Handler{
    
    static $name = "show";
    
    function RenderOne(){
        
        $data = $this->data;
        $episodes = $this->api->get(["video"],['show_id' => $data->_id]);
        
        if($data->poster){
        ?>
<div class="parallax-container channel-header">
    <div class="parallax"><img src="<?= $data->poster ?>" /></div>
    <div class="container">
            <img class="channel-thumbnail" src="<?= $data->thumbnail ?>" />
    </div>
</div>
        <?php } ?>
<div class="container">
    <h4><?= $data->title ?></h4>
    <p><?= $data->description ?></p>
    <div class="episodes">
        <div class="row">
            <div class="col s12 m6 l8">
                 <h5>Episodes</h5>
            </div>
            <div class="col s10 m6 l4">
                <input class="search" type="text" placeholder="Search" />
            </div>
        </div>
        <div class="row">
        <?php foreach($episodes as $episode){ Video::printItem($episode);} ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
      $('.parallax').parallax();
    });
</script>
<?php
        
    }
    
    public function RenderList(){
        $data = $this->data;
        if(!$data) $data = $this->api->get($this->task);
        
        ?>
<div class="container">
    <h4>Shows</h4>
    <div class="row">
    <?php foreach($data as $item){
        self::PrintItem($item);
    }
    ?>
    </div>
</div>
<?php
    }
    
    public static function PrintItem($data){
        ?>
        <div class="col s12 m4 l3">
                <a href="<?= taskurl('show/' . $data->_id) ?>">
                    <div class="video-darkbox sixteen-nine z-depth-1">
                        <img src="<?= $data->poster ?>" class="sixteen-nine-inner"/>
                        <img class="channel-item-thumb" src="<?= $data->thumbnail ?>" />
                    </div>
                    <h5><?= $data->title ?></h5>
                </a>
            </div>
        <?php
    }
}