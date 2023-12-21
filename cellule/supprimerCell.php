<div class="container">
    <div class="text">
        <h1 class="">Supprimer </h1>
</div><br><br><br>
<?php
require_once ("connexion.php");
?>
<table align=center width=50% border=2>
<tr>
  <th>NumProf</th>
  <th>NumMat</th>
  <th>NumCell</th>
  <th>NumSession</th>
  <th>supprimer</th>
</tr>
<?php
$req="SELECT * FROM cellules";
$ps=$idcon->prepare($req);
$ps->execute();
  while ($var = $ps->fetch(PDO::FETCH_ASSOC)) {
    $np=$var['NumProf'];
    $nm=$var['NumMat'];
    $nc=$var['NumCell'];
    $ns=$var['NumSession'];
?>
<tr>
  <td align=center><?php echo $np ?></td>
  <td align=center><?php echo $nm ?></td>
  <td align=center><?php echo $nc ?></td>
  <td align=center><?php echo $ns ?></td>
  <td align=center>
    <?php
        if (isset($_POST['supprimer'])) {
          $sql = "DELETE FROM cellules WHERE NumCell = :identif";
          $stmt = $idcon->prepare($sql);
          $stmt->execute([
          ':identif' => $_POST['identif']
          ]);
          }
        ?>
      <form  method="POST">
          <input type="hidden" name="identif" value="<?php echo $nc ?>" />
          <button name="supprimer" class="">Supprimer</button>
      </form> 
  </td>
</tr>
<?php
  }
  ?>
  </table>