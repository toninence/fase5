<?php namespace App\Controllers;

use App\Models\EstadosModel;
use App\Models\ReservasModel;
use App\Models\TurnosModel;

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
		$data = [
			'turno' => (new TurnosModel())->findAll(),
			'estado'=> (new EstadosModel())->findAll(),
		];
		$data['title'] = 'Fase 5 Serendipia';
		$data['pagina'] = 'Turnos';
		return view('home',$data);
	}

	public function agregarReserva(){     
		if ($this->request->isAJAX())
        {
            $request = \config\Services::request();                        
				$data=[
						'id_turno'     => $request->getPost('id_turno'),
						'id_estado'    => $request->getPost('id_estado'),
						'dni'  		   => '1234',
						'nombre'       => ucwords(strtolower($request->getPost('nombre'))),
						'apellido'     => ucwords(strtolower($request->getPost('apellido'))),
						'celular'      => $request->getPost('celular'),
						'reservas'     => $request->getPost('reservas'),						
				];
				//$data['cv'] = $data['cv']->getRandomName();
				//$data['contrato'] = $data['contrato']->getRandomName();
				//return json_encode($data);
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
        }else{
			# Ejecuta si la petición NO es a través de AJAX.
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
				

	}

	//--------------------------------------------------------------------

}
