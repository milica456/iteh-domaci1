<?php
require "dbBroker.php";
require "model/ebicikli.php";

session_start();

if(!isset($_SESSION['user_id'])){
    header('Location:index.php');
    exit();
}

$rezultat = Ebicikli::getAll($conn);

if(!$rezultat){
    echo "Nastala je greška prilikom izvođenja upitanja <br>";
    die();
}

if($rezultat->num_rows == 0){
    echo "Nema e-bicikli";
    die();
} else {


?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Rent a e-bike</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesoeet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!--header section start -->
      <div class="header_section">
         <div class="container-fluid">
            <div class="costum_header">
               <div class="logo"><a href="index.php"><img src="images/logo.png"></a></div>
               <div class="contact_menu">
                  <ul>
                     <li><img src="images/call-icon.png" class="padding_right_10"><a href="#">Call: +01 1234567890</a></li>
                     <li><img src="images/mail-icon.png" class="padding_right_10"><a href="#">Email: rent@gmail.com</a></li>
                     <li><img src="images/map-icon.png" class="padding_right_10"><a href="#">Location: </a></li>
                  </ul>
               </div>
               </div>
            </div>
         </div>
      
      <!-- header section end -->

<div class="jumbotron" style="color: black;"><h1>Rent a e-bike</h1></div> 
    <!-- tabela e-bicikli-->>
    
    <div class="panel-body">
        <table id="myTable" class="table table-hover table-striped" style="color: black; background-color: rgb(153, 179, 255, 0.5);" >
            <thead class ="thead">
            <tr>
                <th scope="col"></th>
                <th scope="col">Naziv</th>
                <th scope="col">Model</th>  
            </tr>
            </thead>
            <tbody>
            <?php
            while ($red = $rezultat->fetch_array()) :
                ?>
                <tr>
                    <td><?php echo $red["id"] ?></td>
                    <td><?php echo $red["naziv"] ?></td>
                    <td><?php echo $red["model"] ?></td>

                </tr>
              <?php
                 endwhile;
            
         } //zatvaranje elsa
          ?> 
            </tbody>
        </table>

<!-- Dugmad za rezervaciju-->
        <div class="row" style="background-color: rgba(99, 117, 179, 0.075);">
    <div class="col-md-4">
        <button id="btn" class="btn btn-info btn-block" 
        style="background-color: rgb(102, 153, 255) !important; border: 2px solid white " > Prikazi rezervacije</button>
    </div>
    <div class="col-md-4" style="width: 200%; display: flex ; padding-top: 30px;">
        <button id="btn-dodaj" type="button" class="btn btn-success btn-block"
                style="background-color: rgb(102, 153, 255); border: 2px solid white;" data-toggle="modal" data-target="#myModal"> Rezervisi e-bicikl</button>

    </div>
   
    
 
      
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
            });
            
            $(".zoom").hover(function(){
            
            $(this).addClass('transition');
            }, function(){
            
            $(this).removeClass('transition');
            });
            });
            
      </script> 
      <script>
         function openNav() {
         document.getElementById("myNav").style.width = "100%";
         }
         
         function closeNav() {
         document.getElementById("myNav").style.width = "0%";
         }
      </script>   
   </body>
</html>