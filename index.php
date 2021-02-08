<?php 
    include "db_connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Todo List</title>
        <link rel="stylesheet" type="text/css" href="style.css">
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
                border: 30px solid gray;
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
                    <tr>
                        <td>1</td>
                        <td>pet the cat</td>
                        <td>Sunday 7th february, 2021</td>
                        <td><a href="#" class="btn btn-primary">Edit Todo</a></td>
                        <td><a href="#" class="btn btn-danger">Delete Todo</a></td>
                    </tr>
                </tbody>
</body>
</html>