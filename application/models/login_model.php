<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function __construct()
        {
            $this->load->database();
        }


    public function login_user()
        {

            // get the user record
            $user = $this->input->post('username');
            $pass = $this->input->post('password');
            $query = $this->db->query("SELECT `member_id`, `user_name`, LEFT(`password_salt`, 5) as `Lsalt`, RIGHT(`password_salt`, 5) as `Rsalt`  FROM `members` WHERE `user_name` = '" .$user. "'" . "OR `email_address` = '" .$user. "'");

            if ($query->num_rows() > 0)
                {
                        $row = $query->row();
                        $password = sha1($row->Lsalt .$pass . $row->Rsalt);

                        $username = $row->user_name;

                        $this->db->where('user_name', $username);
                        $this->db->where('user_password', $password);
                        $query2 = $this->db->get('members');

                    if ($query2->num_rows() > 0)
                        {

                            // set session login
                            $this->session->sess_destroy();
                            $this->session->sess_create();
                            $this->session->set_userdata('memberid', $row->member_id);
                            $this->session->set_userdata('username', $username);
                            $this->db->query('UPDATE `members` SET last_login = NOW() WHERE member_id = ' . $row->member_id);

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

    public function forgot_password()
        {
            $user = $this->input->post('username');
            $query = $this->db->query("SELECT member_id FROM members WHERE user_name = '" .$user. "'" . " OR email_address = '" .$user. "'");

            if ($query->num_rows() > 0)
                {
                    $row = $query->row();
                    $validation_string = $this->generateRandomString();
                    $data = array(
                        'ValidationString' => $validation_string
                    );
                    $this->db->where('member_id', $row->member_id);
                    $this->db->update('members', $data);

                    // return the memberid, email, and new valudationstring to the controller
                    $this->db->select('user_name, email_address, validation_string');
                    $this->db->from('members');
                    $this->db->where('member_id', $row->member_id);
                    $query2 = $this->db->get();

                    return $query2->row();


                }
            else
                {
                    return FALSE;
                }
        }


    public function change_password()
        {
            $password1 = $this->input->post('password1');
            $password2 = $this->input->post('password2');
            $string = $this->input->post('validation_string');

            //get the users salt and old password
            $query = $this->db->query("SELECT LEFT(`password_salt`, 5) as `Lsalt`, RIGHT(`password_salt`, 5) as `Rsalt` FROM `members` WHERE `validation_string` IS NOT NULL AND `validation_string` = '" .$string. "'");

            if ($query->num_rows() > 0)
            {
                //hash the form input to compare against the old password and itself
                $row = $query->row();
                $newpassword1 = sha1($row->Lsalt . $password1 . $row->Rsalt);
                $newpassword2 = sha1($row->Lsalt . $password2 . $row->Rsalt);

                if ($newpassword1 == $newpassword2)
                {
                    $pdata = array(
                        'user_password' => $newpassword1
                    );

                    $this->db->where('validation_string', $string);
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

    private function generateRandomString($length = 15)
    {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

}