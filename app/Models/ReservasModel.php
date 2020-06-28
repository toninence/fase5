<?php namespace App\Models;

use CodeIgniter\Model;

class ReservasModel extends Model
{
        protected $table      = 'reservas';
        protected $primaryKey = 'id';

        protected $returnType = 'object';
        protected $useSoftDeletes = true;

        protected $allowedFields = [
            'id_turno', 'id_estado', 'nombre', 'apellido', 'celular', 'reservas'
        ];

        protected $useTimestamps = true;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';

        protected $validationRules    = [
            'nombre'    => 'required|alpha_numeric_space',
            'apellido'  => 'required',
            'celular'   => 'required'
            
        ];
        protected $validationMessages = [ 
            'nombre' => [
                'required' => "Ingrese un nombre"
            ],
            'apellido' => [
                'required' => "Ingrese un apellido"
            ],
            'celular' => [
                'required' => "Ingrese un celular de contacto"
            ]
        ];
        protected $skipValidation     = false;
        
}