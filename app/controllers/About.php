<?php

class About {
	public function index($nama = 'yusron',$pekerjaan = 'mahasiswa'){
		echo "Halo, nama saya $nama, saya adalaha seorang $pekerjaan";
	}
	public function page(){
		echo 'About/page';
	}
}