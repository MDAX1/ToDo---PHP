<?php 
    include "db.inc.php";

if (isset($_POST['search'])) {
    $search = $_POST['search'];

    $sql = "SELECT * FROM todo WHERE todo_name LIKE '%$search%'";
    $result = mysqli_query($connection, $sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO CRUD PHP & MYSQL App</title>
    <link rel="stylesheet" type="text/css"  href="css/styles.css">
    
    <style>

        .container {
            width: 50%;
            margin: auto;
        }
 
        .todo {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 3px;
            border: 2px solid #cccccc;
            margin-top: 5px;
            padding: 10px;;

        }

        .search {
            margin: 5px;
            
        }

            /* Use a media query to add a breakpoint at 800px: */
            @media screen and (max-width: 800px) {
              .conteiner .table-responsive {
                width: 100%; /* The width is 100%, when the viewport is 800px or smaller */
              }
            }
 
    </style>
</head>

<body>
    <div class="container">
        <div class="todo">
            <h1>TODO Search</h1>
            <h3><a href="../index.php">Home Page</a></h3>
            
        </div>
            <!-- Search bar function -->
        <div class="col-lg-4 search">
            <form action="search.php" method="POST">
                <input class="form-control" type="text" name="search" placeholder="Search Todo">

            <div class="form-group">
                <input class="btn btn-primary" id="search-btn" value="search" type="submit">
            </div>
        </div>

        <div class="table-responsive col-lg-12">
            <table class="table table-bordered table -striped table-hover">
                <thead>
                    <th>ID</th>
                    <th>Todo</th>
                    <th>Date Added</th>
                    <th>Edit Todo</th>
                    <th>Delete Todo</th>
                </thead>
                <tbody>
                    <?php 
                        if (mysqli_num_rows($result) === 0) {
                                echo "<tr>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "<td><h1>No result found</h1></td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "</tr>";
                            }
                            else{

                            while ($row = mysqli_fetch_assoc($result)) {
                                // echo $row['todo_id'] . "<br>";
                                $todo_id = $row['todo_id'];
                                $todo_name = $row['todo_name'];
                                $todo_date = $row['todo_date'];
                    ?>

                    <tr>
                        <td><?php echo $todo_id; ?></td>
                        <td><?php echo $todo_name; ?></td>
                        <td><?php echo $todo_date; ?></td>
                        <td><a href="edit.php?edit_todo=<?php echo $todo_id; ?>" class="btn btn-primary">Edit Todo</a></td>
                        <td><a href="index.php?delete_todo=<?php echo $todo_id; ?>" class="btn btn-danger">Delete Todo</a></td> <!-- wehen we hover or click on delete on one of our task than under the page (hover) or in url (click) we can see ex. index.php?delete_todo=19 (id number of our task)-->
                    </tr>

                    <?php    }}

                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>