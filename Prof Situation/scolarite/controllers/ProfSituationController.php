<?php
class ProfSituationController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function create($codeProf, $sess, $situation, $grade) {
        return $this->model->createProfSituation($codeProf, $sess, $situation, $grade);
    }

    public function read($codeProf, $sess) {
        return $this->model->getProfSituation($codeProf, $sess);
    }
//update($codeProf, $sess, $situation, $grade) 

    public function update($codeProf, $currentSess, $newSess, $situation, $grade) {
        return $this->model->updateProfSituation($codeProf, $currentSess, $newSess, $situation, $grade);
    }

    public function delete($codeProf, $sess) {
        return $this->model->deleteProfSituation($codeProf, $sess);
    }
}
?>
