<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contest_model extends CI_Model {


    public function __construct()
    {
        $this->load->database();
        $this->load->helper('date');
    }


    public function enter_contest()
    {



        $monthstring = mdate("%m");
        $yearstring = mdate("%Y");

        $contest_data = array(
            'member_id' => $this->session->userdata('memberid'),
            'contest_month' => $monthstring,
            'contest_year' => $yearstring,
            'is_winner' => '0'
        );

        //insert member data
        $this->db->insert('contests', $contest_data);

        $reward_data = array(
            'member_id' => $this->session->userdata('memberid'),
            'action_id' => '3',
            'reward_points' => '-500'
        );

        $this->db->insert('rewards', $reward_data);


    }

}