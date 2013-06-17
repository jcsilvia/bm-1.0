<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->model('Profile_model');
        $this->load->helper(array('form', 'url'));

    }


    public function index()
    {



    }


}