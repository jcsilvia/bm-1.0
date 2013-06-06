<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Email_model extends CI_Model {


    public function __construct()
    {
        $this->load->database();
    }


    public function validate_email($validation_string = 0)
    {

        $query = "SELECT member_id from members where validation_string = ?";
        $result = $this->db->query($query, $validation_string);

        if ($result->num_rows() == 1)
        {

            $row = $result->row();

            $update_activated = "UPDATE `members` SET is_email_verified = 1 WHERE validation_string = ? AND ?";

            $this->db->query($update_activated, array($validation_string, $row->member_id));

            return TRUE;
        }
        else
        {

            return FALSE;

        }


    }


}