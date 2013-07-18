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
               $data['user_state'] = $this->Home_model->get_user_state();
               $data['user_rewards'] = $this->Home_model->get_rewards();
               $data['state_ammo_prices'] = $this->Home_model->get_average_price_for_state($data['user_state']->state);
               $data['cheap_ammo_prices'] = $this->Home_model->get_cheapest_price_for_state($data['user_state']->state);

               include 'mobile.php';
               if(Mobile::is_mobile()) {
                   $this->load->view('mobile/m_home', $data);

               } else {

               $this->load->view('templates/header', $data);
               $this->load->view('templates/sub_nav.php', $data);
               $this->load->view('home.php', $data);
               $this->load->view('templates/footer');
               }
           }

       else

           {

             //If no session, redirect to home_not_logged_in page

               //$data['title'] = 'Welcome to Bullet-Monkey';
               $data['ammo_prices'] = $this->Home_model->get_latest_updates();
			   include 'mobile.php';
			   if(Mobile::is_mobile()) {
	               $this->load->view('mobile/m_home_not_logged_in');
				  
				} else {
	               $this->load->view('templates/homepage_header', $data);
	               $this->load->view('home_not_logged_in');
	               $this->load->view('templates/footer');
				}
           }
     }

public function logout()
    {
        // destroy the session
        $this->session->unset_userdata('memberid', 'username', 'full_site');
        $this->session->sess_destroy();
        $this->not_logged_in();
    }



public function not_logged_in()
    {
        //in any case the session is not present, call this function to redirect to the login page
        redirect('login', 'location');
    }






public function privacy()
    {

        if($this->session->userdata('memberid'))

        {

            $data['title'] = 'Privacy statement, how Bullet-Monkey uses your data';
            $data['user_rewards'] = $this->Home_model->get_rewards();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sub_nav.php', $data);
            $this->load->view('privacy.php', $data);
            $this->load->view('templates/footer');

        }

        else

        {




            $this->load->view('templates/homepage_header');
            $this->load->view('privacy.php');
            $this->load->view('templates/footer');

        }

    }


    public function terms()
    {
        if($this->session->userdata('memberid'))

        {

            $data['title'] = 'Terms and conditions of use of Bullet-Monkey';
            $data['user_rewards'] = $this->Home_model->get_rewards();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sub_nav.php', $data);
            $this->load->view('terms.php', $data);
            $this->load->view('templates/footer');

        }

        else

        {




            $this->load->view('templates/homepage_header');
            $this->load->view('terms.php');
            $this->load->view('templates/footer');

        }

    }



    public function contact()
    {
        if($this->session->userdata('memberid'))

        {

            $data['title'] = 'How to contact us for support or follow us on twitter';
            $data['user_rewards'] = $this->Home_model->get_rewards();


            include 'mobile.php';
            if(Mobile::is_mobile()) {
                $this->load->view('mobile/m_contact', $data);

            }
            else {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sub_nav.php', $data);
                $this->load->view('contact.php', $data);
                $this->load->view('templates/footer');
            }





        }

        else

        {




            $this->load->view('templates/homepage_header');
            $this->load->view('contact.php');
            $this->load->view('templates/footer');

        }

    }



    public function about()
    {
        if($this->session->userdata('memberid'))

        {

            $data['title'] = 'About us and why we want to help find cheap local ammunition';
            $data['user_rewards'] = $this->Home_model->get_rewards();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sub_nav.php', $data);
            $this->load->view('about.php', $data);
            $this->load->view('templates/footer');

        }

        else

        {




            $this->load->view('templates/homepage_header');
            $this->load->view('about.php');
            $this->load->view('templates/footer');

        }

    }

    public function full_site()
    {

        if($this->session->userdata('full_site') == 1 )
        {
            $this->session->unset_userdata('full_site');

        }
        else
        {
            $this->session->set_userdata('full_site', 1);
        }
            redirect('/home/', 'refresh');

    }

    public function flag_entry()
    {
        $pid = ($this->uri->segment(3));
        $this->load->view('mobile/m_redirect.php');
        $this->Home_model->flag_entry($pid);
        $this->session->set_flashdata('flashSuccess', 'Entry Flagged for Deletion');
        redirect('/home/', 'location');


    }

}