<div data-role="navbar">
	<ul>
		<li><a href="/home" <?php if ($title=="Home") echo "class='ui-btn-active ui-state-persist'"; ?> >Home</a></li>

		
		<?php

				echo '<li><a id="search" href="/search"';
				 	if ($title=="Search") echo "class='ui-btn-active ui-state-persist'"; 
				echo '>Search</a></li>';

				echo '<li><a id="post" href="/post"';
				 	if ($title=="Update") echo "class='ui-btn-active ui-state-persist'";
				echo '>Update</a></li>';

		?>
	</ul>
</div>
