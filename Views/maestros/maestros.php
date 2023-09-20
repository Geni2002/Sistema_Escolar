<?php
   session_start();

  if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 2){
    header('location: ../home.php');
  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Sistema Escolar</title>
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../Assets/css/bootstrap-1.min.css">
	    <!----css3---->
        <link rel="stylesheet" href="../../Assets/css/custom.css">
        <link rel="stylesheet" href="../../Assets/css/card.css">
        <link rel="icon" type="image/png" sizes="96x96" href="../../Assets/img/logo.png">
		<!--google fonts -->
	
	    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
	<!--google material icon-->
      <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
       <link href="../../Assets/DataTables/css/datatables.css" rel="stylesheet">
  </head>
  <body>
  

<div class="wrapper">


        <div class="body-overlay"></div>
		
		<!-------------------------sidebar------------>
		     <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><img src="../../Assets/img/SecTec.png" class="img-fluid"/><span>SECTEC No.10</span></h3>
            </div>


            <ul class="list-unstyled components">

<li class="dropdown">
                    <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" 
          class="dropdown-toggle">
          
          <span><?php echo ucfirst($_SESSION['nombre']); ?></span></a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu3">
                        <li>
                            <a href="../profile/mostrar.php">Perfil</a>
                        </li>
                        
                        <li>
                            <a href="../pages-logout.php">Cerrar sesión</a>
                        </li>
                    </ul>
                </li>

			<li  class="active">
                    <a href="../maestros/maestros" class="dashboard"><i class="material-icons">dashboard</i>
					<span>Dashboard</span></a>
      </li>
		
               <li class="">
                    <a href="../periodo/periodo"><i class="material-icons">calendar_month</i><span>Periodo escolar</span></a>
                </li>
				
				 

                <li  class="">
                    <a href="../alumnos/alumnos"><i class="material-icons">sentiment_very_satisfied</i><span>Alumnos

                    </span></a>
                </li>

                <li  class="">
                    <a href="../tutores/tutores"><i class="material-icons">supervisor_account</i><span>Tutores
                    </span></a>
                </li>

               
            </ul>
        </nav>

        <!--------page-content---------------->
		
		
		<div id="content">
		   
		   <!--top--navbar----design--------->
		   
		   <div class="top-navbar">
		      <div class="xp-topbar">

                <!-- Start XP Row -->
                <div class="row"> 
                    <!-- Start XP Col -->
                    <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
                        <div class="xp-menubar">
                               <span class="material-icons text-white">signal_cellular_alt
							   </span>
                         </div>
                    </div> 
                     <!-- End XP Col -->

                    
                    <!-- Start XP Col -->
                    
                    <!-- End XP Col -->

                </div> 
                <!-- End XP Row -->

            </div>
		     <div class="xp-breadcrumbbar text-center">
                <h4 class="page-title">Bienvenido&nbsp;<?php echo ucfirst($_SESSION['usuario']); ?></h4>  
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo ucfirst($_SESSION['correo']); ?></li>
                    
                  </ol>                
            </div>
			
		   </div>

           <!--------main-content------------->

    <div class="main-content">


    <!DOCTYPE html>
                                    <html>
                                    <head>
                                        <meta charset="UTF-8">
                                        <meta name="viewport" content="width_device-width, initial-scale_1.0">
                                        <link rel="stylesheel" href="estilos.css">
                                        <title></title>
                                    </head>
                                    <body>
                                        <h1>Busqueda de datos</h1>

                                        <form action="" method="GET">
                                            <div class="form-group">
                                            <label for="nomstu">Nombre del alumno:</label>
                                           <input type="text" class="form-control" name="students" placeholder="Busqueda de datos" required>
                                           
                                            <button type="submit" class="btn btn-default">Consultar</button>
                                        </form>

                                        <?php
                                            
                                            if(isset($_GET["students"]) && $_GET["students"] != ''){
                                                //Conexion BD
                                                $servername = "localhost";
                                                $username = "root";
                                                $password = "";
                                                $database = "sistema_escolar";
                                                $conn = new mysqli($servername, $username, $password, $database);

                                                if($conn->connect_error){
                                                    die("Error en la conexion" . $conn->connect_error);
                                                }

                                                $students = $_GET['students'];

                                                $sql = "SELECT nomstu,grado,grupo,conducta, condicion FROM students WHERE nomstu LIKE '%$students%' "; 
                                                $result = $conn->query($sql);
                                            
                                                if($result->num_rows > 0){
                                                    echo "<ul>";
                                                ?>
                                                <div class="panel panel-primary">
                                                <div class="panel-heading">INFORMACION DEL ALUMNO:</div>
                                                <div class="panel-body">
                                                </div>
                                                </div>
                                                
                                                <?php
                                                    
                                                
                                                while($row = $result->fetch_assoc()){
                                                    echo "<li>" . "Nombre: ". $row["nomstu"] . "</li>";
                                                    echo "<li>" . "Grado: " . $row["grado"] . "</li>";
                                                    echo "<li>" . "Grupo: " . $row["grupo"] . "</li>" ;
                                                    echo "<li>" . "Conducta: " . $row["conducta"] . "</li>" ;
                                                    echo "<li>" . "Condición de salud: " . $row["condicion"] . "</li>" ;

                                                }
                                                echo "</ul>";
                                            }else{
                                                echo "<li>" . "El alumno no existe en la base de datos". "</li>";
                                            }
                                            //cerramos conexion 
                                            $conn->close();
                                                }
                                        ?>
                                    </body>
                                    </html>