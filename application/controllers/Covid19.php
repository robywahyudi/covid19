<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Covid19 extends CI_Controller
{
	public function index()
	{
		$apiindo = file_get_contents('https://api.kawalcorona.com/indonesia');
		$data['indonesia'] = json_decode($apiindo, true);

		$apiglobalpositif = file_get_contents('https://api.kawalcorona.com/positif');
		$data['gpositif'] = json_decode($apiglobalpositif, true);
		$apiglobalsembuh = file_get_contents('https://api.kawalcorona.com/sembuh');
		$data['gsembuh'] = json_decode($apiglobalsembuh, true);
		$apiglobalmeninggal = file_get_contents('https://api.kawalcorona.com/meninggal');
		$data['gmeninggal'] = json_decode($apiglobalmeninggal, true);

		$apiprov = file_get_contents('https://api.kawalcorona.com/indonesia/provinsi');
		$data['provinsi'] = json_decode($apiprov, true);
		$this->load->view('templates/covid19_header');
		$this->load->view('covid19/covid19', $data);
		$this->load->view('templates/covid19_footer');
	}
}
