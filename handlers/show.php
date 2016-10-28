<?php

class ShowHandler extends Handler{
    
    static $name = "show";
    
    function RenderOne(){
        
        $data = $this->data;
        $episodes = $this->api->get(["video"],['show_id' => $data->_id]);
        
        ?>
<div class="container">
    <h4><?= $data->title ?></h4>
    <p>Episodes:</p>
    <ul>
        <?php foreach($episodes as $episode): ?>
        <li><a href="<?= taskurl('video/' . $episode->_id) ?>"><?= $episode->title ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php
        
    }
}