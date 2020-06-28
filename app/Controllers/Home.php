<?php namespace App\Controllers;

use App\Models\ReservasModel;

class Home extends BaseController
{
	private $reservasModel;
	public function __construct()
	{
		$this->reservasModel = new ReservasModel($db);
		helper('form');
	}
	public function index()
	{
		$data['title'] = 'Fase 5 Serendipia';
		$data['pagina'] = 'Turnos';
		return view('home',$data);
	}

	public function agregarReserva(){     
				$request = \config\Services::request();                        
				$data=[
						'id_turno'     => $request->getPost('id_turno'),
						'id_estado'     => $request->getPost('id_estado'),
						'nombre'       => ucwords(strtolower($request->getPost('nombre'))),
						'apellido'     => ucwords(strtolower($request->getPost('apellido'))),
						'celular'      => $request->getPost('celular'),
						'reservas'       => $request->getPost('reservas'),						
				];
				//$data['cv'] = $data['cv']->getRandomName();
				//$data['contrato'] = $data['contrato']->getRandomName();
				
				if($this->reservasModel->save($data)===false):
						$error = (array) $this->reservasModel->errors();
						$mensaje=[
								'ok' => false,
								'mensaje' => 'No se ha podido ingresar el registro',
								'type'          => 'error'  
						];
						$mensaje = array_merge($mensaje, $error);
						
						$mensaje = json_encode($mensaje);
						print_r($mensaje);
				else:        
						//$mensaje = '{"mensajeOk":"Registro ingresado Correctamente"}';
						$mensaje = [
								'ok'            => true,
								'mensaje'       => 'Registro Ingresado Correctamente',
								'type'          => 'success'                                        
						];
						$mensaje = json_encode($mensaje);
						//$data = json_encode($data);                  
						return $mensaje;
				endif;

	}

	//--------------------------------------------------------------------

}
