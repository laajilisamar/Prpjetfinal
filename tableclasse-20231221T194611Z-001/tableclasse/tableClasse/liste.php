<!DOCTYPE html>
<html>
<head>
    <title>Formulaire PHP POST</title>



    <style>
 table {
  table-layout: fixed;
  width: 100%;
  border-collapse: collapse;
  border: 3px solid blue;
  margin-top:200px;
}




th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

</style>
</head>
<body>


<?php

require "connexion.php";
$req='SELECT * FROM `classe`';
$stmt=$idcom->query($req);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
if (!$stmt)
{echo "errure";}
else {
?>

                                            


<br/>

<a class="btn btn-primary" href="ajout.php" ><i class="fa-solid fa-file-plus-minus"></i>Ajouter</a>
<table  id="tab2">
    <thead >
    <tr>
        <th class="text-center"> Code classe </th>
        <th class="text-center"> Classe  </th>
        <th class="text-center"> Departement </th>
        <th class="text-center"> Option   </th>
        <th class="text-center"> Niveau </th>
        <th class="text-center"> Classe Arab </th>
        <th class="text-center"> Option Arab </th>
        <th class="text-center"> Departement Arab</th>
        <th class="text-center"> Niveau Arab </th>
    
        <th class="text-center"> Code Etape  </th>
        <th class="text-center"> Code Sale  </th>
    
        <th class="text-center">Traitement 1</th>
        <th class="text-center">Traitement 2</th>
       
</tr>
</thead>
<tbody>
<?php while ($ligne=$stmt->fetch()){?>

<tr>
    <td>  <?php  echo $ligne['CodClasse']?></td>
    <td> <?php  echo $ligne['IntClasse']?> </td>
    <td>  <?php  echo $ligne['Departement']?></td>
    <td>  <?php  echo $ligne['Optionn']?></td>
    <td>  <?php  echo $ligne['Niveau']?></td>
    <td>  <?php  echo $ligne['IntCalsseArabB']?></td>
    <td> <?php  echo $ligne['OptionAaraB']?> </td>
    <td>  <?php  echo $ligne['DepartementAaraB']?></td>
    <td>  <?php  echo $ligne['NiveauAaraB']?></td>
    <td>  <?php  echo $ligne['CodeEtape']?></td>

    <td> <?php  echo $ligne['CodeSalima']?> </td>
    
    <td> <a class="btn btn-success" href='modifier.php?Cod=<?php echo $ligne['CodClasse'] ?>'><i class="fa-solid fa-file-plus-minus"></i>modifier</a></td>
    <td> <a class="btn btn-danger" href='suprimer.php?Cod=<?php echo $ligne['CodClasse'] ?>'>suprimer</a></td>
    
         <?php  } ?>
        </td>
    




</tr>


<?php }?>
   </tbody>
</table>








<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    


    <script>
$(document).ready(function () {
    $('#tab2').DataTable({
        dom: 'Bfrtip',
        fixedHeader: true,
        autoFill: true,
        autoWidth: true,
        stateSave: true,
        scrollX:true,
        "lengthMenu": [[10,25,50,100,-1], [10,25,50,100,"All"]],
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
        },
    });
});      </script>





<script>
           
        </script>




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


        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
        <link rel="stylesheet"
              href="https://cdn.datatables.net/staterestore/1.1.0/css/stateRestore.dataTables.min.css">
              


</body>
</html>