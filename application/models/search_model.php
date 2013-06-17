<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Search_model extends CI_Model {


    public function __construct()
        {
            $this->load->database();
            $this->load->library('session');
        }


    public function search($limit, $start)
        {
            //ensure these are cast as integers
            $offset = (int) $start;
            $limit = (int) $limit;

            $state = $this->session->userdata('search_state');
            $product = $this->session->userdata('search_product_id');

            $sql =
                "SELECT * FROM (
                  (SELECT pa.product_id, pro.product_name, pro.product_description, round((pa.price/pa.quantity),2) as price, ad.address_id, ve.vendor_name as vendor, ad.city, round(time_to_sec(timediff(now(), pa.created_date)) / 3600) as last_updated
                    FROM product_availability pa, products pro, addresses ad, vendors ve
                    WHERE pa.product_id = pro.product_id
                          AND pa.address_id = ad.address_id
                          AND ad.vendor_id = ve.vendor_id
                          AND pa.in_stock = 'Yes'
                          AND ad.state = ?
                          AND pa.created_date > date_sub(now(), interval 5 day)
                          AND pa.product_id = ?
                          AND NOT EXISTS
                                    (
                                      SELECT pa2.product_id, ad2.vendor_id
                                      FROM product_availability pa2, addresses ad2
                                      WHERE pa2.address_id = ad2.address_id
                                      AND pa2.address_id = pa.address_id
                                      AND pa2.product_id = pa.product_id
                                      AND pa2.in_stock = 'No'
                                      AND pa2.created_date > date_sub(now(), interval 4 hour)
                                      AND ad2.state = ?
                )
                  ORDER BY price ASC)
                 ) q1 LIMIT ?,?";

            $query = $this->db->query($sql, array($state,$product,$state,$offset,$limit));
            return $query->result_array();


        }


    public function count_all_search_results()
    {
        $state = $this->session->userdata('search_state');
        $product = $this->session->userdata('search_product_id');

        $sql =
            "SELECT * FROM
              (SELECT pa.product_id, pro.product_name, pro.product_description, (pa.price/pa.quantity) as price, ad.address_id, ve.vendor_name, ad.city
                FROM product_availability pa, products pro, addresses ad, vendors ve
                WHERE pa.product_id = pro.product_id
                      AND pa.address_id = ad.address_id
                      AND ad.vendor_id = ve.vendor_id
                      AND pa.in_stock = 'Yes'
                      AND ad.state = ?
                      AND pa.created_date > date_sub(now(), interval 5 day)
                      AND pa.product_id = ?
                      AND NOT EXISTS
                                (
                                  SELECT pa2.product_id, ad2.vendor_id
                                  FROM product_availability pa2, addresses ad2
                                  WHERE pa2.address_id = ad2.address_id
                                  AND pa2.address_id = pa.address_id
                                  AND pa2.product_id = pa.product_id
                                  AND pa2.in_stock = 'No'
                                  AND pa2.created_date > date_sub(now(), interval 4 hour)
                                  AND ad2.state = ?
            )
             ) q1";

        $query = $this->db->query($sql, array($state, $product, $state));
        return $query->num_rows();

    }


    public function get_product_name($product_id)
    {

        $this->db->select('product_name',FALSE);
        $this->db->from('products');
        $this->db->where('product_id', $product_id);
        $query = $this->db->get();
        $row = $query->row();


        return $row->product_name;

    }

}
