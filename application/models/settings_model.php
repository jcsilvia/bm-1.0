<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Settings_model extends CI_Model {


    public function __construct()
    {
        $this->load->database();
    }

    public function get_profile()
    {



            $this->db->select('members.member_id, members.user_name, members.email_address, members.is_email_verified, members.zipcode',FALSE);
            $this->db->from('members');
            $this->db->where('members.member_id', $this->session->userdata('memberid'));
            $query = $this->db->get();

            return $query->row();

    }

    public function set_profile()
    {



            $mdata = array(
                'user_name' => $this->input->post('username'),
                'zipcode' => $this->input->post('zipcode')
            );

            $this->db->where('member_id', $this->session->userdata('memberid'));
            $this->db->update('members', $mdata);





        $this->session->unset_userdata('username');
        $this->session->set_userdata('username', $this->input->post('username'));

        return TRUE;
    }

    public function change_password()
    {

        //get the users salt and old password
        $query = $this->db->query("SELECT LEFT(`password_salt`, 5) as `Lsalt`, RIGHT(`password_salt`, 5) as `Rsalt`, user_password as `user_password`  FROM `members` WHERE `member_id` = '" .$this->session->userdata('memberid'). "'");

        if ($query->num_rows() > 0)
        {
            //hash the form input to compare against the old password and itself
            $row = $query->row();
            $password = sha1($row->Lsalt . $this->input->post('oldpassword') . $row->Rsalt);
            $newpassword1 = sha1($row->Lsalt . $this->input->post('newpassword1') . $row->Rsalt);
            $newpassword2 = sha1($row->Lsalt . $this->input->post('newpassword2') . $row->Rsalt);

            if ($password == $row->user_password && $newpassword1 == $newpassword2)
            {
                $pdata = array(
                    'user_password' => $newpassword1
                );

                $this->db->where('member_id', $this->session->userdata('memberid'));
                $this->db->update('members', $pdata);

                return TRUE;
            }
            else
            {
                return FALSE;
            }

        }

        else
        {
            return FALSE;
        }

    }

    public function change_email()
    {

        $edata = array(
            'email_address' => $this->input->post('email'),
            'is_email_verified' => 0
        );

        $this->db->where('member_id', $this->session->userdata('memberid'));
        $this->db->update('members', $edata);

        return TRUE;

    }


    public function get_email()
    {

        $this->db->select('members.email_address');
        $this->db->from('members');
        $this->db->where('member_id', $this->session->userdata('memberid'));
        $query = $this->db->get();

        return $query->row();

    }


    public function change_validation_string($validation_string = NULL)
    {

        $vdata = array(
            'validation_string' => $validation_string
        );

        $this->db->where('member_id', $this->session->userdata('memberid'));
        $this->db->update('members', $vdata);

        return TRUE;

    }


}