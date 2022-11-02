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
    global $conn;
    $query = "SELECT tasks.*, types.name as type_name, priorities.name as priority_name, statuses.name as status_name FROM tasks  
    INNER JOIN types on tasks.type_id =  types.id INNER JOIN priorities on tasks.priority_id = priorities.id 
    INNER JOIN statuses on tasks.status_id = statuses.id where tasks.status_id = $status";
    $data = mysqli_query($conn, $query);

    if ($status == 1) {
        $icon = 'bi-question-circle';
    } elseif ($status == 2) {
        $icon = 'bi-clock-history';
    } else {
        $icon = 'bi-check-circle';
    }

    foreach ($data as $row) {
        # code...
        echo "<button id='{$row['id']}' data-status='{$row['status_id']}' type='button' data-bs-toggle='modal' data-bs-target='#modal-task' class='w-100 border-0 mb-1 bg-white d-flex' onclick='edit({$row['id']}), updateAndDelete()'>
        <div class='p-2'>
            <i class='bi {$icon} text-green-500 fs-4'></i>
        </div>
        <div class='d-flex flex-column text-start py-2'>
            <div id='{$row['id']}title' data='{$row['title']}' class='fw-bolder h5 mb-1 '> {$row['title']} </div>
            <div class='d-flex flex-column text-start'>
                <div id='{$row['id']}date' data='{$row['task_datetime']}' class='text-gray-600 mb-1'>#1 created in {$row['task_datetime']}</div>
                <div id='{$row['id']}description' data='{$row['description']} ' class='mb-2 text-truncate' style='max-width: 16rem;' title=''> {$row['description']} </div>
            </div>
            <div class=''>
                <span id='{$row['id']}priority' data='{$row['priority_id']}' class='btn rounded px-2 py-1 text-white bg-cyan-600'> {$row['priority_name']} </span>
                <span id='{$row['id']}type' data='{$row['type_id']}' class='btn btn-secondary rounded px-2 py-1'> {$row['type_name']} </span>
            </div>
        </div>
    </button>";
    }
}


function saveTask()
{
    global $conn;
    extract($_POST);
    $query = "INSERT INTO tasks (`title`,`type_id`,`priority_id`,`status_id`,`task_datetime`,`description`) VALUES('$title','$type','$priority','$status','$date','$description')";

    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        # code...
        $_SESSION['message'] = "Task has been added successfully !";
        header('location: index.php');
    }
}

function updateTask()
{
    //CODE HERE
    global $conn;
    extract($_POST);


    $query = "UPDATE tasks SET title = '$title', type_id = '$type', priority_id = '$priority', status_id = '$status', task_datetime = '$date', description = '$description' WHERE $task_id = id";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        # code...
        $_SESSION['message'] = "Task has been updated successfully!";
        header('location: index.php');
    }
}

function deleteTask()
{
    //CODE HERE
    global $conn;
    $id = $_POST["task_id"];
    $query = "DELETE FROM tasks WHERE $id = id";
    $query_run = mysqli_query($conn, $query);
    //SQL DELETE
    if ($query_run) {
        # code...
        $_SESSION['message'] = "Task has been deleted successfully!";
        header('location: index.php');
    }
}
