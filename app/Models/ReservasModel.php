<?php namespace App\Models;

use CodeIgniter\Model;

class ReservasModel extends Model
{
        protected $table      = 'reservas';
        protected $primaryKey = 'id';

        protected $returnType = 'object';
        protected $useSoftDeletes = true;

        protected $allowedFields = [
            'id_turno', 'id_estado', 'fecha', 'dni', 'nombre', 'apellido', 'celular', 'reservas'
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
        
        public function getReservas(){
            $builder = $this->db->table('reservas');  
            $builder->returnType = "object";      
            $builder->select("reservas.id, reservas.dni, reservas.nombre, reservas.apellido, reservas.celular, 
            reservas.reservas, CONCAT(reservas.nombre, ' ', reservas.apellido, ' ', reservas.reservas, 'Pers.') AS title, 
            reservas.fecha as startStr, 
            turnos.hora_desde, turnos.hora_hasta AS 'end', turnos.id as turno, turnos.color as backgroundColor,
            estados.id AS estado,  
            CONCAT(reservas.fecha, ' ', turnos.hora_desde) AS 'start', 
            CONCAT(reservas.fecha, ' ', turnos.hora_hasta) AS 'end'");
            $builder->join('turnos', 'reservas.id_turno = turnos.id', 'left');
            $builder->join('estados', 'reservas.id_estado = estados.id', 'left');
            $builder->where('reservas.deleted_at', null);
            $query = $builder->get();
            return $query;
        }
}