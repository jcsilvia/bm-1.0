<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller {

    function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->database();
            $this->load->model('Home_model');
        }



function index()

     {
        // check for the user session
       if($this->session->userdata('memberid'))

           {

               $data['title'] = 'Home';

               $state = $this->Home_model->get_user_state();
               $data['user_state'] = $state;
               $data['state_ammo_prices'] = $this->Home_model->get_average_price_for_state($state);
               $data['cheap_ammo_prices'] = $this->Home_model->get_cheapest_price_for_state($state);

               $this->load->view('templates/header', $data);
               $this->load->view('templates/sub_nav.php', $data);
               $this->load->view('home.php', $data);
               $this->load->view('templates/footer');

           }

       else

           {

             //If no session, redirect to home_not_logged_in page

               $data['title'] = 'Welcome to Bullet-Monkey';
               $data['ammo_prices'] = $this->Home_model->get_average_price();
			   //include 'mobile.php';
			   //if(Mobile::is_mobile()) {
	           //    $this->load->view('mobile/m_home_not_logged_in');
				  
				//} else {
	               $this->load->view('templates/homepage_header', $data);
	               $this->load->view('home_not_logged_in');
	               $this->load->view('templates/footer');
				//}
           }
     }

public function logout()
    {
        // destroy the session
        $this->session->unset_userdata('memberid', 'username');
        $this->session->sess_destroy();
        $this->not_logged_in();
    }



public function not_logged_in()
    {
        //in any case the session is not present, call this function to redirect to the login page
        redirect('login', 'location');
    }




}