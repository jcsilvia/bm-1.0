<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Parser extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->model(array('Post_model','Parser_model'));
        $this->load->helper(array('form', 'url'));
        $this->load->library('simple_html_dom');
    }


    public function index()
    {

        $data['parser_info'] = $this->Parser_model->get_parser_ids();

        foreach($data['parser_info'] as $row)
        {

            $this->parser($row->parser_id);
            //echo 'parsing '; echo $row->parser_id; echo '<br>';
            sleep(3);
        }


    }

    public function parser($parser_id)
    {
        $data['parse_info'] = $this->Parser_model->get_parse_info($parser_id);
        $html = file_get_html($data['parse_info']->url);

        $title = $html->find($data['parse_info']->title_element);
        $str_title = trim(preg_replace('/\r\n|\r|\n/m','',$title[$data['parse_info']->title_position]->plaintext));

        $price = $html->find($data['parse_info']->price_element);
        $str_price = preg_replace('/-\s.*/', '', $price[$data['parse_info']->price_position]->plaintext);
        $str_price = trim(preg_replace('/\$|\r\n|\r|\n/m','',$str_price));

        $stock = $html->find($data['parse_info']->availability_element);
        $str_stock = trim(preg_replace('/\r\n|\r|\n|\:/m','',$stock[$data['parse_info']->availability_position]->plaintext));


            if(is_numeric($str_price) == FALSE)
            {
                $str_price = 0;
            }


            if($str_stock == 'Available' || $str_stock == 'Ships from warehouse' || $str_stock == 'In Stock' || $str_stock > 0)
            {
                $str_stock = 'Yes';
            }
            else
            {
                $str_stock = 'No';
            }

        $this->Parser_model->set_online_availability($parser_id, $data['parse_info']->product_category_id, $data['parse_info']->url, $str_title, $str_price, $str_stock, $data['parse_info']->vendor_id );

    }


    public function parser_cheaper_than_dirt($parser_id)
    {
        $data['parse_info'] = $this->Parser_model->get_parse_info($parser_id);
        $html = file_get_html($data['parse_info']->url);

        $title = $html->find($data['parse_info']->title_element);
        $str_title = trim(preg_replace('/\r\n|\r|\n/m','',$title[0]->plaintext));

        $price = $html->find($data['parse_info']->price_element);
        $str_price = trim(preg_replace('/\$|\r\n|\r|\n/m','',$price[2]->plaintext));

        $stock = $html->find($data['parse_info']->availability_element);
        $str_stock = trim(preg_replace('/\r\n|\r|\n|\:/m','',$stock[15]->plaintext));

        if($str_stock == 'Ships from warehouse')
            {
                $str_stock = 'Yes';
            }
        else
            {
                $str_stock = 'No';
            }

        $this->Parser_model->set_online_availability($parser_id, $data['parse_info']->product_category_id, $data['parse_info']->url, $str_title, $str_price, $str_stock, $data['parse_info']->vendor_id );
        //$this->Parser_model->set_online_availability($parser_id, $data['parse_info']->product_category_id, $data['parse_info']->url, $str_stock, $str_price, 'No', $data['parse_info']->vendor_id );
    }

    public function test_parser()
    {
        $html = file_get_html('http://www.bulkammo.com/bulk-22-lr-ammo-22lr40lrnremthb-500');

        $title = $html->find('h1[itemprop=name]');
        echo $title['0']->plaintext . '<br>';

        //foreach($html->find('td.span') as $price)
       // $price = $html->find('div[id=currentPrice]');
        $price = $html->find('span[class=price]');
        $str_price = preg_replace('/-\s.*/', '', $price['0']->plaintext);
        $str_price = trim(preg_replace('/\$|\r\n|\r|\n|\-/m','',$str_price));
        echo $str_price . '<br>';


        $stock = $html->find('span[class=stock-qty]');
        $str_stock = trim(preg_replace('/\r\n|\r|\n|\:/m','',$stock['0']->plaintext));
        echo $str_stock;

        //$this->parser_cheaper_than_dirt(31);
        //$this->parser(32);
    }

}