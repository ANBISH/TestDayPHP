<?php
    require_once "../../db/database.php";
    require_once "../../Admin/Client.php";

    $request_uri = $_SERVER['REQUEST_URI'];
    $uri_parts1 = explode('/', $request_uri);
    $name = end($uri_parts1);
    $uri_parts = explode('delete.php/', $request_uri);
    $id = end($uri_parts);

    $client = new Client(); 

    if($name === 'delete.php'){
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            header('Content-Type: application/json');
            echo $client->selectAllClient($conn);
            exit;
        }
        else{
            echo "Error";
        }
    }elseif(isset($id) && ctype_digit($id)&&$_SERVER['REQUEST_METHOD'] === 'GET') {
               
        header('Content-Type: application/json');
        echo $client->deleteId($conn,$id);           
        exit;
    }else{
        $response = ['message' => 'Client created successfully'];
        echo json_encode($response);
    }    
?>