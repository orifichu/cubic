<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    var $data   = array();

    public function __construct()
    {
        parent::__construct();
    }

    protected function get_view_name( $prefix, $page_name )
    {
        return sprintf("%s%s", $prefix, $page_name);
    }

    protected function load_language( $filename )
    {
        $language      = $this->config->item('language');
        $language_abbr = $this->config->item('language_abbr');

        //la variable "language_abbr" servirá para el lang del html y para las rutas
        $this->data['language_abbr'] = $language_abbr;

        $this->lang->load( $filename, $language);

        $this->load->helper('language');
    }
}