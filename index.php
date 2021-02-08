<?php 
    include "db.inc.php";

    $sql = "SELECT * FROM todo";
    $result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Todo List</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <style>

            div.container {
            /* background-color: peachpuff; */
            border: 2px solid black;
            }

            .container {
                width: 50%;
                margin: auto;
            }
            
            .todo {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                border-radius: 5px;
                border: 3px solid #cccccc;
                margin-top: 5px;
                padding: 10px;;
            }

        </style>
</head>

<body>
    <div class="container">
        <div class="todo">
        <h3>Add a New Task</h3>

        <form action="" method="POST">
                <div class="form-group">
                    <input class="form-control" type="text" name="todo" placeholder="Todo Name">
                </div>

                <div class="form-group">
                    <input class="btn btn-primary" value="Add a New todo Task List"
                    type="submit">
                </div>
            </form>
        </div>
        <div class="table-responsive">
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
                        while ($row = mysqli_fetch_assoc($result)) {
                            // echo $row['todo_id'] . "<br>"; // getiing all the ids in the database
                            // puting them in the table
                            $todo_id = $row['todo_id'];
                            $todo_name = $row['todo_name'];
                            $todo_date = $row['todo_date'];
                            
                            ?>

                    <tr>
                    <td><?php echo $todo_id; ?></td>
                        <td><?php echo $todo_name; ?></td>
                        <td><?php echo $todo_date; ?></td>
                        <td><a href="#" class="btn btn-primary">Edit Todo</a></td>
                        <td><a href="#" class="btn btn-danger">Delete Todo</a></td>
                    </tr>

                    <?php   }

                    ?>

                </tbody>
            </table>
        </div>
    </div>
</body>
</html>