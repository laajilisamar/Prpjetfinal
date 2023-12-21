<?php
    class functions{
        private $connect = false;

        //the constructor create the connection withe the database

        public function __construct(){
            $conn =  mysqli_connect("localhost","root","") or die(mysqli_error($conn));
            mysqli_select_db($conn,"integration_project") or die(mysqli_error($conn));
            $this->connect=$conn;
        }

        // the fuction getData execute all the requests of data and retun it into $data

        private function getData($req){
            $res = mysqli_query($this->connect,$req);
            if(!$res){
                die('Error in query : '. mysqli_error($this->connect));
            }
            
            $data= array();
            while ($row = mysqli_fetch_array($res)) {
                $data[]=$row;            
            }
            return $data;
        }

        // the function setData execute any updating or creating of data

        private function setData($req){
            $res = mysqli_query($this->connect,$req);
            if(!$res){
                die('Error in query : '. mysqli_error($this->connect));
            }
        }

        // select all the data from tabel 'semaine'

        public function select_data(){
            $query="select * from semaine";
            return $this->getData($query);
        }

        // delete data using the id 'NumSem'

        public function deleteSemaine($id){
            $query = "delete from semaine where NumSem='$id'";
            return $this->setData($query);
        }

        // add new data to the table 'semain'

        public function AddSemaine($NumSem,$StartDate,$EndDate,$Session){
            $query = "insert into semaine values('$NumSem','$StartDate','$EndDate','$Session')";
            return $this->setData($query);
        }

        // update an existing data in table 'semaine'

        public function editSemaine($id,$StartDate,$EndDate,$Session){
            $query = "update semaine set DateDebut='$StartDate', DateFin='$EndDate', Session='$Session' where NumSem=$id";
            return $this->setData($query);
        }

        // select a single data from the table 'semaine' using the id

        public function selectById($id){
            $query = "select * from semaine where NumSem = $id";
            return $this->getData($query);
        }

        // select multiple data from the table 'semaine' using column 'session'

        /*public function selectBySession($session){
            $query="select * from semaine where Session=$session";
            return $this.getData($query);
        }

        //select multiple data from the tabel 'semaine' using start and end date 

        public function selectByDate($StartDate,$EndDate){
            $query="select * from semaine where DateDebut>=$StartDate and DateFin<=$EndDate";
            return $this.getData($query); 
        }

        // general research 

        public function generalSelect($search){
            $query="select * from semaine where NumSem like '%$search%' or Session like '%$search%'";
            return $this->getData($query);
        }

        /*public function generalSelect($search){
            // Assuming $this is your database connection object
            $query = "SELECT * FROM semaine WHERE NumSem LIKE ? OR DateDebut LIKE ? OR DateFin LIKE ? OR Session LIKE ?";
            
            // Assuming $this is your database connection object and prepare statement method
            $stmt = $this->prepare($query);
        
            // Assuming $search is a string that represents the search term
            $searchTerm = "%$search%";
        
            // Bind parameters and execute
            $stmt->bind_param("ssss", $searchTerm, $searchTerm, $searchTerm, $searchTerm);
            $stmt->execute();
        
            // Assuming $this is your database connection object and method to fetch data
            return $this->getData($stmt);
        }*/
    }
    
?>