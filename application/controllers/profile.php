<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->model(array('Profile_model','Home_model'));
        $this->load->helper(array('form', 'url'));

    }


    public function index()
    {

        $addressid = $this->uri->segment(2,0);

        $data['profile'] = $this->Profile_model->get_vendor_profile($addressid);
        $data['variable'] = $addressid;

        //check to see if we have geocoded this address and if not, geocode it
        $lng = $data['profile']->geolng;
        $lat = $data['profile']->geolat;

        if (trim($lng) || trim($lat) == FALSE)
        {
            $this->Profile_model->get_lat_long_from_address($addressid);
        }

        //format the phone number before we send it to the view
        $phone = $this->phone($data['profile']->phone_number);
        $data['phone'] = $phone;

        $data['title'] = 'Profile for ' . $data['profile']->vendor_name;

        // check for the session
        if($this->session->userdata('memberid'))
        {


            $data['username'] = $this->session->userdata('username');
            $data['user_rewards'] = $this->Home_model->get_rewards();


            include 'mobile.php';
            if(Mobile::is_mobile()) {
                $this->load->view('mobile/m_profile', $data);

            } else {

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sub_nav.php', $data);
                $this->load->view('profile', $data);
                $this->load->view('templates/footer');
            }

        }
        else
        {

            $this->load->view('templates/header', $data);
            $this->load->view('profile_not_logged_in', $data);
            $this->load->view('templates/footer');

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


    public function geocode ()
        {
            $this->Profile_model->geocode_existing_locations();

        }

}