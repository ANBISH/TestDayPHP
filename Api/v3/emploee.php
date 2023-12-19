<?php
    require_once "../../db/database.php";
    require_once "../../Admin/Employee.php";

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
        
        $emploee = new Employee(null,$_POST['name'],$_POST['date'],$_POST['salary']);
        header('Content-Type: application/json');
        echo json_encode($emploee->addClient($conn));
        exit;
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Emploee</title>
</head>
<body>
        <form class="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label>Add Emploee</label>
            <label>Name:</label>
            <input type="name" name="name" min="4" required><br>
            <label>birth_date:</label>
            <input type="date" name="date" required><br>
            <label>salary:</label>
            <input type="number" name="salary" required><br>
            <input type="submit" id="myBtn" class="button" value="Add">
        </form>
        <a href="http://testdayphp">Назад</a>
        </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>