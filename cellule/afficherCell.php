<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #008080;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:nth-child(odd) {
            background-color: #fff;
        }
        .delete-button {
            background-color: #ff0000;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            font-size: 14px;
            cursor: pointer;
        }
        a {
            text-decoration: none; 
            padding: 10px 20px; 
            background-color: #008080; 
            color: #fff; 
            border-radius: 5px; 
            margin: 5px; 
        }
        a:hover {
            background-color: #0056b3; 
        }
    </style>
</head>
<div class="container">
    <div class="text">
        <h1 class="">Liste Des Cellules</h1>
</div><br><br><br>
<?php
require_once ("connexion.php");
?>
<table border=2 align=center width=45%>
<tr>
  <th>NumProf</th>
  <th>NumMat</th>
  <th>NumSession</th>
  <th>NumCell</th>
</tr>
<?php
$req="SELECT * FROM cellules";
$ps=$idcon->prepare($req);
$ps->execute();
  while ($var = $ps->fetch(PDO::FETCH_ASSOC)) {
    $np=$var['NumProf'];
    $nm=$var['NumMat'];
    $ns=$var['NumSession'];
    $nc=$var['NumCell'];
?>
<tr>
  <td align=center><?php echo $np ?></td>
  <td align=center><?php echo $nm ?></td>
  <td align=center><?php echo $ns ?></td>
  <td align=center><?php echo $nc ?></td>
  <td align=center>
    <?php
        if (isset($_POST['supprimer'])) {
          $sql = "DELETE FROM cellules WHERE NumCell = :identif AND NumSession =:identif2";
          $stmt = $idcon->prepare($sql);
          $stmt->execute([
          ':identif' => $_POST['identif'],
          ':identif2' => $_POST['identif2']
          ]);
          }
        ?>
      <form  method="POST">
          <input type="hidden" name="identif" value="<?php echo $nc ?>" />
          <input type="hidden" name="identif2" value="<?php echo $ns ?>" />
          <button name="supprimer" class="">Supprimer</button>
      </form> 
  </td>
</tr>
<?php
  }
  ?>
  </table>
  <br><br>
  <a href="ajouterCell.php">Ajouter Cellule</a>
  <a href="modifierCell.php">Modifier Cellule</a>
  <a href="recherche.php">Rechercher</a>