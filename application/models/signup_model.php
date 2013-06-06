<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Signup_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();

    }


    public function register_user($validation_string = NULL)
    {
        //generate random numbers to use as salt for password hashing
        $random1 = substr(number_format(time() * rand(),0,'',''),0,5);
        $random2 = substr(number_format(time() * rand(),0,'',''),0,5);
        $random = $random1 . $random2;

        //generate random string for email validation


        $password = sha1($random1 . $this->input->post('password') . $random2);

        //form data to insert
            $memberdata = array(
                'user_name' => $this->input->post('username'),
                'user_password' => $password,
                'email_address' => $this->input->post('email'),
                'password_salt' => $random,
                'validation_string' => $validation_string,
                'zipcode' => $this->input->post('zipcode')
            );

        //insert member data
            $this->db->insert('members', $memberdata);

        //build memberid query
            $this->db->select('member_id');
            $this->db->from('members');
            $this->db->where('email_address',$this->input->post('email'));
            $query = $this->db->get();

            $row = $query->row();
            $memberid = $row->member_id;
            $username = $this->input->post('username');


        $this->session->set_userdata('memberid', $memberid); //set the session userdata to the memberid for future lookups
        $this->session->set_userdata('username', $username);




            return true;
    }







}

