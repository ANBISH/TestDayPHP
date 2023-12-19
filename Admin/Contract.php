<?php 
    class Contract {
        private $id;
        private $signingDate;
        private $expiryDate;
        private $amount;

        public function __construct($id=null, $signingDate=null, $expiryDate=null, $amount=null) {
            $this->id = $id;
            $this->signingDate = $signingDate;
            $this->expiryDate = $expiryDate;
            $this->amount = $amount;
        }

        // Гетери
        public function getId() {
            return $this->id;
        }

        public function getSigningDate() {
            return $this->signingDate;
        }

        public function getExpiryDate() {
            return $this->expiryDate;
        }

        public function getAmount() {
            return $this->amount;
        }

        // Сетери
        public function setSigningDate($signingDate) {
            $this->signingDate = $signingDate;
        }

        public function setExpiryDate($expiryDate) {
            $this->expiryDate = $expiryDate;
        }

        public function setAmount($amount) {
            $this->amount = $amount;
        }
    }
?>