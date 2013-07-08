<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'email'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model(array('Settings_model','Home_model'));
    }


    public function index()
    {

        //check for an existing session
        if($this->session->userdata('memberid'))
        {
            //set data array for view
            $data['title'] = 'Settings';
            $data['username'] = $this->session->userdata('username');
            $data['profile'] = $this->Settings_model->get_profile();
            $data['user_rewards'] = $this->Home_model->get_rewards();

            //set form validation rules
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[20]|xss_clean|update_unique[members.user_name.member_id.'. $this->session->userdata('memberid') .']');
            $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required|min-length[5]|numeric|xss_clean|valid_value[zipcodes.zip]');



            $this->output->nocache(); // set http header to disable caching if user hits back button
            if ($this->form_validation->run() === FALSE)
            {
                //load views
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sub_nav.php', $data);
                $this->load->view('settings', $data);
                $this->load->view('templates/footer');

            }
            else
            {
                $this->Settings_model->set_profile();
                $this->session->set_flashdata('flashSuccess', 'Profile updated successfully');
                redirect('home', 'location');
            }

        }



        else
        {

            redirect('home', 'location');

        }

    }

    public function change_password($msg = NULL)
    {
        if($this->session->userdata('memberid'))
        {

            $data['title'] = 'Settings';
            $data['username'] = $this->session->userdata('username');
            $data['msg'] = $msg;
            $data['user_rewards'] = $this->Home_model->get_rewards();

            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('oldpassword', 'previous Password', 'trim|required|xss_clean|min_length[8]|max_length[15]');
            $this->form_validation->set_rules('newpassword1', 'new Password', 'trim|required|xss_clean|min_length[8]|max_length[15]');
            $this->form_validation->set_rules('newpassword2', 'new Password', 'trim|required|xss_clean|min_length[8]|max_length[15]');


            $this->output->nocache(); // set http header to disable caching if user hits back button
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sub_nav.php', $data);
                $this->load->view('change_pass', $data);
                $this->load->view('templates/footer');
            }

            else
            {

                if( $this->Settings_model->change_password() === TRUE)
                {
                    $this->session->set_flashdata('flashSuccess', 'Password updated successfully');
                    redirect('settings', 'location');
                }
                else
                {
                    $data['msg'] = 'Password does not match';
                    $this->load->view('templates/header', $data);
                    $this->load->view('templates/sub_nav.php', $data);
                    $this->load->view('change_pass', $data);
                    $this->load->view('templates/footer');

                }
             }

         }
        else
        {
            redirect('home', 'location');
        }
    }



    public function change_email()
    {
        if($this->session->userdata('memberid'))
        {

            $data['title'] = 'Settings';
            $data['username'] = $this->session->userdata('username');
            $this->load->model(array('Post_model','Home_model','Search_model'));
            $data['user_rewards'] = $this->Home_model->get_rewards();

            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('email', 'new Email', 'trim|required|valid_email|max_length[50]|xss_clean|update_unique[members.email_address.member_id.'. $this->session->userdata('memberid') .']');

            $this->output->nocache(); // set http header to disable caching if user hits back button
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sub_nav.php', $data);
                $this->load->view('change_email', $data);
                $this->load->view('templates/footer');
            }

            else
            {
                    $this->Settings_model->change_email();
                    $this->session->set_flashdata('flashSuccess', 'Email updated successfully');
                    redirect('settings', 'location');

            }


        }
        else
        {

            redirect('home', 'location');

        }


    }


    public function validate_email()
    {
        if($this->session->userdata('memberid'))
        {
            $result = $this->Settings_model->get_email();
            $email_to = $result->email_address;
            $validation_string = $this->generateRandomString();//get the email validation string to send
            $this->Settings_model->change_validation_string($validation_string);
            $this->load->model(array('Post_model','Home_model','Search_model'));

            $subject = 'Bullet-monkey.com Email Validation';
            $message = 'Click the link below to validate the email used to register for Bullet-monkey.com. <br><br>' . anchor('/email/confirmation_email/' . $validation_string, 'Click here to validate email.') . '<br><br>Regards, <br>The Bullet-monkey.com team';

            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.gmail.com',
                'smtp_port' => '465',
                'smtp_user' => 'support@bullet-monkey.com',
                'smtp_pass' => 'viper123', //change this for check in and deployment
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'newline'  => "\r\n"
            );
            $this->load->library('email', $config);

            // Set to, from, message, etc.
            $this->email->from('support@bullet-monkey.com', 'Bullet-monkey Administrator'); //change this to admin@grokki.com for production
            $this->email->to($email_to);
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->send();


            $this->session->set_flashdata('flashSuccess', 'Validation email sent to ' . $email_to);
            redirect('settings', 'location');



        }
        else
        {

            redirect('home', 'location');

        }


    }

    private function generateRandomString($length = 15)
    {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }


}


