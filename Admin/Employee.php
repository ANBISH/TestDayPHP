<?php
    class Employee {
        
        private $id;
        private $fullName;
        private $birthDate;
        private $salary;
        private $photo;
    
        public function __construct($id=null, $fullName=null, $birthDate=null, $salary=null, $photo=null) {
            $this->id = $id;
            $this->fullName = $fullName;
            $this->birthDate = $birthDate;
            $this->salary = $salary;
            $this->photo = $photo;
        }
        
        public function addClient($conn){
            $sql = "INSERT INTO Employee (full_name, birth_date, salary) VALUES ('$this->fullName', '$this->birthDate', '$this->salary')";
            $emploee = mysqli_query($conn, $sql);
            if ($emploee === TRUE) {
                $response = ['message' => 'Emploee created successfully'];
            } else {
                $response = ['error' => 'Error creating emploee: ' . $conn->error];
            }
            return $response;
        }

        // Гетери
        public function getId() {
            return $this->id;
        }
    
        public function getFullName() {
            return $this->fullName;
        }
    
        public function getBirthDate() {
            return $this->birthDate;
        }
    
        public function getSalary() {
            return $this->salary;
        }
    
        public function getPhoto() {
            return $this->photo;
        }
    
        // Сетери
        public function setFullName($fullName) {
            $this->fullName = $fullName;
        }
    
        public function setBirthDate($birthDate) {
            $this->birthDate = $birthDate;
        }
    
        public function setSalary($salary) {
            $this->salary = $salary;
        }
    
        public function setPhoto($photo) {
            $this->photo = $photo;
        }
    }
?>