<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('Login_model');

    }

public function index($msg = NULL)
    {
        // user has not logged in
        if ($this->session->userdata('memberid') == false)
            {
                $data['nav'] = 'Login';
                $data['title'] = 'Login to Bullet-Monkey. Get access to local, in-stock ammo and enter to win prizes';
                $data['keywords'] = 'Bullet-Monkey, login, in-stock, cheap, ammunition, ammo';
                $data['description'] = 'Login to Bullet-Monkey. Get access to local, in-stock ammo and enter to win prizes';

                $data['msg'] = $msg;

                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
                $this->form_validation->set_rules('password', 'Password', 'trim|required');


                if ($this->form_validation->run() === FALSE)
                {
                   $this->output->nocache(); // set http header to disable caching if user hits back button
				   include 'mobile.php';
				   if(Mobile::is_mobile()) {
		               $this->load->view('mobile/m_login', $data);

					} else {
                    	$this->load->view('templates/homepage_header', $data);
                    	$this->load->view('login', $data);
                    	$this->load->view('templates/footer');
					}
                }
                else
                {

                    if( $this->Login_model->login_user() === TRUE)
                    {

                            redirect('home', 'location');

                    }
                    else
                    {
                        $data['msg'] = 'Invalid username or password';
                        $this->output->nocache(); // set http header to disable caching if user hits back button
					   	include 'mobile.php';
					   	if(Mobile::is_mobile()) {
			             $this->load->view('mobile/m_login', $data);

					} else {
                        	$this->load->view('templates/homepage_header', $data);
                        	$this->load->view('login', $data);
                        	$this->load->view('templates/footer');
						}
                    }
                }
            }
        else
            {
                redirect('home', 'location');

            }
    }


    public function forgot_password()
    {

        if ($this->session->userdata('memberid') == false)
        {

            $data['title'] = 'Login';
            $data['nav'] = 'Login';
            $data['keywords'] = 'Bullet-Monkey, login, forgot password';
            $data['description'] = 'Reset your password if you forgot it.';

            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');


            if ($this->form_validation->run() === FALSE)
            {
                $this->output->nocache(); // set http header to disable caching if user hits back button
                include 'mobile.php';
                if(Mobile::is_mobile()) {
                    $this->load->view('mobile/m_forgot_password', $data);

                } else {
                    $this->load->view('templates/homepage_header', $data);
                    $this->load->view('forgot_password', $data);
                    $this->load->view('templates/footer');
                }
            }
            else
            {

                $data['results'] = $this->Login_model->forgot_password();

                if ($data['results']->email_address)
                    {

                        $email_to = $data['results']->email_address;
                        $subject = 'Reset your Bullet-Monkey password';
                        $message = 'We received a request to reset your password for account ' . $data['results']->user_name . '. Click the link below to reset your password. <br><br>' . anchor('/email/reset_password/' . $data['results']->validation_string, 'Click here to reset your password.') . '<br><br>Regards, <br>The Bullet-monkey.com team';

                        $config = Array(
                            'protocol' => 'smtp',
                            'smtp_host' => 'ssl://smtp.gmail.com',
                            'smtp_port' => '465',
                            'smtp_user' => 'support@bullet-monkey.com',
                            'smtp_pass' => 'viper123',
                            'mailtype'  => 'html',
                            'charset'   => 'utf-8',
                            'newline'  => "\r\n"
                        );
                        $this->load->library('email', $config);

                        // Set to, from, message, etc.
                        $this->email->from('support@bullet-monkey.com', 'Bullet-Monkey Administrator');
                        $this->email->to($email_to);
                        $this->email->subject($subject);
                        $this->email->message($message);
                        $this->email->send();

                    }

                $this->output->nocache(); // set http header to disable caching if user hits back button
                include 'mobile.php';
                if(Mobile::is_mobile()) {
                    $this->load->view('mobile/m_login', $data);

                } else {

                    $data['nav'] = 'Login';
                    $this->load->view('templates/homepage_header', $data);
                    $this->load->view('password_resent', $data);
                    $this->load->view('templates/footer');
                }


            }
        }
        else
        {
            redirect('home', 'location');

        }
    }

    public function reset_password($msg=NULL)
        {
            if ($this->session->userdata('memberid') == false)
                {

                    $data['title'] = 'Login';
                    $data['msg'] = $msg;
                    $validation_string = $this->input->post('validation_string');
                    $data['validation'] = $validation_string;

                    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                    $this->form_validation->set_rules('password1', 'Password', 'trim|required|xss_clean|min_length[8]|max_length[15]');
                    $this->form_validation->set_rules('password2', 'Password', 'trim|required|xss_clean|min_length[8]|max_length[15]');

                    $this->output->nocache(); // set http header to disable caching if user hits back button
                    if ($this->form_validation->run() === FALSE)
                        {

                            $this->load->view('templates/header', $data);
                            $this->load->view('reset_password', $data);
                            $this->load->view('templates/footer');

                        }
                    else
                        {

                            if ($this->Login_model->change_password() === TRUE)
                                {
                                    redirect('login', 'location');
                                }
                            else
                                {

                                        $data['msg'] = 'Passwords do not match';
                                        $this->load->view('templates/header', $data);
                                        $this->load->view('reset_password', $data);
                                        $this->load->view('templates/footer');
                                }
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

}