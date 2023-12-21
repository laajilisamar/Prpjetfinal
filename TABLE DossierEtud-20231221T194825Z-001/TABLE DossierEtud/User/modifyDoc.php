<?php
 include '../config/db_conn.php'; // Include the database configuration
 
 if (isset($_GET['id'])) {
    $doc_id= $_GET['id'];
if (isset($_POST['modifier'])) {
    // Get data from the form
    $motif = $_POST['motif'];
    $mat_etud = $_POST['matEtud'];
    $type_piece = $_POST['typePiece'];
    $date_piece = $_POST['datePiece'];
    $session = $_POST['session'];
    $file_name= $_FILES['document']['name'];
    
    // Handle file upload separately and move the file to the desired location
    if (empty($motif) || empty($mat_etud) || empty($type_piece) || empty($date_piece) || empty($session) || empty($file_name)) {
        echo "<p class='message'>S'il Vous Plait Remplir Tous Les Champs !</p>";
        
        // You might want to include a redirect here or some other handling for validation failure
        header("refresh:2;url=modifyDoc.php");
    } else {
    // Assuming you have a folder named "uploads" for storing uploaded files
    $targetDirectory = "../upload/";
    $targetFile = $targetDirectory . basename($_FILES['document']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));



    // Allow certain file formats (you can expand this list)
    if ($imageFileType != "pdf" && $imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES['document']['tmp_name'], $targetFile)) {
            // Insert the document into the database
            $sql ="UPDATE dossier_etud SET Motif = '$motif', MatEtud = '$mat_etud', TypePiece = '$type_piece', DatePiece = '$date_piece', Session = '$session', NomFichierPiece = '$file_name' WHERE Ndossier = $doc_id";

    
            if ($conn->query($sql) === TRUE) {
                // Data modification was successful
                header("location:showDocs.php");
                 
            } else {
                // Error occurred while modifying data
                header("location:showDocs.php?message=AddFail");
            }
        } else {
            // File upload failed
            header("location:showDocs.php?message=EmptyFields");
        }
    }
}
}
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Document</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php
    include_once '../config/db_conn.php';
    $query = "SELECT * FROM  dossier_etud  WHERE Ndossier = $doc_id ";
    $result = $conn->query($query);
    
    while ($row = $result->fetch_assoc()) {
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Modifier Un Document</h1>
        <input type="text" name="motif" value="<?=$row['Motif'] ?>" placeholder="Motif">
        <input type="text" name="matEtud"  value="<?=$row['MatEtud'] ?>" placeholder="Matricule Etudiant">
        <label for="TypePiece">Type de la Piece</label>
        <select name="typePiece" id="typePiece"  value="<?=$row['TypePiece'] ?>">
            <option value="PDF">PDF</option>
            <option value="JPG">JPG</option>
            <option value="PNG">PNG</option>
        </select>
        <input type="date" name="datePiece"  value="<?=$row['DatePiece'] ?>">
        <input type="text" name="session"  value="<?=$row['Session'] ?>" placeholder="Session">
        <input type="file" name="document"   value="<?=$row['NomFichierPiece'] ?>" accept=".pdf, .jpg, .jpeg, .png" placeholder="Choisir le Fichier" >
        <input type="submit" name="modifier" value="Modifier" >
        <a class="link back" href="showDocs.php">Annuler</a>
    </form>
    <?php
    }
    ?>
</body>
</html>