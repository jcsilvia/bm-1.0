<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {

function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('Signup_model');
    }



public function index()
{
    //test to see if a user is already logged in and reroute to home
    if ($this->session->userdata('memberid') == false)
        {
            $data['nav'] = 'Signup';
            $data['title'] = 'Sign-up for Bullet-Monkey. Reap the rewards of being a member today.';
            $data['keywords'] = 'Bullet-Monkey, Signup, Account, in-stock, cheap, ammunition';
            $data['description'] = 'Sign-up for Bullet-Monkey. Reap the rewards of being a member today.';

            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[20]|xss_clean|is_unique[members.user_name]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[15]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[50]|xss_clean|is_unique[members.email_address]');
            $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required|min-length[5]|max_length[5]|numeric|xss_clean');




            $validation_string = $this->generateRandomString();//get the email validation string to send

            //populate validation email parameters
            $email_to = $this->input->post('email');
            $subject = 'Bullet-Monkey.com Email Confirmation';
            $message = 'Thanks for signing up for Bullet-Monkey.com. Click the link below to validate the email used to register. <br><br>' . anchor('/email/confirmation_email/' . $validation_string, 'Click here to validate email.') . '<br><br>Regards, <br>The Bullet-Monkey.com team';

            $this->output->nocache(); // set http header to disable caching if user hits back button
            if ($this->form_validation->run() === FALSE)
                {

				   include 'mobile.php';
				   if(Mobile::is_mobile()) {
		               $this->load->view('mobile/m_signup');

					} else {
                    	$this->load->view('templates/homepage_header', $data);
                    	$this->load->view('signup');
                    	$this->load->view('templates/footer');
					}
                }
            else
                {


                            $this->Signup_model->register_user($validation_string);
                            $this->send_grok_email($email_to, $subject, $message);
                            $this->session->set_flashdata('flashSuccess', 'Registration successful');
                            redirect('home', 'location');



                }
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

private function send_grok_email($email_to = NULL, $subject = NULL, $message = NULL)
    {


        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => '465',
            'smtp_user' => 'support@bullet-monkey.com', //for testing only, change this to admin@grokki.com for production
            'smtp_pass' => 'viper123', //change this for check in and deployment
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'  => "\r\n"
        );
        $this->load->library('email', $config);
        //$this->email->set_newline("\r\n"); //only for text email, not html

        // Set to, from, message, etc.

        $this->email->from('support@bullet-monkey.com', 'Bullet-Monkey Administrator'); //change this to admin@grokki.com for production
        $this->email->to($email_to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();

        return TRUE;

    }

}