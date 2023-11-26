

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Education LMS template by Dreambuzz">
  <meta name="keywords" content="Eduhash,education,lms,seo,course,online,learning,caoch,training,tutor">
  <meta name="author" content="themeturn.com">

  <title>ISETSO</title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="assets/vendors/bootstrap/bootstrap.css">
  <!-- Iconfont Css -->
  <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.css">
  <link rel="stylesheet" href="assets/vendors/flaticon/flaticon.css">
  <!-- animate.css -->
  <link rel="stylesheet" href="assets/vendors/animate-css/animate.css">
  <link rel="stylesheet" href="assets/vendors/owl/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="assets/style.css">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/responsive.css">

</head>
  <style>
    .height10{
        height:10px;
    }
    .mtop10{
        margin-top:10px;
    }
    .modal-label{
        position:relative;
        top:7px;
    }
</style>
<body id="top-header">

<div class="site-navigation main_menu menu-transparent" id="mainmenu-area">
	<nav class="navbar navbar-expand-lg">
		<div class="container-fluid container-padding">
			<a class="navbar-brand" href="index.html">
				<img src="assets/images/loog.png" alt="Eduhash" class="img-fluid">
			</a>

			<!-- Toggler -->

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa fa-bars"></span>
			</button>

			<!-- Collapse -->
			<div class="collapse navbar-collapse" id="navbarMenu">
			   
				<ul class="navbar-nav mx-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="index.html" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Accueil
						</a>
					   
					</li>
					<li class="nav-item ">
						<a href="about.html" class="nav-link js-scroll-trigger">
							À propos
						</a>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Information<i class="fa fa-angle-down"></i>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbar3">
							 <a class="dropdown-item " href="Etudiant.php">
							 Etudiant
							</a>
							<a class="dropdown-item " href="gouvernorats.php">
								gouvernorats
							</a> 

							<a class="dropdown-item " href="Matiers.php">
							Matiers
							</a> 
							<a class="dropdown-item " href="option.php">
                                    option
                                </a> 
								<a class="dropdown-item " href="piece.php">
                                    piece
                                </a> 
							<a class="dropdown-item " href="course-single2.html">
								table 8+9
							</a> 
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Pages<i class="fa fa-angle-down"></i>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbar3">
							 <a class="dropdown-item " href="login.php">
								Login
							</a>
							<a class="dropdown-item " href="register.php">
								Register
							</a> 
							<a class="dropdown-item " href="cart.html">
								cart
							</a> 
							<a class="dropdown-item " href="checkout.html">
								checkout
							</a> 
							<a class="dropdown-item " href="error.html">
								404
							</a> 
						</div>
					</li>
					
					
					<li class="nav-item ">
						<a href="contact.html" class="nav-link">
							Contact
						</a>
					</li>
				</ul>
				
				<div class="d-flex align-items-center">
					<div class="header-socials social-links d-none d-lg-none d-xl-block">
						<a href="https://www.facebook.com/IsetSo2021/?locale=fr_FR"><i class="fab fa-facebook-f"></i></a>
						<a href="#"><i class="fab fa-twitter"></i></a>
						<a href="#"><i class="fab fa-linkedin"></i></a>
					  
					</div>

					<form action="Matires.php"methode="GET" class="header-form ml-3" >
						<input type="text" name="search" class="form-control" placeholder="search" id=myTable>
						<i class="fa fa-search"value="Rechercher"></i>
					</form> 
				</div>
			   
			</div> 

	</nav>
</div>
</header>



    	
<div>
	
<br><br>
<a href="AddM.php" class="Btn_add"><img src="assets/images/GouvImg/plus.png"> Ajouter</a>



  

</div>

    <table id="myTable" class="table table-striped">
            <tr>
                <th class="col">Code Matière</th>
                <th>Nom Matière</th>
                <th>Coef Matière</th>
                <th>Département</th>
                <th>Semestre</th>
                <th>Option</th>
                <th>Nb Heure CI</th>
                <th>Nb Heure TP</th>
                <th>TypeLabo</th>
                 <th>Bonus</th>
                <th>Catégories</th>
                <th>SousCatégories</th>
                <th>DateDeb</th>
                <th>DateFin</th>
                <th class="col">Actions</th>
               </tr>

            <?php

            include_once "ConnexionPDO.php";

            
           
                $req = "SELECT * FROM  Matieres ";
            

                $stmt = $idcon->query($req);
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
               
                   while ($ligne = $stmt->fetch()) {
   						 echo "<tr>
                            <td>".$ligne['CodeMatière'] ."</td>
                            <td>".$ligne['NomMatière']."</td>
                            <td>" . $ligne["CoefMatière"] . "</td>
                            <td>" . $ligne["Département"] . "</td>
                            <td>" . $ligne["Semestre"] . "</td>
                            <td>" . $ligne["Option"] . "</td>
                            <td>" . $ligne["NbHeureCI"] . "</td>
                            <td>" .$ligne["NbHeureTP"] . "</td>
                            <td>" . $ligne["TypeLabo"] . "</td>
                            <td>" . $ligne["Bonus"] . "</td>
                            <td>" . $ligne["Catègories"] . "</td>
                            <td>" . $ligne["SousCatégories"] . "</td>
                            <td>" . $ligne["DateDeb"] . "</td>
                            <td>" . $ligne["DateFin"] . "</td>
                           
							<td><a href='ModifierM.php?CodeMatiere=" . $ligne["CodeMatière"]."'><img src='assets/images/GouvImg/pen.png'></a>
                        <a href='DeleteM.php?CodeMatiere=".$ligne["CodeMatière"]."'><img src='assets/images/GouvImg/trash.png'></a>
        </td>  </tr>";
				   }
            ?>
        </table>
    </div>
</section>




<script>
$(document).ready(function(){
	//inialize datatable
    $('#myTable').DataTable
	({
        dom: 'Bfrtip',
        fixedHeader: true,
        autoFill: true,
        autoWidth: true,
        stateSave: true,

        "lengthMenu": [[10,25,50,100,-1], [10,25,50,100,"All"]],
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
        },
});
});
</script>
</body>

</html>
