
<div data-role="header" data-theme="a">
	
	<div class="ui-grid-a">
		<div class="ui-block-b">
				<img src="/images/bm-graphic-mobile3.gif" alt="Bullet-Monkey logo">
		</div>

        <div class="ui-block-b" align="right" style="padding-right: 10px; padding-top:5px;">

		    <?php if ($this->session->userdata('memberid') == TRUE )
		    {
		    	echo '<a href="/home/logout"><img src="/images/logout_button.gif" alt="Logout"> </a>';
		    } ?>
		</div>
	</div>

</div><!-- /header -->
<?php
if($this->session->userdata('username') == TRUE){
    echo '<div><h5>Welcome, ';
    echo $this->session->userdata('username');
    echo '</h5></div>';
}
?>

<div style="text-align: center;color:red;">
    <?php if($this->session->flashdata('flashSuccess'))
    {
        echo "<p>"; echo $this->session->flashdata('flashSuccess'); echo "</p>";
    }
    ?>
</div>