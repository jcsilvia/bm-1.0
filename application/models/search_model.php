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

            $city = $this->session->userdata('search_city');
            $distance = $this->session->userdata('search_distance');
            $state = $this->session->userdata('search_state');
            $product = $this->session->userdata('search_product_id');

            $sql = "SELECT CAST(latitude AS decimal(10,6)) as geolat, CAST(longitude AS decimal(10,6)) as geolng FROM zipcodes WHERE city = ? AND state = ? LIMIT 1;";
            $query = $this->db->query($sql, array($city,$state));
            $row = $query->row();
            $geolat = $row->geolat;
            $geolng = $row->geolng;

            if ($this->session->userdata('all_products') == 'Yes')
            {

                $sql =
                    "SELECT * FROM (
                      (SELECT pa.product_id, pro.product_name, pro.product_description, (round((pa.price/pa.quantity),2)) as price, ad.address_id, ve.vendor_name as vendor, ad.city, min(round(time_to_sec(timediff(current_timestamp(), pa.created_date)) / 3600)) as last_updated, pa.product_availability_id, m.user_name
                        FROM product_availability pa, products pro, addresses ad, vendors ve, members m
                        WHERE pa.product_id = pro.product_id
                              AND pa.address_id = ad.address_id
                              AND ad.vendor_id = ve.vendor_id
                              AND pa.member_id = m.member_id
                              AND pa.in_stock = 'Yes'
                              AND ad.address_id IN (SELECT address_id FROM (SELECT ad2.address_id,
                                                         ROUND(
                                                            (  3959
                                                             * acos(
                                                                      cos(radians(?))
                                                                    * cos(radians(ad2.geolat))
                                                                    * cos(radians(ad2.geolng) - radians(?))
                                                                  + sin(radians(?)) * sin(radians(ad2.geolat)))),
                                                            2)
                                                            AS distance
                                                    FROM addresses ad2
                                                  HAVING distance < ?
                                                  ORDER BY distance)Q2)
                              AND pa.created_date > date_sub(current_timestamp(), interval 5 day)
                              AND pro.product_subcategory_id = (SELECT product_subcategory_id FROM products WHERE product_id = ?)
                              AND product_availability_id NOT IN (select product_availability_id FROM product_availability_flag)
                              AND NOT EXISTS
                                        (
                                          SELECT pa2.product_id, ad4.vendor_id
                                          FROM product_availability pa2, addresses ad4
                                          WHERE pa2.address_id = ad4.address_id
                                          AND pa2.address_id = pa.address_id
                                          AND pa2.product_id = pa.product_id
                                          AND pa2.in_stock = 'No'
                                          AND pa2.created_date > date_sub(current_timestamp(), interval 5 day)
                                          AND ad4.address_id IN (SELECT address_id FROM (SELECT ad3.address_id,
                                                         ROUND(
                                                            (  3959
                                                             * acos(
                                                                      cos(radians(?))
                                                                    * cos(radians(ad3.geolat))
                                                                    * cos(radians(ad3.geolng) - radians(?))
                                                                  + sin(radians(?)) * sin(radians(ad3.geolat)))),
                                                            2)
                                                            AS distance
                                                    FROM addresses ad3
                                                  HAVING distance < ?
                                                  ORDER BY distance)Q3)
                                        )
                      GROUP BY vendor_name, city, address_id, product_id, product_name, product_description
                      ORDER BY last_updated ASC, price)
                     ) q1 LIMIT ?,?";

                $query = $this->db->query($sql, array($geolat,$geolng,$geolat,$distance,$product,$geolat,$geolng,$geolat,$distance,$offset,$limit));


            }

            else {

            $sql =
                "SELECT * FROM (
                  (SELECT pa.product_id, pro.product_name, pro.product_description, (round((pa.price/pa.quantity),2)) as price, ad.address_id, ve.vendor_name as vendor, ad.city, min(round(time_to_sec(timediff(now(), pa.created_date)) / 3600)) as last_updated, pa.product_availability_id,m.user_name
                    FROM product_availability pa, products pro, addresses ad, vendors ve, members m
                    WHERE pa.product_id = pro.product_id
                          AND pa.address_id = ad.address_id
                          AND ad.vendor_id = ve.vendor_id
                          AND pa.member_id = m.member_id
                          AND pa.in_stock = 'Yes'
                          AND ad.address_id IN (SELECT address_id FROM (SELECT ad2.address_id,
                                                         ROUND(
                                                            (  3959
                                                             * acos(
                                                                      cos(radians(?))
                                                                    * cos(radians(ad2.geolat))
                                                                    * cos(radians(ad2.geolng) - radians(?))
                                                                  + sin(radians(?)) * sin(radians(ad2.geolat)))),
                                                            2)
                                                            AS distance
                                                    FROM addresses ad2
                                                  HAVING distance < ?
                                                  ORDER BY distance)Q2)
                          AND pa.created_date > date_sub(current_timestamp(), interval 5 day)
                          AND pa.product_id = ?
                          AND product_availability_id NOT IN (select product_availability_id FROM product_availability_flag)
                          AND NOT EXISTS
                                    (
                                      SELECT pa2.product_id, ad4.vendor_id
                                      FROM product_availability pa2, addresses ad4
                                      WHERE pa2.address_id = ad4.address_id
                                      AND pa2.address_id = pa.address_id
                                      AND pa2.product_id = pa.product_id
                                      AND pa2.in_stock = 'No'
                                      AND pa2.created_date > date_sub(current_timestamp(), interval 5 day)
                                      AND ad4.address_id IN (SELECT address_id FROM (SELECT ad3.address_id,
                                                         ROUND(
                                                            (  3959
                                                             * acos(
                                                                      cos(radians(?))
                                                                    * cos(radians(ad3.geolat))
                                                                    * cos(radians(ad3.geolng) - radians(?))
                                                                  + sin(radians(?)) * sin(radians(ad3.geolat)))),
                                                            2)
                                                            AS distance
                                                    FROM addresses ad3
                                                  HAVING distance < ?
                                                  ORDER BY distance)Q3)
                                    )
                  GROUP BY vendor_name, city, address_id, product_id, product_name, product_description
                  ORDER BY last_updated ASC, price)
                 ) q1 LIMIT ?,?";

            $query = $this->db->query($sql, array($geolat,$geolng,$geolat,$distance,$product,$geolat,$geolng,$geolat,$distance,$offset,$limit));

            }

            return $query->result_array();
        }


    public function count_all_search_results()
    {
        $state = $this->session->userdata('search_state');
        $product = $this->session->userdata('search_product_id');
        $city = $this->session->userdata('search_city');
        $distance = $this->session->userdata('search_distance');

        $sql = "SELECT CAST(latitude AS decimal(10,6)) as geolat, CAST(longitude AS decimal(10,6)) as geolng FROM zipcodes WHERE city = ? AND state = ? LIMIT 1;";
        $query = $this->db->query($sql, array($city,$state));
        $row = $query->row();
        $geolat = $row->geolat;
        $geolng = $row->geolng;

        if ($this->session->userdata('all_products') == 'Yes')
        {

            $sql =
                "SELECT * FROM
                  (SELECT pa.product_id, pro.product_name, pro.product_description, (round(pa.price/pa.quantity)) as price, ad.address_id, ve.vendor_name, ad.city, pa.product_availability_id, m.user_name
                    FROM product_availability pa, products pro, addresses ad, vendors ve, members m
                    WHERE pa.product_id = pro.product_id
                          AND pa.address_id = ad.address_id
                          AND ad.vendor_id = ve.vendor_id
                          AND pa.member_id = m.member_id
                          AND pa.in_stock = 'Yes'
                          AND ad.address_id IN (SELECT address_id FROM (SELECT ad3.address_id,
                                                         ROUND(
                                                            (  3959
                                                             * acos(
                                                                      cos(radians(?))
                                                                    * cos(radians(ad3.geolat))
                                                                    * cos(radians(ad3.geolng) - radians(?))
                                                                  + sin(radians(?)) * sin(radians(ad3.geolat)))),
                                                            2)
                                                            AS distance
                                                    FROM addresses ad3
                                                  HAVING distance < ?
                                                  ORDER BY distance)Q2)
                          AND pa.created_date > date_sub(current_timestamp(), interval 5 day)
                          AND pro.product_subcategory_id = (SELECT product_subcategory_id FROM products WHERE product_id = ?)
                          AND product_availability_id NOT IN (select product_availability_id FROM product_availability_flag)
                          AND NOT EXISTS
                                    (
                                      SELECT pa2.product_id, ad2.vendor_id
                                      FROM product_availability pa2, addresses ad2
                                      WHERE pa2.address_id = ad2.address_id
                                      AND pa2.address_id = pa.address_id
                                      AND pa2.product_id = pa.product_id
                                      AND pa2.in_stock = 'No'
                                      AND pa2.created_date > date_sub(current_timestamp(), interval 5 day)
                                      AND ad2.address_id IN (SELECT address_id FROM (SELECT ad4.address_id,
                                                         ROUND(
                                                            (  3959
                                                             * acos(
                                                                      cos(radians(?))
                                                                    * cos(radians(ad4.geolat))
                                                                    * cos(radians(ad4.geolng) - radians(?))
                                                                  + sin(radians(?)) * sin(radians(ad4.geolat)))),
                                                            2)
                                                            AS distance
                                                    FROM addresses ad4
                                                  HAVING distance < ?
                                                  ORDER BY distance)Q2)
                                    )
                   GROUP BY vendor_name, city, address_id, product_id, product_name, product_description
                 ) q1";

            $query = $this->db->query($sql, array($geolat,$geolng,$geolat,$distance,$product,$geolat,$geolng,$geolat,$distance));

        }

        else
        {
        $sql =
            "SELECT * FROM
              (SELECT pa.product_id, pro.product_name, pro.product_description, (round(pa.price/pa.quantity)) as price, ad.address_id, ve.vendor_name, ad.city, pa.product_availability_id,m.user_name
                FROM product_availability pa, products pro, addresses ad, vendors ve, members m
                WHERE pa.product_id = pro.product_id
                      AND pa.address_id = ad.address_id
                      AND ad.vendor_id = ve.vendor_id
                      AND pa.member_id = m.member_id
                      AND pa.in_stock = 'Yes'
                      AND ad.address_id IN (SELECT address_id FROM (SELECT ad3.address_id,
                                                         ROUND(
                                                            (  3959
                                                             * acos(
                                                                      cos(radians(?))
                                                                    * cos(radians(ad3.geolat))
                                                                    * cos(radians(ad3.geolng) - radians(?))
                                                                  + sin(radians(?)) * sin(radians(ad3.geolat)))),
                                                            2)
                                                            AS distance
                                                    FROM addresses ad3
                                                  HAVING distance < ?
                                                  ORDER BY distance)Q2)
                      AND pa.created_date > date_sub(current_timestamp(), interval 5 day)
                      AND pa.product_id = ?
                      AND product_availability_id NOT IN (select product_availability_id FROM product_availability_flag)
                      AND NOT EXISTS
                                (
                                  SELECT pa2.product_id, ad2.vendor_id
                                  FROM product_availability pa2, addresses ad2
                                  WHERE pa2.address_id = ad2.address_id
                                  AND pa2.address_id = pa.address_id
                                  AND pa2.product_id = pa.product_id
                                  AND pa2.in_stock = 'No'
                                  AND pa2.created_date > date_sub(current_timestamp(), interval 5 day)
                                  AND ad2.address_id IN (SELECT address_id FROM (SELECT ad4.address_id,
                                                         ROUND(
                                                            (  3959
                                                             * acos(
                                                                      cos(radians(?))
                                                                    * cos(radians(ad4.geolat))
                                                                    * cos(radians(ad4.geolng) - radians(?))
                                                                  + sin(radians(?)) * sin(radians(ad4.geolat)))),
                                                            2)
                                                            AS distance
                                                    FROM addresses ad4
                                                  HAVING distance < ?
                                                  ORDER BY distance)Q2)
                                )
               GROUP BY vendor_name, city, address_id, product_id, product_name, product_description
             ) q1";

        $query = $this->db->query($sql, array($geolat,$geolng,$geolat,$distance,$product,$geolat,$geolng,$geolat,$distance));
        }
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

    public function get_product_category($product_id)
    {

        $this->db->select('product_categories.category_name',FALSE);
        $this->db->from('products');
        $this->db->join('product_categories','product_categories.product_category_id = products.product_subcategory_id');
        $this->db->where('products.product_id', $product_id);
        $query = $this->db->get();
        $row = $query->row();

        return $row->category_name;

    }

    public function get_cities($term)
    {
        $this->db->select('city as value');
        $this->db->distinct();
        $this->db->from('zipcodes');
        $this->db->like('city', $term);
        $query = $this->db->get();
        return $query->result_array();


    }

}
