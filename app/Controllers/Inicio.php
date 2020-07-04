<?php namespace App\Controllers;

class Inicio extends BaseController
{
	public function index()
	{
		$data = [];
		$data['title'] = 'Inicio | Fase 5';
		$data['pagina'] = 'Panel de Control';
		return view('inicio',$data);
	}
}