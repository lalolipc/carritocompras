<?php namespace Controladores;

class InicioControlador {

        public function index() 
        {
        	 include_once URL_THEME . 'ListadoProductos.php';
        }

        public function AltaCliente() 
        {
                include_once URL_THEME . 'AltaCliente.php';
        }

        function ListarClientes()
        {
                include_once URL_THEME . 'ListadoClientes.php';
        }

        function EliminarClientes()
        {
                include_once URL_THEME . 'EliminarClientes.php';
        }
        public function registrarse(){
                include_once URL_THEME . 'registrarse.php';
        }

         public function logearse(){
            if(!isset($_SESSION['usuario'])){
                include_once URL_THEME . 'logearse.php';
            }else
             {
            echo "<script> if(alert('ya esta logeado'));</script>";  
                include_once URL_THEME . 'Inicio.php';
            
            }
        }

        public function AltaProducto(){
            include_once URL_THEME.'AltaProducto.php';
        }
         function ListarProductos()
        {
                include_once URL_THEME . 'ListadoProductos.php';
        }
        function EliminarProductos()
        {
                include_once URL_THEME . 'EliminarProductos.php';
        }
         function IrAmiCarrito()
        {
                include_once URL_THEME . 'MiCarrito.php';
        }
         function ModificarProducto()
        {
                include_once URL_THEME . 'ModificarProducto.php';
                include_once URL_THEME . 'ListadoProductos.php';
        }


        
       



}
?>