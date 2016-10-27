<?php

class search_handler extends Handler{
    
    public static $name = "search";
    public static $use_api = false;
    
    public function Render(){
        ?>
<div class="container">
    <div class="row">
        <div class="column s12">
             <nav class="nav-wrapper theme-blue">
                <div class="input-field">
                     <input id="search-bar" onchange="function(){ var term = $('#search-bar').val(); pages.loadPage('search&term=' + term); }" class="active" name="term" type="search" required value="<?= (trim($term) == '')? '' : $term ?>" placeholder="Search" >
                     <label for="search-bar"><i class="material-icons">search</i></label>
                </div>
             </nav>
        </div>
     </div>
</div>
<?php


    }
}