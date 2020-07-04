<?php namespace App\Controllers;

use App\Libraries\Crud;

class Clientes extends BaseController
{
	protected $crud;

	function __construct() {
		$params = [
			'table' => 'clientes',
			'dev' => false,
			'fields' => $this->field_options(),
			'form_title_add' => 'Registrar Cliente',
			'form_title_update' => 'Editar Cliente',
			'form_submit' => 'Registrar',
			'table_title' => 'Registro de Clientes',
			'form_submit_update' => 'Actualizar',
			'base' => '',
		];

		$this->crud = new Crud($params, service('request'));
	}

	public function index()
	{
		$page = 1;
		if (isset($_GET['page'])) {
			$page = (int) $_GET['page'];
			$page = max(1, $page);
		}

		$data['title'] = $this->crud->getTableTitle();

		$per_page = 5;
		//, 'p_start_date', 'p_end_date', 'p_status',
		$columns = ['dni','nombre','apellido','domicilio','telefono', 'celular', 'ingreso', 'egreso'];
		$where = null;//['u_status =' => 'Active'];
		$order = [
			['ingreso', 'DESC']
		];
		$data['table'] = $this->crud->view($page,$per_page,$columns,$where,$order);
		return view('admin/clientes/table', $data);
	}

	public function add(){
		
		$data['form'] = $form = $this->crud->form();
		$data['title'] = $this->crud->getAddTitle();

		if(is_array($form) && isset($form['redirect']))
			return redirect()->to($form['redirect']);

		return view('admin/clientes/form', $data);
	}

	public function edit($id)
	{
		if(!$this->crud->current_values($id))
			return redirect()->to($this->crud->getBase() . '/' . $this->crud->getTable());

		$data['item_id'] = $id;
		$data['form'] = $form = $this->crud->form();
		$data['title'] = $this->crud->getEditTitle();

		if (is_array($form) && isset($form['redirect']))
			return redirect()->to($form['redirect']);
		
		return view('admin/clientes/form', $data);
	}

	protected function field_options()
	{
		$fields = [];
		//$fields['id'] = ['label' => 'ID'];
		$fields['dni'] = ['label' => 'D.N.I.', 'required' => true];
		$fields['nombre'] = ['label' => 'Nombre', 'required' => true, 'class' => 'col-12 col-sm-6'];
		$fields['apellido'] = ['label' => 'Apellido', 'required' => true, 'class' => 'col-12 col-sm-6'];
		$fields['domicilio'] = ['label' => 'Domicilio', 'required' => false, 'class' => 'col-12'];
		$fields['telefono'] = ['label' => 'Teléfono', 'required' => false, 'class' => 'col-12 col-sm-6'];
		$fields['celular'] = ['label' => 'Celular', 'required' => false, 'class' => 'col-12 col-sm-6'];
		$fields['ingreso'] = ['label' => 'Ingreso', 'required' => false, 'class' => 'col-12 col-sm-6'];
		$fields['egreso'] = ['label' => 'Egreso', 'required' => false, 'class' => 'col-12 col-sm-6'];
		$fields['created_at'] = ['type' => 'unset'];
		$fields['updated_at'] = ['type' => 'unset'];
		$fields['deleted_at'] = ['type' => 'unset'];
		return $fields;
	}
	
	//--------------------------------------------------------------------

}