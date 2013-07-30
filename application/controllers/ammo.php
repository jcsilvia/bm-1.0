<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Ammo extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model(array('Ammo_model', 'Home_model'));
    }


    function index()

    {
            if ($this->uri->segment(2,0))
            {
                $ammo_type = $this->uri->segment(2,0);
            }

            else
            {
                $ammo_type = '556';
            }

            $data['online_ammo'] = $this->Ammo_model->get_online_ammo($ammo_type);
            $data['ammo_nav'] = $this->Ammo_model->get_online_ammo_nav();
            $data['ammo_type'] = $ammo_type;


            if($this->session->userdata('memberid'))

            {

                $data['title'] = 'Online Ammo';
                $data['user_rewards'] = $this->Home_model->get_rewards();

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sub_nav.php', $data);
                $this->load->view('ammo.php', $data);
                $this->load->view('templates/footer');

            }

            else

            {

                $data['nav'] = 'Online Ammo';
                $data['title'] = 'Bullet-Monkey: find ammo in-stock ' . $ammo_type;
                $data['keywords'] = 'Bullet-Monkey,ammo,ammunition,instock,in-stock,' . $ammo_type;
                $data['description'] = $ammo_type . ' ammo in-stock and available online at Bullet-Monkey.';


                $this->load->view('templates/homepage_header', $data);
                $this->load->view('ammo.php', $data);
                $this->load->view('templates/footer');

            }

    }


}