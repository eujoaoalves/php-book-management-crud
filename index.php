<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="app/public/css/index.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Home</title>
</head>
<body>
    <a class="new-book-btn" href="app/view/register.html">Register new book</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Author</th>
                <th>Price</th>
                <th>Number of ages</th>
                <th>Stock</th>
                <th>Release</th>
                <th>Register</th>
                <th>Update</th>
                <th>Delete</th>

            </tr>
        </thead>
        <tbody>
            <?php
            require_once('app/controller/ListController.php');
            new ListController();
            ?>

        </tbody>

    </table>
</body>

</html>