<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    var $data   = array();

    public function __construct()
    {
        parent::__construct();
    }

    protected function load_language( $filename )
    {
        $language      = $this->config->item('language');
        $language_abbr = $this->config->item('language_abbr');

        $this->data['language_abbr'] = $language_abbr;

        $this->lang->load( $filename, $language);

        $this->load->helper('language');
    }
}