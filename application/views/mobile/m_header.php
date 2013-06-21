
<div data-role="header" data-theme="a">
	
	<div class="ui-grid-a">
		<div class="ui-block-b">
				<a href="/home/"><img src="/images/bm-graphic-mobile-black.gif" alt="Bullet-Monkey logo"></a>
		</div>
		<?php echo $this->session->userdata('username'); ?>
        <div class="ui-block-b" align="right">

		    <?php if ($this->session->userdata('memberid') == TRUE )
		    {
		    	echo '<a href="/home/logout"><img src="/images/logout.png" alt="Logout"></a>';
		    } ?>
		</div>
	</div>

</div><!-- /header -->