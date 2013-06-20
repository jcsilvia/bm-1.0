<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'email'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model(array('Post_model','Home_model'));
    }



    public function index()
    {

        //check for an existing session
        if($this->session->userdata('memberid'))
        {
            //set data array for view
            $data['title'] = 'Update';
            $data['username'] = $this->session->userdata('username');

            $state = $this->Home_model->get_user_state();
            $data['user_state'] = $state;
            $data['all_states'] = $this->Home_model->get_all_states();
            $data['vendors'] = $this->Post_model->get_vendors_by_state($state);
            $data['products'] = $this->Post_model->get_products(4);
            $data['product_categories'] = $this->Post_model->get_product_categories();


            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('price', 'Price', 'trim|required|max_length[10]|xss_clean|numeric');
            $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|max_length[4]|xss_clean|numeric');

            $this->output->nocache(); // set http header to disable caching if user hits back button

            if ($this->form_validation->run() === FALSE)
            {

                //load views
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sub_nav.php', $data);
                $this->load->view('post', $data);
                $this->load->view('templates/footer');

            }

            else
            {

                $this->Post_model->set_availability();
                $this->session->set_flashdata('flashSuccess', 'Product update successful');
                redirect('post', 'location');

            }

        }



        else
        {

            redirect('home', 'location');

        }

    }

    public function add_vendor()
    {
        if($this->session->userdata('memberid'))
        {
            //set data array for view
            $data['title'] = 'Update';
            $data['username'] = $this->session->userdata('username');
            $state = $this->Home_model->get_user_state();
            $data['user_state'] = $state;
            $data['all_states'] = $this->Home_model->get_all_states();


            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('vendor_name', 'Merchant Name', 'trim|required|min_length[4]|xss_clean|is_unique[vendors.vendor_name]');
            $this->form_validation->set_rules('address1', 'Address 1', 'trim|required|max_length[50]|xss_clean');
            $this->form_validation->set_rules('address2', 'Address 2', 'trim|xss_clean|max_length[50]');
            $this->form_validation->set_rules('city', 'City', 'trim|xss_clean|max_length[50]|required');
            $this->form_validation->set_rules('state', 'State', 'trim|xss_clean|required');
            $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required|min_length[5]|max_length[10]|xss_clean');
            $this->form_validation->set_rules('phone_number', 'Phone', 'trim|xss_clean|min_length[14]|max_length[14]|required');

            $this->output->nocache(); // set http header to disable caching if user hits back button

            if ($this->form_validation->run() === FALSE)
            {

                //load views
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sub_nav.php', $data);
                $this->load->view('add_vendor', $data);
                $this->load->view('templates/footer');

            }

            else
            {

                $this->Post_model->create_vendor();
                $this->session->set_flashdata('flashSuccess', 'Merchant added successfully');
                redirect('post', 'location');

            }


        }
        else
        {

            redirect('home', 'location');

        }
    }


    function get_vendors($state){

        header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($this->Post_model->get_vendors_by_state($state)));
    }


    function get_products($product_subcategory_id){

        header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($this->Post_model->get_products($product_subcategory_id)));
    }



    public function add_product()
    {
        if($this->session->userdata('memberid'))
        {
            //set data array for view
            $data['title'] = 'Update';
            $data['username'] = $this->session->userdata('username');
            $data['product_categories'] = $this->Post_model->get_product_categories();



            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('product_categories', 'Product Category', 'trim|required|xss_clean]');
            $this->form_validation->set_rules('product_name', 'Product Name', 'trim|required|max_length[50]|xss_clean|is_unique[products.product_name]');
            $this->form_validation->set_rules('product_description', 'Product Description', 'trim|required|xss_clean|max_length[255]');

            $this->output->nocache(); // set http header to disable caching if user hits back button

            if ($this->form_validation->run() === FALSE)
            {

                //load views
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sub_nav.php', $data);
                $this->load->view('add_product', $data);
                $this->load->view('templates/footer');

            }

            else
            {

                $this->Post_model->create_product();
                $this->session->set_flashdata('flashSuccess', 'product added successfully');
                redirect('post', 'location');

            }


        }
        else
        {

            redirect('home', 'location');

        }
    }



}