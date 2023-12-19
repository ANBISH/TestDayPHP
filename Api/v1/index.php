
<?php
    require_once "../../db/database.php";
    require_once "../../Admin/Client.php";

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
        
        $client = new Client(1,$_POST['name'],$_POST['ipn'],$_POST['phone']);
        header('Content-Type: application/json');
        echo json_encode($client->addClient($conn));
        exit;
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Client</title>
</head>
<body>
        <form class="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label>Add Client</label>

            <label>Name:</label>
            <input type="name" name="name" min="4" required><br>
            <label>IPN:</label>
            <input type="number" name="ipn" required><br>
            <label>Phone:</label>
            <input type="number" name="phone" required><br>
            <!-- <label>Тип доставки:</label> -->
            <!-- <select name="delivery_type">
                <option value="courier">Кур'єрська</option>
                <option value="post_office">До відділення</option>
            </select><br> -->

            <input type="submit" id="myBtn" class="button" value="Add">
        </form>
        <a href="http://testdayphp">Назад</a>
        <div>
            <a href="http://testdayphp/Api/v1/delete.php">Delete</a>
        </div>
        <div>
            <a href="http://testdayphp/Api/v1/update.php">Update</a>
        </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>