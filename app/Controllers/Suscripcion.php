<?php namespace App\Controllers;

class Suscripcion extends BaseController
{
	public function index()
	{
		$data = [];
		$data['title'] = 'Suscripción | Fase 5';
		$data['pagina'] = 'Mi Suscripción';
		return view('suscripcion',$data);
	}
}