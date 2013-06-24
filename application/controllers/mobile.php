<?php
class Mobile {
	
	public function is_mobile() {

        $this->load->library('session');

		$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
		$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
		$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
		$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
		$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
        $winphone = strpos($_SERVER['HTTP_USER_AGENT'],"Windows Phone");

		//for test purpose
		//$firefox = strpos($_SERVER['HTTP_USER_AGENT'],"Firefox");

        if ( $this->session->userdata('full_site'))
        {
            return false;
        }

        else

        {
            //if ($iphone || $android || $palmpre || $ipod || $berry || $firefox == true)
            if ($iphone || $android || $palmpre || $ipod || $berry || $winphone == true)
            {

                return true;

            }

            return false;
        }
	}
}
?>
