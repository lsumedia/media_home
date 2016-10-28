<!-- Dropdown for More button -->
<ul id="more-dropdown" class="dropdown-content red-text">
    <li><a href="<?= taskurl('blog') ?>">Blog</a></li>
  <li><a href="<?= taskurl('about') ?>">About</a></li>
  <li><a href="https://github.com/lsumedia/media_home">GitHub</a></li>
  <li><a href="//media.lsu.co.uk">LSU Media</a></li>
</ul>
<!-- Dropdown for Shows button -->
<ul id="cosec-dropdown" class="dropdown-content red-text">
    <li><a href="./search?term=features">Features</a></li>
    <li><a href="./search?term=entertainment">Entertainment</a></li>
    <li><a href="./search?term=news">News</a></li>
    <li><a href="./search?term=music">Music</a></li>
    <li><a href="./search?term=sport">Sport</a></li>
</ul>
<div class="navbar-fixed">
    <nav class="theme-color">
        <!-- Desktop nav bar -->
        <div class="nav-wrapper" id="main-nav">
           <div class="container">
                <div class="brand-logo">
                    <a href="."><img src="<?= $config['logo'] ?>" alt="LSUTV Logo" id="tv-logo" style="float:left;"/></a>
                    <!-- <i class="material-icons pointer" style="float:left;">arrow_drop_down</i> -->
                </div>
                <a class="hide-on-large-only button-collapse" data-activates="mobile-nav">
                    <i class="material-icons">menu</i>
                </a>
                <ul class="right hide-on-med-and-down">
                    <?php if($task[0] != "search"){  ?>
                    <li><a href="<?= taskurl('search') ?>"><i class="material-icons left">search</i>Search</a></li>   
                    <?php } ?>
                    <!-- <li><a href="#!">Live</a></li> -->
                    <li><a class="dropdown-button" href='#!' data-activates="cosec-dropdown">Categories<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a href='<?= taskurl('show') ?>'>Shows</a></li>
                    <!-- Dropdown Trigger -->
                    <li><a class="dropdown-button" href="#!" data-activates="more-dropdown">More<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
               
            </div>
            <ul class="side-nav" id="mobile-nav">
                <li><a href=".">Home</a></li>
                <li><a href="<?= taskurl('search') ?>">Search</a></li>
                <li><a href="<?= taskurl('show') ?>">Shows</a></li>
                <li class="divider"></li>
                 <li><a href="<?= taskurl('search&q=entertainment') ?>">Entertainment</a></li>
                <li><a href="<?= taskurl('search&q=news') ?>">News</a></li>
                <li><a href="<?= taskurl('search&q=music') ?>">Music</a></li>
                <li><a href="<?= taskurl('search&q=sport') ?>">Sport</a></li>
                <li class="divider"></li>
                <li><a href="<?= taskurl('blog') ?>">Blog</a></li>
                <li><a href="<?= taskurl('about') ?>">About</a></li>
          </ul>
        </div>

    </nav>
     
</div>