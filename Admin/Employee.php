<?php
    class Employee {
        
        private $id;
        private $fullName;
        private $birthDate;
        private $salary;
        private $photo;
    
        public function __construct($id, $fullName, $birthDate, $salary, $photo) {
            $this->id = $id;
            $this->fullName = $fullName;
            $this->birthDate = $birthDate;
            $this->salary = $salary;
            $this->photo = $photo;
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