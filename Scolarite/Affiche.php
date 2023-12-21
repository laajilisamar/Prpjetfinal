<html>
<link href="css/responsive.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">

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
    <body>
	
	
<div class="container">
	<h1 class="page-header text-center">Liste Volontaire Prof</h1>

	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">

			<div class="row">
			<?php
				if(isset($_SESSION['error'])){
					echo
					"
					<div class='alert alert-danger text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['error']."
					</div>
					";
					unset($_SESSION['error']);
				}
				if(isset($_SESSION['success'])){
					echo
					"
					<div class='alert alert-success text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['success']."
					</div>
					";
					unset($_SESSION['success']);
				}
			?>
			</div>

			<div class="row">
				<a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Nouveau</a>

			</div>

			<div class="height10"></div>
			
			<div class="row">
				<table id="myTable" class="table table-bordered table-striped">
					<thead>
<tr>

    <th >id</th>
    <th >NumRatVolontaire</th>
    <th >MaTProf</th>
    <th>Date Rattrapage</th>
    <th>Seance</th>
    <th >Session</th>
    <th >Salle</th>
    <th >jour</th>
    <th>Code Classe</th>
    <th >Code Matiere</th>
    <th >Etat</th>
    <th >Action</th>
</tr>
</thead>
<tbody>
<?php
include_once('ConnexionPDO.php');
$req="SELECT * FROM ratvol";



$stmt = $idcon->query($req);
$stmt->setFetchMode(PDO::FETCH_ASSOC);



while ($ligne = $stmt->fetch()) {
    echo "<tr>
    <td>". $ligne['id'] . "</td>
    <td>" . $ligne['NumRatV'] . "</td>
    <td>" . $ligne['MatProf'] . "</td>
  <td>" . $ligne['DateRat'] . "</td>
   <td>" . $ligne['Seance'] . "</td>
    <td>" . $ligne['Session'] . "</td>
   <td>" . $ligne['Salle'] . "</td>
   <td>" . $ligne['Jour'] . "</td>
    <td>" . $ligne['CodeClasse'] . "</td>
    <td>" . $ligne['CodeMatiere'] . "</td>
	
   <td>" . $ligne['Etat'] . "</td>
   <td><a href='#update_" . $ligne['id'] . "'class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Modifier</a>
   <a href='#delete_".$ligne['id']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> supprimer</a>
   </td>
    </tr>";
    include('edit_delete_modal.php');
}
?>


</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php include('add_modal.php') ?>


  <script src="datatable/jquery.dataTables.min.js"></script>
  
<!------------------------------------>

<script src="jquery/jquery.min.js"></script>
<script src="datatable/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>




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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/staterestore/1.1.0/js/dataTables.stateRestore.min.js"></script>


        <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>


</body>
</html>