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
        
        $atags = explode(' ', $data->tags);
        
        ?>


<div class="container blog-content">
        <h4><?= $data->title ?></h4>
        <div class="blog-info">
            <?php if ($data->tags): ?>
                <span class="tags">Tags:&nbsp;
                <?php foreach($atags as $tag): ?>
                    <div class="chip">
                        <a href="<?= taskurl('search&q=' . $tag)?>">
                        <?= $tag ?>
                        </a>
                    </div>
                <?php endforeach;?>
                </span>
            <?php endif; ?>
        </div>
        <p><?= $data->content ?></p>
</div>

<?php
    }
}