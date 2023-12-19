<?php
    require_once "../../db/database.php";
    require_once "../../Admin/Client.php";

    $request_uri = $_SERVER['REQUEST_URI'];
    $uri_parts = explode('/', $request_uri);
    $id = end($uri_parts);

    $client = new Client();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form class="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    <?php if(isset($id) && ctype_digit($id)&&$_SERVER['REQUEST_METHOD'] === 'GET') {  
        $client->selectId($conn,$id); 
        echo '
            <label>Add Client</label>
            <label>Name:</label>
            <input type="name" name="name" min="4" required value ="'.$client->getName().'"><br>
            <label>IPN:</label>
            <input type="number" name="ipn" required value ="'.$client->getTaxId().'"><br>
            <label>Phone:</label>
            <input type="text" name="phone" required value ="'.$client->getContactNumber().'"><br>
            <input type="submit" id="myBtn" class="button" value="Update">';
        exit; 
    }else{
        $response = ['message' => 'Client created successfully'];
        echo json_encode($response);
    }?>
 </form>
</body>
</html>