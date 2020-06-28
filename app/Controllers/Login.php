<?php namespace App\Controllers;


class Login extends BaseController
{
	public function __construct()
	{
		helper('form');
	}
	public function index()
	{
		$data['title'] = 'Fase 5 Serendipia';
		$data['pagina'] = 'Turnos';
		return view('login',$data);
	}

}
