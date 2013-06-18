<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Post_model extends CI_Model {


    public function __construct()
    {
        $this->load->database();
    }


    public function get_vendors_by_state($state)
    {

        $query = $this->db->query("SELECT CONCAT(ve.vendor_name, ' - ', ad.city) AS vendor, ad.address_id
                                   FROM vendors ve, addresses ad
                                   WHERE ad.vendor_id = ve.vendor_id
                                        AND ad.state = '" .$state. "'
                                        AND ve.is_active = 1");

        $result = array();

        if($query->result()){

            foreach ($query->result() as $row)
                {
                    $result[$row->address_id]= $row->vendor;
                }

            return $result;

        }

        else {
            return FALSE;
        }

    }



    public function get_product_categories()
    {
        //get ammo for now
        $parent_category_id = 1;

        $this->db->select('product_category_id, category_name',FALSE);
        $this->db->from('product_categories');
        $this->db->where('parent_category_id', $parent_category_id);
        $this->db->order_by("product_category_id");
        $query = $this->db->get();

        $result = array();

        foreach ($query->result() as $row)
        {
            $result[$row->product_category_id]= $row->category_name;
        }

        return $result;

    }

    public function get_products($product_subcategory_id)
    {



        $this->db->select('product_id, product_subcategory_id, product_name',FALSE);
        $this->db->from('products');
        $this->db->where('product_subcategory_id', $product_subcategory_id);
        $this->db->order_by("product_name");
        $query = $this->db->get();

        $result = array();

        foreach ($query->result() as $row)
        {
            $result[$row->product_id]= $row->product_name;
        }

        return $result;

    }

    public function set_availability()
    {
        $product_data = array(
            'product_id' => $this->input->post('products'),
            'address_id' => $this->input->post('vendors'),
            'member_id' => $this->session->userdata('memberid'),
            'in_stock' => $this->input->post('in_stock'),
            'price' => $this->input->post('price'),
            'quantity' => $this->input->post('quantity')
        );

        //insert member data
        $this->db->insert('product_availability', $product_data);

    }

    public function create_vendor()
    {
        $vendor_data = array(
            'vendor_name' => $this->input->post('vendor_name')
        );

        //insert member data
        $this->db->insert('vendors', $vendor_data);

        $this->db->select('vendor_id');
        $this->db->from('vendors');
        $this->db->where('vendor_name',$this->input->post('vendor_name'));
        $query = $this->db->get();

        $row = $query->row();
        $vendor_id = $row->vendor_id;

        $phone = preg_replace( '/\D/', '',$this->input->post('phone_number') );

        $address_data = array(
            'vendor_id' => $vendor_id,
            'address1' => $this->input->post('address1'),
            'address2' => $this->input->post('address2'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'zipcode' => $this->input->post('zipcode'),
            'phone_number' => $phone
        );

        $this->db->insert('addresses', $address_data);

    }


    public function create_product()
    {


        $product_data = array(

            'product_category_id' => $this->input->post('category_id'),
            'product_subcategory_id' => $this->input->post('product_categories'),
            'product_name' => $this->input->post('product_name'),
            'product_description' => $this->input->post('product_description')
        );

        $this->db->insert('products', $product_data);

    }


}