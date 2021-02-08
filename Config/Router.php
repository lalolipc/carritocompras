<?php namespace Config;

    class Router {

        /**
         * Se encarga de direccionar a la pagina solicitada
         *
         * @param Request
         */
        
        public static function direccionar(Request $request) {

            /**
             *  
             */
            $controlador = $request->getControlador() . 'Controlador';
            
            /**
             * 
             */
            $metodo = $request->getMetodo();
            
            /**
             * 
             */
            $parametros = $request->getParametros();

            /**
             * 
             */
            $mostrar = "Controladores\\". $controlador;

            /**
             * 
             */
            $controlador = new $mostrar;

            /**
             * 
             */
            if(!isset($parametros)) {
                call_user_func(array($controlador, $metodo));
            } else {
                call_user_func_array(array($controlador, $metodo), $parametros);
            }
        }
    }

?>