<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home_model extends CI_Model {


    public function __construct()
    {
        $this->load->database();
    }


    public function get_user_state()
    {

        $this->db->select('members.zipcode', FALSE);
        $this->db->from('members');
        $this->db->where('members.member_id', $this->session->userdata('memberid'));
        $query = $this->db->get();
        $row = $query->row();
        $zipcode = $row->zipcode;

        $query2 = $this->db->query("SELECT DISTINCT `state`  FROM `zipcodes` WHERE `zip` = '" .$zipcode. "'");
        $row = $query2->row();
        $state = $row->state;
        return $state;

    }

    public function get_average_price_for_state($state)
    {

        $query = $this->db->query("SELECT po.product_id, po.product_name, ROUND(AVG(DISTINCT(pa.price/pa.quantity)), 2) average_price, ad.state
                                    FROM product_availability pa, addresses ad, products po
                                    WHERE pa.vendor_id = ad.vendor_id
                                        AND pa.product_id = po.product_id
                                        AND pa.in_stock = 'Yes'
                                        AND ad.state = '" .$state. "'
                                        AND pa.created_date > (CURRENT_DATE - 1)
                                        GROUP BY ad.state, po.product_id LIMIT 10");

        return $query->result_array();
    }

    public function get_cheapest_price_for_state($state)
    {
        $query = $this->db->query("CALL get_cheapest_ammo('" .$state. "')");

        return $query->result_array();

    }

}