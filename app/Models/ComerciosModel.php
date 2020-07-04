<?php namespace App\Models;

use CodeIgniter\Model;

class ComerciosModel extends Model
{
	protected $table = 'comercios';
	protected $primaryKey = 'id';

	protected $returnType = 'object';
	protected $useSoftDeletes = true;

	protected $allowedFields = [
		'id_usuario', 'razon_social', 'cuit', 'direccion', 'telefono', 'celular', 'logo', 'capacidad'
	];

	protected $dateFormat = 'datetime';

	protected $useTimestamps = true;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';

	protected $validationRules    = [];
    protected $validationMessages = [];
	protected $skipValidation     = false;


	public function hayComercio(){
		$builder = $this->db->table('comercios');  
            $builder->returnType = "object";      
			$builder->select("razon_social");
			$query = $builder->get();
            return $query;
	}
}

