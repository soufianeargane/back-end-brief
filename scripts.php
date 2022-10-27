<?php
//INCLUDE DATABASE FILE
include('database.php');
//SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
session_start();

//ROUTING
if (isset($_POST['save']))        saveTask();
if (isset($_POST['update']))      updateTask();
if (isset($_POST['delete']))      deleteTask();


function getTasks($status)
{
    global $connection;
    $query = "SELECT tasks.*, statues.name AS statue_name, types.name as types_name, priorities.name AS priority_name FROM tasks INNER JOIN statues ON statues.id = tasks.status_id INNER JOIN priorities on priorities.id = tasks.priority_id INNER JOIN types on types.id =tasks.type_id WHERE tasks.status_id = $status";
    $data = mysqli_query($connection, $query);
    // $data = mysqli_fetch_assoc($query_run);
    return $data;
}


function saveTask()
{
    global $connection;
    $title = $_POST['title'];
    $type = $_POST['task-type'];
    $priority = $_POST['prioritySelect'];
    $status = $_POST['statusSelect'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    $query = "INSERT INTO tasks(`title`,`type_id`,`priority_id`,`status_id`,`task_datetime`,`description`) VALUES('$title','$type','$priority','$status','$date','$description')";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['message'] = "Task has been added successfully !";
        header('Location: index.php');
    }
}

function updateTask()
{
    //CODE HERE
    global $connection;
    $title_edit = $_POST['title'];
    $type_edit = $_POST['task-type'];
    $priority_edit = $_POST['prioritySelect'];
    $status_edit = $_POST['statusSelect'];
    $date_edit = $_POST['date'];
    $description_edit = $_POST['description'];
    $id = $_POST['id'];

    $sql = "UPDATE tasks 
    SET title = '$title_edit', type_id = '$type_edit', priority_id = '$priority_edit', status_id = '$status_edit', task_datetime = '$date_edit', description = '$description_edit'
    WHERE id = $id ";
    $query_run = mysqli_query($connection, $sql);
    if ($query_run) {
        $_SESSION['message'] = "Task has been updated successfully !";
        header('location: index.php');
    }
    // $type = $_POST['task-type'];
    // $priority = $_POST['prioritySelect'];
    // $status = $_POST['statusSelect'];
    // $date = $_POST['date'];
    // $description = $_POST['description'];
    // $sql = "UPDATE INTO tasks(`title`,`type_id`,`priority_id`,`status_id`,`task_datetime`,`description`) VALUES('$title_edit','$type','$priority','$status','$date','$description')";

    //SQL UPDATE
    // $_SESSION['message'] = "Task has been updated successfully !";
    // header('location: index.php');
}

function deleteTask()
{
    //CODE HERE
    //SQL DELETE
    global $connection;
    $id = $_POST['id'];

    $sql = "DELETE FROM tasks WHERE id = $id";

    $query_run = mysqli_query($connection, $sql);
    if ($query_run) {
        $_SESSION['message'] = "Task has been deleted successfully !";
        header('location: index.php');
    }
    //     $_SESSION['message'] = "Task has been deleted successfully !";
    //     header('location: index.php');
}
