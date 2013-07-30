<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contest extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->model(array('Home_model','Contest_model'));
        $this->load->helper(array('form', 'url'));

    }


    public function index()
    {


        // check for the session
        if($this->session->userdata('memberid'))
        {

            $data['title'] = 'Contest';
            $data['username'] = $this->session->userdata('username');
            $data['user_rewards'] = $this->Home_model->get_rewards();




            include 'mobile.php';
            if(Mobile::is_mobile()) {
                $this->load->view('mobile/m_contest', $data);

            } else {

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sub_nav.php', $data);
                $this->load->view('contest', $data);
                $this->load->view('templates/footer');
            }

        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'location');
        }



    }


public function enter_contest()
    {
        if($this->session->userdata('memberid'))

        {

            $user_rewards = $this->Home_model->get_rewards();

            if ($user_rewards < 500)
            {
                $this->session->set_flashdata('flashSuccess', 'You do not have enough points to enter at this time');
                redirect('contest', 'location');
            }
            else
            {
                $this->Contest_model->enter_contest();
                $this->session->set_flashdata('flashSuccess', 'Contest entered successfully');
                redirect('contest', 'location');
            }

        }

        else

        {

            //If no session, redirect to login page
            redirect('login', 'location');

        }
    }

public function contest_rules()
    {
        if($this->session->userdata('memberid'))

        {

            $data['title'] = 'Contest';
            $data['user_rewards'] = $this->Home_model->get_rewards();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sub_nav.php', $data);
            $this->load->view('contest_rules.php', $data);
            $this->load->view('templates/footer');

        }

        else

        {

        //If no session, redirect to login page
            redirect('login', 'location');

        }

    }

}