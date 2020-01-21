<?php

class About extends Controller
{
	public function index($nama = 'Yusron', $pekerjaan = 'Mahasiswa', $umur = 27)
	{
		$this->view('about/index');
	}
	public function page()
	{
		$this->view('about/page');
	}
}
