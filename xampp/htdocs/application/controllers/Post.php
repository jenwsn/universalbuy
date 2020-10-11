<?php

class Post extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		//load url helper
		$this->load->helper('url');

		//load session
		$this->load->library('session');

		//load helper and the form validations
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->view('style_sheet');

		//load view
		$this->load->view('header');
		$this->load->view('post');
		$this->load->view('footer');
	}

	public function do_upload() {
		//load url helper
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('image_lib');

		//load session
		$this->load->library('session');

		if(!empty($_FILES)){
			// File upload configuration
			$uploadPath = './images/';
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = '*';

			// Load and initialize upload library
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->textWatermark($_FILES);
			// Upload file to the server
			if($this->upload->do_upload('file')){
				// Insert files info into the database
				$fileData = $this->upload->data();
				$uploadData['name'] = $fileData['file_name'];
				$this->textWatermark($fileData['full_path']);
				$this->load->model('Post_model');
				$this->Post_model->post_item($uploadData);
				}
			}

		echo "<script type='text/javascript'>alert('Image uploaded successfully.');</script>";
		//direct to home page
		redirect(base_url().'Entry');
	}

	public function textWatermark($source_image)
	{
		$config['source_image'] = base_url(). 'images/'.$source_image;
		//The image path,which you would like to watermarking
		$config['wm_text'] = 'http://getsourcecodes.com';
		$config['wm_type'] = 'text';
		$config['wm_font_path'] = './fonts/atlassol.ttf';
		$config['wm_font_size'] = 16;
		$config['wm_font_color'] = 'ffffff';
		$config['wm_vrt_alignment'] = 'middle';
		$config['wm_hor_alignment'] = 'right';
		$config['wm_padding'] = '20';
		$this->image_lib->initialize($config);
		if (!$this->image_lib->watermark()) {
			return $this->image_lib->display_errors();
		}
	}

}
