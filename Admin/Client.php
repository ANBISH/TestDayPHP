<?php 
    class Client {

        private $id;
        private $name;
        private $taxId;
        private $contactNumber;

        public function __construct($id=null, $name=null, $taxId=null, $contactNumber=null) {
            $this->id = $id;
            $this->name = $name;
            $this->taxId = $taxId;
            $this->contactNumber = $contactNumber;
        }

        public function selectId($conn, $id){
            if(isset($id) && (int)$id>0){
                $sql = "SELECT * FROM `Client` where `client_id` = '$id'";
                $client = mysqli_query($conn, $sql);
                if($client->num_rows <1 ) {
                    $res = [
                        "statys" => false,
                        "message" => "Client not found"
                    ];
                    return json_encode($res);
                }else{
                    $client = mysqli_fetch_assoc($client);
                    $this->id = $client['client_id'];
                    $this->name = $client['name'];
                    $this->taxId = $client['tax_id'];
                    $this->contactNumber = $client['contact_number'];
                    return json_encode($client);
                }
            }else{
                $res = [
                    "statys" => false,
                    "message" => "Client not found"
                ];
                
                return json_encode($res);
            }
        }

        public function selectAllClient($conn){
            $sql = "SELECT * FROM `Client`";
            $clients = mysqli_query($conn, $sql);
            $clientList = [];
            while($client = mysqli_fetch_assoc($clients)){
            $clientList[] =  $client;
            }
            return json_encode($clientList);
        }

        public function addClient($conn){
            $sql = "INSERT INTO Client (name, tax_id, contact_number) VALUES ('$this->name', '$this->taxId', '$this->contactNumber')";
            $client = mysqli_query($conn, $sql);
            if ($client === TRUE) {
                $response = ['message' => 'Client created successfully'];
            } else {
                $response = ['error' => 'Error creating client: ' . $conn->error];
            }
            return $response;
        }

        public function deleteId($conn, $id){
            if (isset($id) && (int)$id>0) {

                $sql = "DELETE FROM Client WHERE client_id = '$id'";
                $result = $conn->query($sql);
            
                if ($result) {
                    echo json_encode(array('message' => 'Client deleted successfully'));
                } else {
                    echo json_encode(array('error' => 'Error deleting client'));
                }
            } else {
                echo json_encode(array('error' => 'Invalid or missing client identifier'));
            }
        }

        public function updateId($conn, $id){

        }

        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getTaxId() {
            return $this->taxId;
        }

        public function getContactNumber() {
            return $this->contactNumber;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function setTaxId($taxId) {
            $this->taxId = $taxId;
        }

        public function setContactNumber($contactNumber) {
            $this->contactNumber = $contactNumber;
        }
    }


?>