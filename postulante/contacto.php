<?php
  session_start();
  //incluimos la conexion a la BD
  include_once('../config.php');

  if (!isset($_SESSION['ID'])){
    header("Location: ../login.php");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
   <!-- CDN FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <title>Contacto</title>
  <style>
   #nav {
   background: #457fca;  /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #5691c8, #457fca);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #5691c8, #457fca); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
   }
</style>
</head>
<body>
  <div class="sticky-top">
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark" id="nav">
    <a class="navbar-brand" href="home.php">
    <img src="../img/logo.png" width="130" height="55" class="d-inline-block align-top" alt="IPTE">
  </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
         <li class="nav-item dropdown mr-3">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user"></i> <?php echo ucwords($_SESSION['NAME']); ?> 
          </a>
         <div class="dropdown-menu">
            <a class="dropdown-item" href="profile.php"><i class="fa-solid fa-user"></i> Perfil</a>
            <a class="dropdown-item" href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a>
          </div>
        </li>
        </ul>
    </div>
    </nav>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f1faee;color:#7CE2FC">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto mr-auto">
      <li class="nav-item ml-5 mr-5">
          <a class="nav-link" href="home.php"><i class="fa-solid fa-house"></i> Inicio
          &nbsp;&nbsp;<span class="badge badge-pill badge-info"><?php
                      $query = "SELECT COUNT(id_vacante) as total FROM vacante WHERE activo_vacante = 1 ";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?></span></a></a>
        </li>
         <li class="nav-item ml-5 mr-5">
         <a class="nav-link" href="estatus.php"><i class="fa-solid fa-briefcase"></i> Estatus</a>
         </li>
         <li class="nav-item ml-5 mr-5">
         <a class="nav-link" href="entrevistas.php"><i class="fa-solid fa-calendar"></i> Entrevistas
         &nbsp;&nbsp;<span class="badge badge-pill badge-info"><?php
         $id = $_SESSION['ID'];
                      $query = "SELECT COUNT(id_entrevista) as total FROM entrevistas WHERE activo_entrevista = 1 and (estatus_entrevista = 'Pendiente' or estatus_entrevista = 'Pendiente segunda etapa') and id_postulante='$id' ";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?></span></a>
         </li>
         <li class="nav-item ml-5 mr-5">
         <a class="nav-link" href="contrataciones.php"><i class="fa-solid fa-user-tie"></i> Contrataciones&nbsp;&nbsp;<span class="badge badge-pill badge-info"><?php
         $id = $_SESSION['ID'];
                      $query = "SELECT COUNT(id) as total FROM contratacion WHERE id_postulante='$id' ";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?></span></a></a>
         </li>
         <li class="nav-item active ml-5 mr-5">
         <a class="nav-link" href="contacto.php"><i class="fa-solid fa-address-card"></i> <span class="sr-only">(current)</span>Contacto</a>
         </li>
    </ul>
  </div>
</nav>
</div>
<div class="jumbotron">
      <center><h2>Contáctanos</h2></center>
   <br>
   <div class="text-center">
  <img src="img/contacto.png" class="rounded mx-auto d-block" alt="tarjeta" style="width: 100px; height: 100px;"></div>
   </div>
   <div class="jumbotron" style="background-color: #FFF;">
      <h2>Recursos humanos</h2>
         <br>
         <p class="lead" style="text-align:justify;">
            En caso de tener alguna duda con tu proceso de postulación puedes ponerte en contacto con el área de recursos humanos. A continuación te dejamos la información de contacto necesesaria.</p>
            <div class="d-flex justify-content-end">
         <h5><a class="text-info" href="tel:+527555537129">Teléfono IPTE Soluciones: +52 755 553 7129</a></h5>
         </div>
         <br>
         
         <br>
         <br>

   <div class="row row-cols-1 row-cols-md-3">
    <?php
      $sql = "SELECT * FROM usuarios WHERE role = 'administrador' and activo = 1";
          $result = $con -> query($sql);
               if($result ->num_rows > 0){
               
                  while($row = $result ->fetch_assoc()) { 
                    ?>
                           <div class='col mb-4'>
                            <div class="accordion" id="accordionExample">
                        <div class='card h-100 shadow p-4 mb-5 bg-white rounded'>
                           <?php
                          if (empty($row['image'])){
                            echo "<center>
                            <img src='img/sinfoto.webp' width='210' class='img-fluid rounded'></center>
                            ";

                          }else{
                            $imagedata = file_get_contents("../photos/" . $row['image']);
$base64 = base64_encode($imagedata);
echo '<center><img src="data:image;base64,' . $base64 . '" class="img-fluid rounded"/></center>';
                          }
?>
                        <div class='card-body'>
                           <p class="text-center lead"><?php echo $row['nombre'] ?></p>
                           <p class="lead"><i class="fa-solid fa-user-tie"></i> <?php echo $row['puesto'] ?></p>
                           <p class="lead"><i class="fa-solid fa-envelope"></i> Email: <a href="mailto:<?php echo $row['email']?>"><?php echo $row['email'] ?></a></p>
                           <p class="lead"><i class="fa-solid fa-phone"></i> Teléfono: <a href="tel:<?php echo $row['telefono'] ?>"><?php echo $row['telefono'] ?></a></p>
                           </div>
                           </div>
                           </div>
                           </div>
                        
                        <?php }
                     } ?>
                     </div>
                              <h3>Nuestra ubicación<h3>
            <br>
            <div class="container d-flex justify-content-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3802.6693027916194!2d-101.46438492570222!3d17.61843159610984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x843479bc9107be25%3A0x62881ea2935ff459!2sIPTE%20Soluciones%20S.A.%20De%20C.V.!5e0!3m2!1ses-419!2smx!4v1691641028238!5m2!1ses-419!2smx" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            </div>
    <footer class="page-footer font-small" style="background-color: #0E3E6B; ">
      <div class="footer-copyright text-center py-3 text-dark" style="font-size: 20px">
       <p style="color: white;"><a href="https://www.iptesoluciones.com/" style="color: #fff;">IPTE Soluciones &copy; 2023</a></p>
       <p style="color: white;">Información de contacto: <a style="color: white;" href="mailto: ioregon@ipte.com.mx">Gerente de Gestión de Capital Humano</a></p>
      </div>
    </footer>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>