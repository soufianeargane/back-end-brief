function edit(id){
    let title       = document.getElementById(id+"title").getAttribute("data");
    let date        = document.getElementById(id +"date").getAttribute("data") //date
    let description = document.getElementById(id +"description").getAttribute("data")
    let priority    = document.getElementById(id +"priority").getAttribute("data")
    let type        = document.getElementById(id +"type").getAttribute("data")
    let status      = document.getElementById(id).getAttribute("data-status")

    document.getElementById("task-title").value= title;
    document.getElementById("task-date").value= date;
    document.getElementById("task-description").value= description;
    document.getElementById("task-priority").value= priority;
    document.getElementById("task-status").value= status;
    document.getElementById("task-id").value= id;

    if (type == 1) {
        document.getElementById("task-type-feature").checked= true;
    }else{document.getElementById("task-type-bug").checked= true;}
}

function addTask(){
    document.getElementById("btn-update-delete").style.display='none';
    document.getElementById("task-save-btn").style.display='block';
    document.getElementById("form-task").reset()
}
function updateAndDelete(){
    document.getElementById("btn-update-delete").style.display='block';
    document.getElementById("task-save-btn").style.display='none';
}