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
               $data['nav'] = 'Home';
               $data['title'] = 'Bullet-Monkey - Crowd-sourcing ammo finder helps you search for local, in-stock ammo like 5.56, 9mm and 22lr.';
               $data['keywords'] = 'Bullet Monkey,ammo,ammunition,firearms,in-stock,223,556,9mm,22lr,308,45ACP,ar15,glock,ak47,cheap ammo, ammo for sale, ammunition for sale, cheap ammunition, in stock, instock ammo, ammo finder, ammo locator, ammo search';
               $data['description'] = 'Crowd-sourcing the search for local, in-stock ammunition like 5.56, 9mm, .45ACP, and .22lr.';
               $data['ammo_prices'] = $this->Home_model->get_latest_updates();
			   include 'mobile.php';
			   if(Mobile::is_mobile()) {
	               $this->load->view('mobile/m_home_not_logged_in');
				  
				} else {
	               $this->load->view('templates/homepage_header', $data);
	               $this->load->view('home_not_logged_in', $data);
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


            $data['title'] = 'Bullet-Monkey - Privacy statement, how Bullet-Monkey uses your data';
            $data['keywords'] = 'Bullet-Monkey, Privacy statement';
            $data['description'] = 'Privacy statement - How Bullet-Monkey uses your data';


            $this->load->view('templates/homepage_header', $data);
            $this->load->view('privacy.php', $data);
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


            $data['title'] = 'Bullet-Monkey - Terms of Use';
            $data['keywords'] = 'Bullet-Monkey, Terms of Use';
            $data['description'] = 'Terms and conditions of use of Bullet-Monkey';

            $this->load->view('templates/homepage_header', $data);
            $this->load->view('terms.php', $data);
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


            $data['title'] = 'Bullet-Monkey - How to contact us';
            $data['keywords'] = 'Bullet-Monkey, Contact, Customer Support, Help';
            $data['description'] = 'How to contact us for support or follow us on twitter';

            $this->load->view('templates/homepage_header', $data);
            $this->load->view('contact.php', $data);
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


            $data['title'] = 'Bullet-Monkey - About us and why we want to help find cheap local ammunition';
            $data['keywords'] = 'Bullet-Monkey, About, Background, 2nd Amendment, Constitution, in-stock, cheap, ammunition';
            $data['description'] = 'About Bullet-Monkey, supporting the 2nd Amendment and how we got started helping you find cheap ammunition';

            $this->load->view('templates/homepage_header', $data);
            $this->load->view('about.php', $data);
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