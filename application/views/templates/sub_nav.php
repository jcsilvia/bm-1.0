<div class="main-content">

<div class="sub-nav">
<?php

            if($title == 'Home') {echo '<b>Home</b>    <a href="/Search/">     Search    </a><a href="/post/">    Post    </a><a href="/settings/">    Settings</a>';}
            elseif($title == 'Search'||$title == 'Search Results') {echo '<a href="/home/">Home    </a>    <b>Search</b>    <a href="/post/">    Post    </a><a href="/settings/">    Settings</a>';}
            elseif($title == 'Post') {echo ' <a href="/home/">Home    </a><a href="/search/">    Search    </a>    <b>Post</b>    <a href="/settings/">    Settings</a>';}
            elseif($title == 'Settings') {echo ' <a href="/home/">Home    </a><a href="/search/">    Search    </a><a href="/post/">    Post    </a>    <b>Settings</b>';}
            else {echo '<a href="/home/">Home     </a><a href="/search/">     Search    </a><a href="/post/">    Post    </a><a href="/settings/">    Settings</a>';}

 ?>
</div>
    <div style="min-height:10px;"></div>
<div style="width: 800px;margin: 0 auto; position:relative;">
<div class="flashMsg">
<?php if($this->session->flashdata('flashSuccess'))
{
    echo "<p>"; echo $this->session->flashdata('flashSuccess'); echo "</p>";
}
?>
</div>
<div class="username">Welcome <?php echo $this->session->userdata('username') ?> </div>
</div>
<div style="min-height: 50px;"></div>
