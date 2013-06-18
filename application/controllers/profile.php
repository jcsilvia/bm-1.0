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

        $addressid = $this->uri->segment(2,0);

        // check for the session
        if($this->session->userdata('memberid'))
        {

            $data['title'] = 'Profile';
            $data['username'] = $this->session->userdata('username');


            $data['profile'] = $this->Profile_model->get_vendor_profile($addressid);
            $data['variable'] = $addressid;

            //format the phone number before we send it to the view
            $phone = $this->phone($data['profile']->phone_number);
            $data['phone'] = $phone;



                $this->load->view('templates/header', $data);
                $this->load->view('templates/sub_nav.php', $data);
                $this->load->view('profile', $data);
                $this->load->view('templates/footer');


        }
        else
        {
            //If no session, redirect to login page
            redirect('home', 'location');
        }



    }


    function phone ($str)
    {
        $strPhone = preg_replace("[^0-9]",'', $str);
        if (strlen($strPhone) != 10)
            return $strPhone;

        $strArea = substr($strPhone, 0, 3);
        $strPrefix = substr($strPhone, 3, 3);
        $strNumber = substr($strPhone, 6, 4);

        $strPhone = "(".$strArea.") ".$strPrefix."-".$strNumber;

        return ($strPhone);
    }


}