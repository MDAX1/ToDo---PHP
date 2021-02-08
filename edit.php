<?php 
    include "db.inc.php";

    if (isset($_GET['edit_todo'])) {
        // echo "edit is working!";
        $edit_id = $_GET['edit_todo'];
    }

    if (isset($_POST['edit_todo'])){
        $edit_todo = $_POST['todo'];

        $sql = "UPDATE todo SET todo_name = '$edit_todo' WHERE todo_id = $edit_id";
        $run = mysqli_query($connection, $sql);

        if (!$run) {
            die("Operation failed, something went wrong!");
        }else{
            header("Location: index.php?todo_updated");
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
        <h1>TODO</h1>
        <h3>Update the todo</h3>

        <form action="" method="POST">
            <?php 
                $sql = "SELECT * FROM todo WHERE todo_id = $edit_id";
                $result = mysqli_query($connection, $sql);
                $data = mysqli_fetch_array($result);
            ?>
            <div class="form-group">
                <input class="form-control" type="text" name="todo" placeholder="Todo Name" value="<?php echo $data['todo_name']; ?>">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" value="Update The Todo" type="submit" name="edit_todo">
            </div>
        </form>
    </div>
</div>
