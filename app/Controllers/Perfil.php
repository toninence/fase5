<?php namespace App\Controllers;

use App\Models\UsuariosModel;

class Perfil extends BaseController
{
	public function index()
	{
		$data = [];
        helper(['form']);
        $model = new UsuariosModel();

        if($this->request->getMethod() == 'post'){
            //let's do the validation here
            $rules = [
                'dni' => [
					'rules' => 'required',
					'errors'=>[
						'required' => 'El campo DNI no puede estar vacio.'
					]
				],
                'nombre' => [
					'rules' =>'required|min_length[3]|max_length[20]',
					'errors' =>[
						'required'=>'Debe ingresar un nombre',
						'min_length'=>'El Nombre debe tener entre 3 y 20 caracteres',
						'max_length'=>'El Nombre debe tener entre 3 y 20 caracteres',
					]
				],
                'apellido' => [
					'rules' => 'required|min_length[3]|max_length[20]',
					'errors' =>[
						'required'=>'Debe ingresar un nombre',
						'min_length'=>'El Apellido debe tener entre 3 y 20 caracteres',
						'max_length'=>'El Apellido debe tener entre 3 y 20 caracteres',
					]
				] ,
			];

            if($this->request->getPost('password') != '')
            {
                $rules['password'] = 'required|min_length[8]|max_length[255]';
                $rules['password_confirm'] = 'required|matches[password]';
            }

            if(! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else {
                //store the user in our database
                
                $newData = [
                    'id' => session()->get('id'),
                    'nombre'=> $this->request->getPost('nombre'),
                    'apellido'=> $this->request->getPost('apellido'),
                ];
                if($this->request->getPost('password') != '')
                {
                    $newData['password'] = $this->request->getPost('password');
                }

                $model->save($newData);
                session()->setFlashdata('success', 'Actualización exitosa.');
                return redirect()->to('./perfil');
            }
        }
        $data['user'] = $model->where('id', session()->get('id'))->first();
        
        return view('perfil', $data);
	}
}