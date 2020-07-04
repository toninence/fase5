<?php namespace App\Controllers;

use App\Libraries\Crud;

class Localidades extends BaseController
{
	protected $crud;

	function __construct() {
		$params = [
			'table' => 'localidades',
			'dev' => false,
			'fields' => $this->field_options(),
			'form_title_add' => 'Agregar Localidad',
			'form_title_update' => 'Editar Localidad',
			'form_submit' => 'Agregar',
			'table_title' => 'Localidades',
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
		$columns = ['localidad'];
		$where = null;//['u_status =' => 'Active'];
		$order = [
			['localidad', 'ASC']
		];
		$data['table'] = $this->crud->view($page,$per_page,$columns,$where,$order);
		return view('admin/localidades/table', $data);
	}

	public function add(){
		
		$data['form'] = $form = $this->crud->form();
		$data['title'] = $this->crud->getAddTitle();

		if(is_array($form) && isset($form['redirect']))
			return redirect()->to($form['redirect']);

		return view('admin/localidades/form', $data);
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
		
		return view('admin/localidades/form', $data);
	}

	protected function field_options()
	{
		$fields = [];
		//$fields['id'] = ['label' => 'ID'];
		$fields['localidad'] = ['label' => 'Localidad', 'required' => true];
		$fields['created_at'] = ['type' => 'unset'];
		$fields['updated_at'] = ['type' => 'unset'];
		$fields['deleted_at'] = ['type' => 'unset'];
		return $fields;
	}
	
	//--------------------------------------------------------------------

}