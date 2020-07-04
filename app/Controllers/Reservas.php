<?php namespace App\Controllers;

use App\Models\EstadosModel;
use App\Models\ReservasModel;
use App\Models\TurnosModel;

class Reservas extends BaseController
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
			'reservas'=>(new ReservasModel())->getReservas()->getResult(),
		];
		$data['title'] = 'Fase 5 Serendipia';
		$data['pagina'] = 'Reservas';
		return view('reservas',$data);
	}
	public function traerEventos(){
		if ($this->request->isAJAX())
        {
			$reservas = (new ReservasModel())->getReservas()->getResult();
			return json_encode($reservas);
		}else{
			# Ejecuta si la petición NO es a través de AJAX.
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}
	public function agregarReserva(){     
		if ($this->request->isAJAX())
        {
			$request = \config\Services::request();  
			                     
				$data=[
						'fecha'		   => $request->getPost('fecha'),
						'id_turno'     => $request->getPost('turno'),
						'id_estado'    => $request->getPost('estado'),
						'dni'  		   => $request->getPost('dni'),
						'nombre'       => ucwords(strtolower($request->getPost('nombre'))),
						'apellido'     => ucwords(strtolower($request->getPost('apellido'))),
						'celular'      => $request->getPost('celular'),
						'reservas'     => $request->getPost('reservas'),						
				];
				if ($request->getPost('inputId')) {
					$data['id'] = $request->getPost('inputId');
				} 
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
	public function eliminarReserva($id){
		if ($this->request->isAJAX())
        {
			if($this->reservasModel->delete($id)):
				$msg='Registro eliminado con exito';
			else:
				$msg = 'Hubo un error al eliminar';
			endif;
			
			return json_encode(['msg'=>$msg]);
		}else{
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}

	//--------------------------------------------------------------------

}
