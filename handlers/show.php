<?php

class ShowHandler extends Handler{
    
    static $name = "show";
    
    function RenderOne(){
        
        $data = $this->data;
        $episodes = $this->api->get(["video"],['show_id' => $data->_id]);
        
        ?>
<div class="full-width-header">
    <img src="<?= $data->poster ?>" />
</div>
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
<?php
        
    }
}