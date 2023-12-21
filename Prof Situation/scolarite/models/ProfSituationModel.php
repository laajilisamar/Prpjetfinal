<?php
class ProfSituationModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function createProfSituation($codeProf, $sess, $situation, $grade)
    {
        try {
            $sql = "INSERT INTO ProfSituation (CodeProf, Sess, Situation, Grade) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("iiss", $codeProf, $sess, $situation, $grade);

            if ($stmt->execute()) {
                header("Location: http://localhost/scolarite/index.php?create_success=1");
                exit;
            }
        } catch (mysqli_sql_exception $e) {
            echo "<p id='error' style='display:none'>";
            // . $e->getMessage()
            echo ". An error occurred: ";
            echo "</p>";
            echo "<script>";
            echo "errorMessage = document.getElementById('error').textContent;";
            echo "</script>";
        }
    }


    public function getProfSituation($codeProf, $sess)
    {
        $sql = "SELECT * FROM ProfSituation WHERE CodeProf = ? AND Sess = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ii", $codeProf, $sess);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateProfSituation($codeProf, $currentSess, $newSess, $situation, $grade)
    {
        try {
            $sql = "UPDATE ProfSituation SET Sess = ?, Situation = ?, Grade = ? WHERE CodeProf = ? AND Sess = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("issii", $newSess, $situation, $grade, $codeProf, $currentSess);

            if ($stmt->execute()) {
                header("Location: http://localhost/scolarite/index.php?update_success=1");
                exit;
            }

        } catch (mysqli_sql_exception $e) {
            echo "<p id='error' style='display:none'>";
            // . $e->getMessage()
            echo ". An error occurred: ";
            echo "</p>";
            echo "<script>";
            echo "errorMessage = document.getElementById('error').textContent;";
            echo "</script>";
        }
    }


    public function deleteProfSituation($codeProf, $sess)
    {
        $sql = "DELETE FROM ProfSituation WHERE CodeProf = ? AND Sess = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ii", $codeProf, $sess);
        return $stmt->execute();
    }
}
?>