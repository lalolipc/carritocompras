<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="..\index.php">Inicio</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
         

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>         
          <ul class="dropdown-menu">
            
            <li><a href="<?php echo FRONT_ROOT; ?>/Inicio/logearse">logearse</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo FRONT_ROOT; ?>/Inicio/registrarse">registrarse</a></li>
             <li role="separator" class="divider"></li>
          </ul>
       </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clientes <span class="caret"></span></a>
          <ul class="dropdown-menu">
           
            <li><a href="<?php echo FRONT_ROOT; ?>/Inicio/AltaCliente">Cargar</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo FRONT_ROOT; ?>/Inicio/ListarClientes">Listar</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo FRONT_ROOT; ?>/Inicio/EliminarClientes">Eliminar</a></li>
            <li role="separator" class="divider"></li>
          </ul>
        </li>

         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Productos <span class="caret"></span></a>         
          <ul class="dropdown-menu">
            
           
            <li><a href="<?php echo FRONT_ROOT; ?>/Inicio/ListarProductos">Listar</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo FRONT_ROOT; ?>/Inicio/EliminarProductos">Eliminar</a></li>
            
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo FRONT_ROOT; ?>/Inicio/ModificarProducto">Modificar</a></li>
             <li role="separator" class="divider"></li>
          </ul>
        </li>
        <li><a href="<?php echo FRONT_ROOT; ?>/Inicio/IrAmiCarrito"> <span class="glyphicon glyphicon-shopping-cart"></span> MI CARRITO</a></li>
      </ul>
     
        <ul class="nav navbar-nav navbar-right">
         <?php if(isset($_SESSION['usuario'])){echo " <li><a>usuario Logeado: ". $_SESSION['usuario']->getNick(); ?>
          <?php echo '</a></li> 
           <li><a href="';?> <?php echo  FRONT_ROOT . "/Usuarios/CloseSession" ?> <?php echo '"'; echo ">cerrar session</a></li>";
           }?>
      
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>