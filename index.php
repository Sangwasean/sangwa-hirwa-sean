<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop crud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"/></script>
</head>
<body>
    <div class="container my-5">
    <h2>List of clients</h2>
    <a class="btn btn-primary" href="/php_crud_homework/create.php" role="button">New user</a>
    <br>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>address</th>
            <th>created at</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $servername="localhost";
            $username="root";
            $password="";
            $dbname="myshop";

            $connection=new mysqli($servername,$username,$password,$dbname);
            if($connection ->connect_error){
                die('Connection failed:'.$connection->connect_error);
            }

            $sql="SELECT * FROM clients";
            $result=$connection->query($sql);

            if(!$result){
                die("Invalid query:".$connection->error);
            }
            while($row = $result -> fetch_assoc()){
                echo"
                <tr>
            <td>$row[id]</td>
            <td>$row[Name]</td>
            <td>$row[email]</td>
            <td>$row[phone]</td>
            <td>$row[Address]</td>
            <td>$row[created_at]</td>
            <td>
                <a class='btn btn-primary btn-sm' href='/php_crud_homework/edit.php?id=$row[id]'>Edit</a>
                <a class='btn btn-danger btn-sm' href='/php_crud_homework/delete.php?id=$row[id]'>Delete</a>
            </td>
            </tr>
            ";
            }

            ?>
            
        </tbody>
    </table>
    </div>
    
</body>
</html>