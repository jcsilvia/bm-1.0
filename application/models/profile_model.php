<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile_model extends CI_Model {


    public function __construct()
    {
        $this->load->database();
    }


    public function get_vendor_profile($addressid)
    {

        $this->db->select('vendors.vendor_id as vendor_id, vendors.vendor_name as vendor_name, vendors.is_paid as is_paid, vendors.url as url, addresses.address_id as address_id, addresses.address1 as address1, addresses.address2 as address2, addresses.city as city, addresses.state as state, addresses.zipcode as zipcode, addresses.phone_number as phone_number, addresses.description as description ',FALSE);
        $this->db->from('vendors');
        $this->db->join('addresses', 'addresses.vendor_id = vendors.vendor_id', 'inner');
        $this->db->where('addresses.address_id', $addressid);
        $query = $this->db->get();
        return $query->row();

    }




}