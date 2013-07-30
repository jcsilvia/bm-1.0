<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Parser_model extends CI_Model {


    public function __construct()
    {
        $this->load->database();
    }

    public function get_parse_info($parser_id)
    {

        $this->db->select();
        $this->db->from('vendor_parser');
        $this->db->where('vendor_parser.parser_id', $parser_id);
        $query = $this->db->get();
        $row = $query->row();
        return $row;

    }

    public function set_online_availability($parser_id, $product_category_id, $url, $title, $price, $stock, $vendor_id)
    {

        $this->db->select('online_availability_id');
        $this->db->from('online_availability');
        $this->db->where('online_availability.parser_id', $parser_id);
        $query = $this->db->get();
        $row = $query->row();



        if ($query->num_rows() > 0)
        {



            $data = array(
                'url' => $url,
                'title' => $title,
                'price' => $price,
                'in_stock' => $stock,
                'last_updated_date' => date('Y-m-d H:i:s')
            );

            $this->db->where('online_availability_id', $row->online_availability_id);
            $this->db->update('online_availability', $data);

        }
        else
        {
            $data = array(
                'parser_id' => $parser_id,
                'product_category_id' => $product_category_id,
                'url' => $url,
                'title' => $title,
                'price' => $price,
                'in_stock' => $stock,
                'vendor_id' => $vendor_id
            );

            $this->db->insert('online_availability', $data);

        }

    }

    public function get_parser_ids()
    {
        //use this first time parser is run or when new screens are added to scrape
        $sql = "SELECT parser_id FROM vendor_parser ORDER BY parser_id DESC";
        //$sql = "SELECT parser_id FROM online_availability WHERE last_updated_date <= date_sub(current_timestamp(), interval 1 hour)";
        $query = $this->db->query($sql);

        return $query->result();
    }

}