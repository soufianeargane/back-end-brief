function edit(id){
    // get the data saved in the attributes

    let title       = document.getElementById(id).children[1].children[0].getAttribute("data") //title
    let date        = document.getElementById(id).children[1].children[1].children[0].getAttribute("data") //date
    let description = document.getElementById(id).children[1].children[1].children[1].getAttribute("data")
    let priority    = document.getElementById(id).children[1].children[2].children[0].getAttribute("data")
    let type        = document.getElementById(id).children[1].children[2].children[1].getAttribute("data")
    let status      = document.getElementById(id).getAttribute("data-status")
    
    document.getElementById("task-title").value = title;
    document.getElementById("task-priority").value= priority;
    document.getElementById("task-status").value= status;
    document.getElementById("task-date").value= date;
    document.getElementById("task-description").value= description;
    if(type == 1){document.getElementById("task-type-feature").checked = true};
    if(type == 2){document.getElementById("task-type-bug").checked = true};

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