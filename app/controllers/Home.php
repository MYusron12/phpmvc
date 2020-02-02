<?php

class Home extends Controller
{
	public function index()
	{
		$data['judul']='Home';
		//variable data yang isinya nama dan diambil dari model di user_model, serta panggil method getUser
		$data['nama'] = $this->model('User_model')->getUser();
		$this->view('templates/header', $data);
		$this->view('home/index', $data);
		$this->view('templates/footer');
	}
}
