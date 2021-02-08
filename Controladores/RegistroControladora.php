<?php 


$foto_perfil="";
	$imageDirectory = 'images/';
	if($_FILES)
	{
	
		if((isset($_FILES['foto_perfil'])) && ($_FILES['foto_perfil']['name'] != ''))
			
		{
						$file = $imageDirectory . basename($_FILES['foto_perfil']['name']);
			
			//$fileExtension = pathinfo($file, PATHINFO_EXTENSION);
					
			$imageInfo = getimagesize($_FILES['foto_perfil']['tmp_name']);
			
			if($imageInfo !== false)
			{
				
				if(!file_exists($file))
				{
					
						if (move_uploaded_file($_FILES["foto_perfil"]["tmp_name"], $file))
							
						{
							include_once URL_THEME . 'ListadoProductos.php';
					//echo 'se ha subido la imagen:  '.basename($_FILES["foto_perfil"]["name"]).' ';
					//echo '<img src="'.$file.'" border="0" title="'.$_FILES["fileToUpload"]["name"].'" alt="Imagen"/>';
					
					$foto_perfil=$_FILES["foto_perfil"]["name"];
						}
						else
							echo 'No se pudo subir la imagen.';
					
				}
				else
					echo '';//'el archivo ya existe.';
			}
			else
				echo 'no es imagen.';
				}
	}

 
use Modelo\Producto as Producto;
use Dao\DaoProductos as DaoProductos;
use \Exception as Exception;
use \PDOException as PDOException;

$DaoProductos = DaoProductos::getInstance();

 		$nombre=$_POST['nombre'];
		$precio=$_POST['precio'];
		//$foto=$_FILES["image"]["name"];

		$imgRuta=basename($_FILES['foto_perfil']['name']);
	
		try{
				$nuevo = new Producto($nombre,$precio);
				$nuevo->setImgRuta($imgRuta);
				
				$this->DaoProductos->Agregar($nuevo);

				echo "<script> if(alert('Nuevo producto ingresado!'));</script>";
				
			}
			catch(PDOException $ex)
			{
				echo "<script>alert('ERROR, NO FUE POSIBLE AGREGAR EL CLIENTE.\\nVuelva a intentarlo! ');</script>";
				
			}
			catch(Exception $e)
			{
				echo "<script> if(alert('error general!'));</script>";
				
			}

			include_once URL_THEME . 'AltaProducto.php';
			