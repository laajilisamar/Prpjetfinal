
            <?php include('header.php');?>
            <?php include('dbcon.php');?>

        <div class="box1">
           <h2>ALL DEPARTMENTS</h2>
           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Dep</button>
        </div>

        <!--html recherche-->
  <form action="" methode="GET">
<div class="input-group mb-3">
  <input type="text" name="search" required value="<?php if(isset($_GET['search'])) {echo $_GET['search']; }?>" class="form-control" placeholder="Search...." >
  <button type="submit" class="btn btn-primary">Search</button>
</div>
</form>
<!-- fin html recherche-->
        <table class="table table-hover table-bordered table-striped">
          <thead>
            <tr>
                <th>CodeDep</th>
                <th>Departement</th>
                <th>Responsable</th>
                <th>Matprof</th>
                <th>DepartementARAB</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
          </thead>
          <tbody>

          <?php
            $query = "SELECT * FROM `departements`";

            $result = mysqli_query($connection, $query);

            if(!$result){
                die("query Failed".mysqli_error());}

            else{
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['CodeDep']; ?></td>
                        <td><?php echo $row['Departement']; ?></td>
                        <td><?php echo $row['Responsable']; ?></td>
                        <td><?php echo $row['MatProf']; ?></td>
                        <td><?php echo $row['DepartementARAB']; ?></td>
                        <td><a href="update_page_1.php?CodeDep=<?php echo $row['CodeDep']; ?>" class="btn btn-success">Update</td>
                        <td><a href="delete_page.php?CodeDep=<?php echo $row['CodeDep']; ?>" class="btn btn-danger">Delete</td>
                    </tr>
                    <?php
                }
                
            }
          ?>
             
          </tbody>   
        </table>

         <?php
         if(isset($_GET['message'])){
            echo"<h6>".$_GET['message']."</h6>";
         }
         ?>

         <?php
         if(isset($_GET['insert_msg'])){
            echo"<h6>".$_GET['insert_msg']."</h6>";
         }
         ?>
         
         <?php
         if(isset($_GET['update_msg'])){
            echo"<h6>".$_GET['update_msg']."</h6>";
         }
         ?>

         <?php
         if(isset($_GET['delete_msg'])){
            echo"<h6>".$_GET['delete_msg']."</h6>";
         }
         ?>
        

<!--recherche-->
<h1>LES RESULTAT DE RECHERCHE</h1>
<table class="table table-hover table-bordered table-striped">
          <thead>
            <tr>
                <th>CodeDep</th>
                <th>Departement</th>
                <th>Responsable</th>
                <th>Matprof</th>
                <th>DepartementARAB</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
          </thead>
          <tbody>

         <?php
            $connection =mysqli_connect("localhost","root","","projet");
            if(isset($_GET['search'])){
              $filtervalues = $_GET['search'];
              $query = "SELECT * FROM `departements` WHERE CONCAT(CodeDep,Departement,Responsable,MatProf,DepartementARAB) LIKE '%$filtervalues%'";
              $query_run = mysqli_query($connection,$query);

              if(mysqli_num_rows($query_run) > 0){
                foreach($query_run as $row){
                  ?>
                  
                    <tr>
                        <td><?php echo $row['CodeDep']; ?></td>
                        <td><?php echo $row['Departement']; ?></td>
                        <td><?php echo $row['Responsable']; ?></td>
                        <td><?php echo $row['MatProf']; ?></td>
                        <td><?php echo $row['DepartementARAB']; ?></td>
                        <td><a href="update_page_1.php?CodeDep=<?php echo $row['CodeDep']; ?>" class="btn btn-success">Update</td>
                        <td><a href="delete_page.php?CodeDep=<?php echo $row['CodeDep']; ?>" class="btn btn-danger">Delete</td>
                    </tr>

                  <?php
                }
              }
              else{
                echo "No Data Found";
              }
           
            }

         ?>
           </tbody>   
        </table>
<!-- fin recherche-->


        <!-- Modal -->
        <form action="insert_data.php" method="post">

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Departement</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="from-group">
            <label for="Departement">Departement</label>
            <input type="text" name="Departement" class="form-control" >
        </div>

        <div class="from-group">
            <label for="Responsable">Responsable</label>
            <input type="text" name="Responsable" class="form-control" >
        </div>

        <div class="from-group">
            <label for="MatProf">MatProf</label>
            <input type="text" name="MatProf" class="form-control" >
        </div>

        <div class="from-group">
            <label for="DepartementARAB">DepartementARAB</label>
            <input type="text" name="DepartementARAB" class="form-control" >
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_departemet" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>
        <?php include('footer.php');?>
        