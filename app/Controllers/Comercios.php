<?php namespace App\Controllers;

use App\Libraries\Crud;
use App\Models\ComerciosModel;

class Comercios extends BaseController
{
	protected $crud;
	protected $comerciosModel;
	function __construct() {
		$params = [
			'table' => 'comercios',
			'dev' => false,
			'fields' => $this->field_options(),
			'form_title_add' => 'Agregar Comercio',
			'form_title_update' => 'Editar Comercio',
			'form_submit' => 'Agregar',
			'table_title' => 'Comercios',
			'form_submit_update' => 'Actualizar',
			'base' => '',
		];

		$this->crud = new Crud($params, service('request'));
		$this->comercioModel = new ComerciosModel();
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
		$columns = ['razon_social','cuit','direccion','telefono','celular','logo','capacidad'];
		$where = null;//['u_status =' => 'Active'];
		$order = [
			['razon_social', 'ASC']
		];
		$data['table'] = $this->crud->view($page,$per_page,$columns,$where,$order);
		return view('admin/comercios/table', $data);
	}

	public function add(){
		
		$data['form'] = $form = $this->crud->form();
		$data['title'] = $this->crud->getAddTitle();

		if(is_array($form) && isset($form['redirect']))
			return redirect()->to($form['redirect']);

		return view('admin/comercios/form', $data);
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
		
		return view('admin/comercios/form', $data);
	}

	protected function field_options()
	{
		$fields = [];
		//$fields['id'] = ['label' => 'ID'];
		$fields['razon_social'] = ['label' => 'Razón Social', 'required' => true, 'class' => 'col-12 col-sm-8'];
		$fields['cuit'] = ['label' => 'C.U.I.T.', 'required' => true, 'class' => 'col-12 col-sm-4'];
		$fields['direccion'] = ['label' => 'Dirección', 'required' => true];
		$fields['telefono'] = ['label' => 'Teléfono', 'required' => true, 'class' => 'col-12 col-sm-6'];
		$fields['celular'] = ['label' => 'Celular', 'required' => true, 'class' => 'col-12 col-sm-6'];
		$fields['logo'] = ['label' => 'Logo', 'required' => true, 'class' => 'col-12 col-sm-6'];
		$fields['capacidad'] = ['label' => 'Capacidad', 'required' => true, 'class' => 'col-12 col-sm-6'];
		$fields['created_at'] = ['type' => 'unset'];
		$fields['updated_at'] = ['type' => 'unset'];
		$fields['deleted_at'] = ['type' => 'unset'];
		return $fields;
	}
	//--------------------------------------------------------------------

}