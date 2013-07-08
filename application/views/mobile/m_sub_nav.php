
<div data-role="navbar">
	<ul>
		<li><a href="/home" rel="external" target="_parent" <?php if ($title=="Home") echo "class='ui-btn-active ui-state-persist'"; ?> >Home</a></li>

		
		<?php

				echo '<li><a id="search" href="/search" rel="external" target="_parent"';
				 	if ($title=="Search") echo "class='ui-btn-active ui-state-persist'"; 
				echo '>Search</a></li>';

				echo '<li><a id="post" href="/post" rel="external" target="_parent"';
				 	if ($title=="Update") echo "class='ui-btn-active ui-state-persist'";
				echo '>Update</a></li>';
                echo '<li><a id="full" href="/home/full_site" rel="external" target="_parent">Full Site</a></li>';

		?>





	</ul>
</div>
