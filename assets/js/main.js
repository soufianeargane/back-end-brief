function resetInputValidation(){
    document.getElementById("valid-status").innerText ="";
    document.getElementById("task-status").setAttribute("class", "form-select ");
    document.getElementById("task-title").setAttribute("class", "form-control ");
    document.getElementById("valid-title").innerText ="";
}


function edit(id){
    let title       = document.getElementById(id+"title").getAttribute("data");
    let date        = document.getElementById(id +"date").getAttribute("data") //date
    let description = document.getElementById(id +"description").getAttribute("data")
    let priority    = document.getElementById(id +"priority").getAttribute("data")
    let type        = document.getElementById(id +"type").getAttribute("data")
    let status      = document.getElementById(id).getAttribute("data-status")

    document.getElementById("task-title").value       = title;
    document.getElementById("task-date").value        = date;
    document.getElementById("task-description").value = description;
    document.getElementById("task-priority").value    = priority;
    document.getElementById("task-status").value      = status;
    document.getElementById("task-id").value          = id;

    if (type == 1) {
        document.getElementById("task-type-feature").checked= true;
    }else{document.getElementById("task-type-bug").checked= true;}

    resetInputValidation()
}

function addTask(){
    document.getElementById("btn-update-delete").style.display='none';
    document.getElementById("task-save-btn").style.display='block';
    resetInputValidation()
    document.getElementById("form-task").reset()
    ////////////////////////////////////////////
}

function updateAndDelete(){
    document.getElementById("btn-update-delete").style.display='block';
    document.getElementById("task-save-btn").style.display='none';
}

/****************  VALIDATION  ************/ 
let title_input = document.querySelector("#task-title");
let status_input = document.querySelector("#task-status");

document.getElementById("form-task").onsubmit = function (e) {
    let title_valid = false;
    if (title_input.value !== "" && title_input.value.length > 3){
        title_valid = true;
    }
    if (title_valid === false ) {
        e.preventDefault();
        document.getElementById("task-title").setAttribute("class", "form-control border border-danger");
        document.getElementById("valid-title").innerText ="* Wrong Input: type more than 3 characters";
    }

    /*********  VALIDATION of select  *****/ 
    let status_valid = false;
    if (status_input.value !== "") {
        status_valid = true;
    }
    if ( status_valid === false) {
        e.preventDefault();
        document.getElementById("valid-status").innerText ="* please Select an option";
        document.getElementById("task-status").setAttribute("class", "form-select border border-danger");
    }
}


