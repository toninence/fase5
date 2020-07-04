<?php namespace App\Controllers;

class Salir extends BaseController
{
	public function index()
	{
		$data = [];
		$data['title'] = 'Salir | Fase 5';
		$data['pagina'] = 'Salir';
		return view('salir',$data);
	}
}