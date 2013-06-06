<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Settings_model extends CI_Model {


    public function __construct()
    {
        $this->load->database();
    }


    public function get_user_state()
    {

        $this->db->select('members.zipcode', FALSE);
        $this->db->from('members');
        $this->db->where('members.member_id', $this->session->userdata('memberid'));
        $query = $this->db->get();
        $row = $query->row();
        $zipcode = $row->zipcode;

        $query2 = $this->db->query("SELECT DISTINCT `state`  FROM `zipcodes` WHERE `zipcode` = '" .$zipcode. "'");

        return $query2->row();

    }



}