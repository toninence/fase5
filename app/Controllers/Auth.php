<?php namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Models\ComerciosModel;

class Auth extends BaseController
{
	private $usuariosModel;
	private $urlRelativa;
	public function __construct()
	{
		helper('form');
		$this->usuariosModel = new UsuariosModel();
	}

	public function index()
	{
		$data['title'] = 'Fase 5 | Serendipia';
		$data['pagina'] = 'Turnos';
		//return view('login',$data);
        echo view('layouts/header', $data);
        echo view('login');
        echo view('layouts/footer');
	}

	public function isLoggedIn(){
        if (session('login') != true):            
            return false;
        else:
            return true;
        endif;
    }

	public function login(){
        $request = \config\Services::request();
        $usuario = $request->getPost('usuario');
        $password = $request->getPost("password");    
        $this->usuariosModel->where('email', $usuario);
        //$this->usuariosModel->where('password', $pass);        
        $resultado = $this->usuariosModel->find();
        
        if (!$resultado) {            
            session()->setFlashdata("error", 'Datos incorrectos.');
            return redirect()->to(base_url("login")); 
        }else{    
            $db_password = $resultado[0]->password;
            if(password_verify($password, $db_password)) {
                $resultado = $resultado[0];
            $data = array(
                'id'        => $resultado->id,
                'nombre'    => ucwords(strtolower($resultado->nombre)) ,
                'apellido'  => ucwords(strtolower($resultado->apellido)),
                'avatar'    => $resultado->avatar,
                'login'     => TRUE
            );            
            session()->set($data);
            return redirect()->to(base_url('reservas'));
            } else {
                session()->setFlashdata("error", 'Datos incorrectos.');
                return redirect()->to(base_url("login")); 
            }
             
        }
    }
    public function logout(){
        session()->destroy();
        return redirect()->to(base_url('login')); 
    }

    public function registrar()
    {
        $data = [];
        helper(['form']);

        if($this->request->getMethod() == 'post')
        {
            $rules = [
                'nombre' => 'required|min_length[3]|max_length[20]',
                'apellido' => 'required|min_length[3]|max_length[20]',
                'dni' => 'required|is_unique[usuarios.dni]',
                'email'=> 'required|min_length[6]|max_length[50]|valid_email|is_unique[usuarios.email]',
                'password'=>'required|min_length[8]|max_length[255]',
                'password_confirm'=>'required|matches[password]',
            ];

            if(! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else {
                //store the user in our database
                $model = new UsuariosModel();
                $newData = [
                    'nombre'=> $this->request->getVar('nombre'),
                    'apellido'=> $this->request->getVar('apellido'),
                    'dni'=> $this->request->getVar('dni'),
                    'email'=> $this->request->getVar('email'),
                    'password'=> $this->request->getVar('password'),
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Registración exitosa.');
                $session->setFlashdata('email', $this->request->getVar('email'));
                return redirect()->to(base_url('comercio'));
            }
        }

        echo view('layouts/header', $data);
        echo view('registrar');
        echo view('layouts/footer');
    }

    public function comercio()
    {
            if (session()->getFlashdata('email')) { 
                $session = session();
                $session->setFlashdata('email', session()->getFlashdata('email'));
            
            echo '<h1>'.session()->getFlashdata('email').'</h1>';
            $data = [];
            helper(['form']);

            if($this->request->getMethod() == 'post')
            {
                $rules = [
                    'razon_social' => 'required|min_length[3]|max_length[50]',
                    'direccion' => 'required',
                    'cuit' => 'required|is_unique[comercios.cuit]'
                ];

                if(! $this->validate($rules)) {
                    $data['validation'] = $this->validator;
                }else {
                    //store the user in our database
                    $user = new UsuariosModel();
                    $datosUsuario = $user->where('email', session()->getFlashdata('email'))->first();
                                            
                    $model = new ComerciosModel();
                    $newData = [
                        'id_usuario' => $datosUsuario->id,
                        'razon_social'=> $this->request->getVar('razon_social'),
                        'direccion'=> $this->request->getVar('direccion'),
                        'cuit'=> $this->request->getVar('cuit'),
                        'telefono'=> $this->request->getVar('telefono'),
                        'celular'=> $this->request->getVar('celular'),
                        'capacidad'=> $this->request->getVar('capacidad'),
                        'logo'=> $this->request->getVar('logo')
                    ];
                    $model->save($newData);
                    $session = session();
                    $session->setFlashdata('success', 'Registración exitosa.');
                    $session->setFlashdata('email', null);
                    return redirect()->to(base_url('login'));
                }
            }

            echo view('layouts/header', $data);
            echo view('comercio');
            echo view('layouts/footer');
            } else{
                return redirect()->to(base_url());
            }
    }

}

