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


    public function get_all_states()
    {


        $arr_states = array('AA','AE','AP','AS','DC','FM','GU','MH','MP','PR','PW','VI');

        $this->db->select('state, fullstate', FALSE);
        $this->db->from('zipcodes');
        $this->db->where_not_in('state',$arr_states);
        $this->db->order_by('state');
        $query = $this->db->get();

        $result = array();

        foreach ($query->result() as $row)
        {
            $result[$row->state]= $row->fullstate;
        }

        return $result;

    }


    public function get_average_price_for_state($state)
    {

        $query = $this->db->query("SELECT po.product_id, po.product_name, ROUND(AVG(DISTINCT(pa.price/pa.quantity)), 2) average_price, ad.state
                                    FROM product_availability pa, addresses ad, products po
                                    WHERE pa.address_id = ad.address_id
                                        AND pa.product_id = po.product_id
                                        AND pa.in_stock = 'Yes'
                                        AND ad.state = '" .$state. "'
                                        AND pa.created_date > date_sub(current_timestamp(), interval 14 day)
                                        GROUP BY ad.state, po.product_id
                                        ORDER BY average_price LIMIT 10");

        return $query->result_array();
    }

    public function get_cheapest_price_for_state($state)
    {
        $query = $this->db->query("CALL get_cheapest_ammo('" .$state. "')");

        return $query->result_array();

    }

    public function get_average_price()
    {
         $query = $this->db->query("SELECT po.product_id, po.product_name, ROUND(AVG(DISTINCT(pa.price/pa.quantity)), 2) average_price
                                      FROM product_availability pa, addresses ad, products po
                                      WHERE pa.address_id = ad.address_id
                                        AND pa.product_id = po.product_id
                                        AND pa.in_stock = 'Yes'
                                        AND pa.created_date > date_sub(current_timestamp(), interval 14 day)
                                        GROUP BY po.product_id
                                        ORDER BY average_price ASC
                                        LIMIT 20
                                        ");

        return $query->result_array();

    }

}



