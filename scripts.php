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
    //SQL UPDATE
    $_SESSION['message'] = "Task has been updated successfully !";
    header('location: index.php');
}

function deleteTask()
{
    //CODE HERE
    //SQL DELETE
    $_SESSION['message'] = "Task has been deleted successfully !";
    header('location: index.php');
}
