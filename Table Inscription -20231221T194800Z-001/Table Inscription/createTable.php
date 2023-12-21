<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);



include "config.php";


// $sqlInscri = "
// CREATE TABLE Inscriptions (
//     CodeClasse CHAR(9) NOT NULL,
//     MatEtud CHAR(10) NOT NULL,
//     Session INT NOT NULL,
//     DateInscription DATETIME NULL,
//     DecisionConseil CHAR(12) NULL DEFAULT '*****',
//     Rachat BIT NOT NULL DEFAULT 0,
//     MoyGen REAL NULL,
//     Dispense BIT NOT NULL DEFAULT 0,
//     TauxAbsences FLOAT NULL,
//     Redouble BIT NOT NULL DEFAULT 0,
//     StOuv VARCHAR(20) NULL,
//     StTech CHAR(20) NULL,
//     TypeInscrip CHAR(7) NULL DEFAULT 'NR',
//     MontantIns CHAR(13) NULL,
//     NumIns INT AUTO_INCREMENT PRIMARY KEY,
//     Remarque CHAR(20) NULL,
//     Sitfin CHAR(20) NULL,
//     Montant NUMERIC(18, 0) NULL,
//     NoteSO REAL NULL,
//     NoteST REAL NULL
// );
// ";

// if ($conn->query($sqlInscri) === TRUE) {
//     echo "Table Inscription created successfully";
// } else {
//     echo "Error creating table: " . $conn->error;
// }




// $sqlClasse = "
// CREATE TABLE Classe (
//     CodeClasse CHAR(9) PRIMARY KEY
// );
// ";
// if ($conn->query($sqlClasse) === TRUE) {
//     echo "Table Classe created successfully";
// } else {
//     echo "Error creating table: " . $conn->error;
// }

// $sqlEtudiant = "
// CREATE TABLE Etudiant (
//     NCE CHAR(15) PRIMARY KEY
// );
// ";
// if ($conn->query($sqlEtudiant) === TRUE) {
//     echo "Table Etudiant created successfully";
// } else {
//     echo "Error creating table: " . $conn->error;
// }

// $sqlSession = "
// CREATE TABLE Session (
// Numero int PRIMARY KEY
// );
// ";
// if ($conn->query($sqlSession) === TRUE) {
//     echo "Table Session created successfully";
// } else {
//     echo "Error creating table: " . $conn->error;
// }


// ALTER TABLE Inscriptions
// ADD CONSTRAINT FK_CodeClasse FOREIGN KEY (CodeClasse) REFERENCES Classe(CodeClasse);
// $sqlForeignKeys = "
//  ALTER TABLE Inscriptions
//  ADD CONSTRAINT FK_MatEtud FOREIGN KEY (MatEtud) REFERENCES Etudiant(NCE);
// ";

// $sqlForeignKeys = "

// ALTER TABLE Inscriptions
// ADD CONSTRAINT FK_Session FOREIGN KEY (Session) REFERENCES Session(Numero);
// ";

if ($conn->query($sqlForeignKeys) === TRUE) {
    echo "Table Inscription updated successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
