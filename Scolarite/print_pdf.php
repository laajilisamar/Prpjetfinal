<?php
function generateRow(){
    $contents = '';
    include_once('ConnexionPDO.php');
    $req="SELECT * FROM ratvol";



    $stmt = $idcon->query($req);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

  
   while ($ligne = $stmt->fetch())  {
        $contents .= "
        <tr>
            <td>".$ligne['id']."</td>
            <td>".$ligne['NumRatV']."</td>
            <td>".$ligne['MatProf']."</td>
            <td>".$ligne['DateRat']."</td>
            <td>".$ligne['Seance']."</td>
            <td>".$ligne['Session']."</td>
            <td>".$ligne['Salle']."</td>
            <td>".$ligne['Jour']."</td>
            <td>".$ligne['CodeClasse']."</td>
            <td>".$ligne['CodeMatiere']."</td>
            <td>".$ligne['Etat']."</td>

       
            </tr>
        ";
    }

    return $contents;
}

require_once('tcpdf/tcpdf.php');
$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle("Generated PDF using TCPDF");
$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont('helvetica');
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetAutoPageBreak(TRUE, 10);
$pdf->SetFont('helvetica', '', 11);
$pdf->AddPage();
$content = '';
$content .= '
    <h2 align="center">Generated PDF using TCPDF</h2>
    <h4>Members Table</h4>
    <table border="1" cellspacing="0" cellpadding="3">
        <tr>
        
        <th width="5%">ID</th>
        <th width="10%">NumRatV</td>
        <th width="20%">MatProf</td>
        <th  width="15%" >DateRate</td>
        <th width="10%">Seance</td>
        <th width="15%">Session</td>
        <th width="10%">Salle</td>
        <th width="15%">Jour</td>
        <th width=10%">CodeClasse</td>
        <th width="15%">CodeMatier</td>
        <th width="10%" >Etat</td>

            
        </tr>';

$content .= generateRow(); 
$content .= '</table>';
$pdf->writeHTML($content);
$pdf->Output('ratvol.pdf', 'I');
?>
