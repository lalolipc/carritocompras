<?php namespace Dao;

    interface IDao {
        public function TraerUno($value);
        public function TraerTodos();
        public function Agregar($value);
        //public function actualizar($value);
        public function Eliminar($value);
    }

?>