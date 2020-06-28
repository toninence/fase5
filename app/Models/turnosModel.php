<?php namespace App\Models;

use CodeIgniter\Model;

class TurnosModel extends Model
{
        protected $table      = 'turnos';
        protected $primaryKey = 'id';

        protected $returnType = 'object';
        protected $useSoftDeletes = true;

        protected $allowedFields = [
            'turno', 'hora_desde', 'hora_hasta', 'capacidad'
        ];

        protected $useTimestamps = true;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';

        protected $validationRules    = [
            'turno'         => 'required',
            'hora_desde'    => 'required',
            'hora_hasta'    => 'required',
            'capacidad'     => 'required'
            
        ];
        protected $validationMessages = [ 
            'nombre' => [
                'required' => "Ingrese un turno"
            ],
            'hora_desde' => [
                'required' => "Hora de inicio"
            ],
            'hora_hasta' => [
                'required' => "Hora de finalizacion"
            ],
            'capacidad' => [
                'required' => "Capacidad de personas"
            ]
        ];
        protected $skipValidation     = false;
        
}