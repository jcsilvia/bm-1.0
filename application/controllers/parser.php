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
            sleep(10);
        }


    }

    public function parser($parser_id)
    {
        $data['parse_info'] = $this->Parser_model->get_parse_info($parser_id);
        $html = file_get_html($data['parse_info']->url);

            foreach($html->find($data['parse_info']->title_element) as $title);
            $str_title = trim(preg_replace('/\r\n|\r|\n/m','',$title->plaintext));

            foreach($html->find($data['parse_info']->price_element) as $price);
            $str_price = trim(preg_replace('/\$|\r\n|\r|\n/m','',$price->plaintext));

            foreach($html->find($data['parse_info']->availability_element) as $stock);
            $str_stock = trim(preg_replace('/\r\n|\r|\n/m','',$stock->plaintext));




            if($str_stock == 'Available')
            {
                $str_stock = 'Yes';
            }
            else
            {
                $str_stock = 'No';
            }

        $this->Parser_model->set_online_availability($parser_id, $data['parse_info']->product_category_id, $data['parse_info']->url, $str_title, $str_price, $str_stock, $data['parse_info']->vendor_id );

    }


    public function test_parser()
    {
        $html = file_get_html('http://www.midwayusa.com/product/816445/federal-ammunition-556x45mm-nato-55-grain-xm193-full-metal-jacket-boat-tail-box-of-20');

        foreach($html->find('title') as $title);
        echo $title->plaintext . '<br>';

        foreach($html->find('div[id=currentPrice]') as $price)
            echo $price->plaintext . '<br>';

        foreach($html->find('div[id=productStatus]') as $stock)
            echo $stock->plaintext;
    }

}