<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->database();
        $this->load->model(array('Post_model','Home_model','Search_model'));
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }


public function index()
    {


        if($this->session->userdata('memberid'))
            {

                //unset any prior session search parameters
                $this->session->unset_userdata('search_state', 'search_product', 'search_product_id', 'offset', 'all_products','search_product_category');

                //config for pagination class
                $config['base_url'] = base_url() . "search/results";
                $config['per_page'] = 10;
                $config['uri_segment'] = 3;
                $config['next_link'] = '>';
                $config['prev_link'] = '<';
                $config['last_link'] = FALSE;
                $config['first_link'] = FALSE;


                //implement pagination and pass the correct parameters to the model
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


                $data['title'] = 'Search';
                $data['username'] = $this->session->userdata('username');


                    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                    $this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('products', 'Product', 'trim|required|xss_clean');

                    $this->output->nocache(); // set http header to disable caching if user hits back button

                    if ($this->form_validation->run() === FALSE)
                    {



                        $data['product_categories'] = $this->Post_model->get_product_categories();
                        $data['products'] = $this->Post_model->get_products(4);
                        $data['all_states'] = $this->Home_model->get_all_states();
                        $data['user_state'] = $this->Home_model->get_user_state();


                        include 'mobile.php';
                        if(Mobile::is_mobile()) {
                            $this->load->view('mobile/m_search', $data);

                        } else {

                        	$this->load->view('templates/header', $data);
                        	$this->load->view('templates/sub_nav.php', $data);
                        	$this->load->view('search', $data);
                        	$this->load->view('templates/footer');
                        }

                    }
                    else
                    {

                                $this->session->set_userdata('search_state', $this->input->post('state'));
                                $this->session->set_userdata('search_product_id', $this->input->post('products'));
                                $this->session->set_userdata('all_products', $this->input->post('all_products'));
                                $this->session->set_userdata('search_product', $this->Search_model->get_product_name($this->input->post('products')));
                                $this->session->set_userdata('search_product_category', $this->Search_model->get_product_category($this->input->post('products')));
                                $data['product_name'] = $this->session->userdata('search_product');
                                $data['search_state'] = $this->session->userdata('search_state');
                                $data['product_category'] = $this->session->userdata('search_product_category');
                                $data['all_products_flag'] = $this->session->userdata('all_products');


                        $config['total_rows'] = $this->Search_model->count_all_search_results();
                        $this->pagination->initialize($config);
                        $data["links"] = $this->pagination->create_links();

                        //pass pagination, data and parameters to the view
                        $data['total'] = $config['total_rows'];
                        $data['per_page'] = $config['per_page'];
                        $data['searches'] = $this->Search_model->search($config["per_page"], $page);


                        include 'mobile.php';
                        if(Mobile::is_mobile()) {

                            $this->load->view('mobile/m_search_results', $data);

                        } else {

                        	$this->load->view('templates/header', $data);
                        	$this->load->view('templates/sub_nav.php', $data);
                        	$this->load->view('search_results', $data);
                        	$this->load->view('templates/footer');
                        }

                    }

            }

        else
            {

                redirect('home', 'location');

            }

    }

public function results()
    {

        if($this->session->userdata('memberid'))
        {

            //config for pagination class
            $config['base_url'] = base_url() . "search/results";
            $config['per_page'] = 10;
            $config['uri_segment'] = 3;
            $config['next_link'] = '>';
            $config['prev_link'] = '<';
            $config['last_link'] = 'Last';
            $config['first_link'] = 'First';


            //implement pagination and pass the correct parameters to the model
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            $data['title'] = 'Search';
            $data['username'] = $this->session->userdata('username');

            $config['total_rows'] = $this->Search_model->count_all_search_results();
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();

            //pass pagination, data and parameters to the view
            $data['total'] = $config['total_rows'];
            $data['per_page'] = $config['per_page'];
            $data['searches'] = $this->Search_model->search($config["per_page"], $page);


		   	include 'mobile.php';
		   	if(Mobile::is_mobile()) {
               $this->load->view('mobile/m_search_results', $data);

			} else {
            	$this->load->view('templates/header', $data);
            	$this->load->view('templates/sub_nav.php', $data);
            	$this->load->view('search_results', $data);
            	$this->load->view('templates/footer');
			}
        }
        else
        {
            redirect('home', 'location');
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

    public function new_search()
    {
        redirect('search', 'location');
    }


    public function flag_entry()
    {
        $pid = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $this->Home_model->flag_entry($pid);
        $this->session->set_flashdata('flashSuccess', 'Entry Flagged for Deletion');
        redirect('/search/', 'location');


    }


}