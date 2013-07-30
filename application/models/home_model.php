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

        $query2 = $this->db->query("SELECT DISTINCT city, state  FROM zipcodes WHERE zip = '" .$zipcode. "'");
        $row = $query2->row();
        //$state = $row->state;
        //return $state;
        return $row;

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
                                        AND pa.product_availability_id NOT IN (select product_availability_id FROM product_availability_flag)
                                        GROUP BY ad.state, po.product_id
                                        ORDER BY average_price LIMIT 10");

        return $query->result_array();
    }

    public function get_cheapest_price_for_state($state)
    {
        $query = $this->db->query("CALL get_cheapest_ammo('" .$state. "')");

        return $query->result_array();

    }

    public function get_latest_updates()
    {
         $query = $this->db->query("SELECT pa.product_id, po.product_name, ad.vendor_id, ve.vendor_name, pa.address_id, ad.state, ROUND((price/quantity), 2) as price_per_round, ROUND(time_to_sec(timediff(current_timestamp(), pa.created_date)) / 3600) as last_updated, pa.product_availability_id, m.user_name
                                      FROM product_availability pa, products po, addresses ad, vendors ve, members m
                                        WHERE po.product_id = pa.product_id
                                          AND ad.vendor_id = ve.vendor_id
                                          AND ad.address_id = pa.address_id
                                          AND pa.member_id = m.member_id
                                          AND product_availability_id NOT IN (select product_availability_id from product_availability_flag)
                                          AND pa.created_date > (date_sub(current_timestamp, INTERVAL 7 DAY))
                                        ORDER BY last_updated ASC
                                        LIMIT 30;
                                        ");

        return $query->result_array();

    }

    public function flag_entry($pid)
    {
        //form data to insert
        $flag_data = array(
            'product_availability_id' => $pid,
            'member_id' => $this->session->userdata('memberid')
        );

        //insert member data
        $this->db->insert('product_availability_flag', $flag_data);
        return true;

    }


    public function get_rewards()
    {
        $query = $this->db->query("SELECT SUM(reward_points) AS reward FROM rewards WHERE member_id = " .$this->session->userdata('memberid'). " GROUP BY member_id;");

        $row = $query->row();
        $rewards = $row->reward;
        return $rewards;

    }

}



