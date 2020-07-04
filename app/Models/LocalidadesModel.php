<?php namespace App\Models;

use CodeIgniter\Model;

class LocalidadesModel extends Model
{
        protected $table      = 'localidades';
        protected $primaryKey = 'id';

        protected $returnType = 'object';
        protected $useSoftDeletes = true;

        protected $allowedFields = ['localidad'];

        protected $useTimestamps = true;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';

        protected $validationRules    = [
            'localidad' => 'required'
        ];
        protected $validationMessages = [ 
            'localidad' => [
                'required' => "Ingrese una localidad"
            ]
        ];
        protected $skipValidation = false;
}