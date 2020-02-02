<?php

class User_model
{
    //variable nama visibility private
    private $nama = 'Yusron';

    //ambil datanya dengan methtod getUser
    public function getUser()
    {
        //ambil variable namanya
        return $this->nama;
    }
}
