<?php

class search_handler extends Handler{
    
    public static $name = "search";
    public static $use_api = false;
    
    public function Render(){
        $term = $_GET['q'];
        
        ?>
<div class="container">
    <div class="row">
        <div class="column s12">
             <nav class="nav-wrapper theme-color">
                <div class="input-field">
                     <input id="search-bar" onchange="var term = $('#search-bar').val(); window.location.href = '<?= taskurl('') ?>search&q=' + term;" class="active" name="term" type="search" required value="<?= (trim($term) == '')? '' : $term ?>" placeholder="Search" >
                     <label for="search-bar"><i class="material-icons">search</i></label>
                </div>
             </nav>
        </div>
     </div>
    <?php
    if($term){
        $data = $this->api->search($term,10);
    }
    
    ?>
    <div id="search-results">
        <?php 
        foreach($data->results as $datatype => $results){
            if(count($results) > 0){
                $type_title = $data->typenames->$datatype;
                echo "<h5 class=\"result-type\">$type_title</h5>";
                foreach($results as $result){
                    $item_url = taskurl($datatype . '/' . $result->_id);
                    echo "<div class=\"search-result\"><a href=\"{$item_url}\">{$result->title}</a></div>";
                }
            }
        }
?>
    </div>
</div>
<?php


    }
    
    public function Headers(){
        echo "<script src=\"res/search/search.js\"></script>";
    }
}