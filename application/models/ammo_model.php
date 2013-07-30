<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ammo_model extends CI_Model {


    public function __construct()
    {
        $this->load->database();
    }


    public function get_online_ammo($ammo_type)
    {

        $this->db->select('product_category_id', FALSE);
        $this->db->from('product_categories');
        $this->db->where('product_categories.url', $ammo_type);
        $query = $this->db->get();
        $row = $query->row();
        $ammo_id = $row->product_category_id;

        $query = $this->db->query("SELECT oa.url as product_url, oa.title, oa.price, ve.vendor_name, ve.url as vendor_url, ROUND(time_to_sec(timediff(current_timestamp(), oa.last_updated_date)) / 3600) as last_updated_date, round((oa.price / vp.quantity), 2) as price_per_round
                                    FROM online_availability oa, vendors ve, vendor_parser vp
                                    WHERE oa.in_stock = 'Yes'
                                        AND oa.vendor_id = ve.vendor_id
                                        AND oa.parser_id = vp.parser_id
                                        AND oa.product_category_id = " . $ammo_id ." ORDER BY oa.price ASC");
        return $query->result_array();


    }

    public function get_online_ammo_nav()
    {

        $query = $this->db->query("SELECT category_name, url FROM product_categories WHERE url IS NOT NULL AND parent_category_id = 1");
        return $query->result_array();


    }

}