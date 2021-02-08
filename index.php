<?php 
    include "db.inc.php";

    $sql = "SELECT * FROM todo";
    $result = mysqli_query($connection, $sql);

        //if the server is reciving a request method of post (if recieved shown post request method goes to server)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // echo "Received"; // return received so its working
            $todo = $_POST['todo']; // echo $todo; //testing to see if add new task return the task in browser
            $date = date('l jS \of F Y h:i:s A');
            // echo $date; // return date so its also working
            $sql = "INSERT INTO todo(todo_name, todo_date) VALUES('$todo', '$date')";
            $results = mysqli_query($connection, $sql); //when i click on add a new task & refresh. task is added to my list 
            
            // (fix the refresh bug)
            if (!$results) {
                die("Failed");
            }else{
                header("Location:index.php?todo-added"); //when new task added todo-added will be shown in my url
            }
        }

            // getting the id to show in browser when i click delete on a task
            if (isset($_GET['delete_todo'])) {
            $delete_todo = $_GET['delete_todo'];
            // echo $delete_todo;  // return deleted so its also working
            $sqli = "DELETE FROM todo WHERE todo_id = $delete_todo";
            $res = mysqli_query($connection, $sqli);
            
            if (!$res) {
                die("Failed");
            }else{
                header("Location:index.php?todo-deleted");
            }
        }
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
                        <td><a href="edit.php?edit_todo=<?php echo $todo_id; ?>" class="btn btn-primary">Edit Todo</a></td>
                        <td><a href="index.php?delete_todo=<?php echo $todo_id; ?>" class="btn btn-danger">Delete Todo</a></td> <!-- wehen i hover or click on delete on one of the task than under the page (hover) or in url (click) can see ex. index.php?delete_todo=19 (todo id)-->
                    </tr>

                    <?php   }

                    ?>

                </tbody>
            </table>
        </div>
    </div>
</body>
</html>