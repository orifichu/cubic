<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends MY_Controller {

	//variables generales
	var $prefix = 'front_';

	public function index()
	{
		$view_name = $this->get_view_name( $this->prefix, __FUNCTION__ );

		//cargar el archivo que contiene las traducciones que le corresponden a este view
		$this->load_language( $view_name );

		//cargar el view que contiene el script de google analytics y almacenarlo en una variable
		$this->data['google_analytics'] = $this->load->view(
			$this->get_view_name( $this->prefix, 'google_analytics' )
			, NULL
			, TRUE
		);

		//cargar el view principal
		$this->load->view( $view_name, $this->data );
	}

	public function mail()
	{
		$this->load->library('smtp');
		$this->load->library('phpmailer');
		$this->phpmailer->smtp = $this->smtp;

		//form validation vars
		$formok = true;
		$errors = array();
		
		//sumbission data
		$ipaddress = $this->input->server('REMOTE_ADDR');
		$date      = date('d/m/Y');
		$time      = date('H:i:s');
		
		//form data
		$name    = $this->input->post('name');	
		$email   = $this->input->post('mail');
		$subject = $this->input->post('subject');
		$message = $this->input->post('message');


		$this->phpmailer->IsSMTP();                                 	// send via SMTP
		$this->phpmailer->Host     = ""; 			// SMTP server
		$this->phpmailer->SMTPAuth = true;    							// turn on SMTP authentication
		$this->phpmailer->Username = ""; 			     		// SMTP username
		$this->phpmailer->Password = "";						// SMTP password

		$this->phpmailer->From     = "";		// SMTP username
		$this->phpmailer->AddAddress("");		// Your Adress
		$this->phpmailer->Subject  =  "";
		$this->phpmailer->IsHTML(true);  
		$this->phpmailer->CharSet = 'UTF-8';
		$this->phpmailer->Body     =  "";

		if(!$this->phpmailer->Send())
		{
		   echo "Mail Not Sent <p>";
		   echo "Mailer Error: " . $this->phpmailer->ErrorInfo;
		   exit;
		}

		echo "Mail Sent";
	}
}

/* End of file site.php */
/* Location: ./application/controllers/site.php */