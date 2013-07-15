<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile_model extends CI_Model {


    public function __construct()
    {
        $this->load->database();
    }


    public function get_vendor_profile($addressid)
    {

        $this->db->select('vendors.vendor_id as vendor_id, vendors.vendor_name as vendor_name, vendors.is_paid as is_paid, vendors.url as url, addresses.address_id as address_id, addresses.address1 as address1, addresses.address2 as address2, addresses.city as city, addresses.state as state, addresses.zipcode as zipcode, addresses.phone_number as phone_number, addresses.description as description, addresses.geolat as geolat, addresses.geolng as geolng ',FALSE);
        $this->db->from('vendors');
        $this->db->join('addresses', 'addresses.vendor_id = vendors.vendor_id', 'inner');
        $this->db->where('addresses.address_id', $addressid);
        $query = $this->db->get();
        return $query->row();

    }

    public function get_lat_long_from_address($address_id)
    {

        $lat = 0;
        $lng = 0;


        $query = $this->db->query("SELECT CONCAT(address1, ', ', city, ', ', state, ', ', zipcode) AS address FROM addresses WHERE address_id = " .$address_id. ";");
        $data['address'] = $query->row();
        $address = $data['address']->address;



        //get the geocode data
        $data_location = "http://maps.google.com/maps/api/geocode/json?address=".urlencode(utf8_encode($address))."&sensor=false";
        $data = file_get_contents($data_location);
        $data = json_decode($data);

        if ($data->status=="OK")
        {
            $lat = $data->results[0]->geometry->location->lat;
            $lng = $data->results[0]->geometry->location->lng;

            $data = array(
                "geolat"=>$lat,
                "geolng"=>$lng
            );
            $this->db->where('address_id', $address_id);
            $this->db->update('addresses', $data);

        }



    }


    function geocode_existing_locations()
    {

        $query = $this->db->query("SELECT address_id
                                   FROM addresses ad
                                   WHERE ad.geolat IS NULL
                                        AND ad.geolng IS NULL");

        $result = array();

        if($query->result()){

            foreach ($query->result() as $row)
            {

                $this->get_lat_long_from_address($row->address_id);
                sleep(7); //add a delay so google wont throttle geocode api
            }


        }

    }

}