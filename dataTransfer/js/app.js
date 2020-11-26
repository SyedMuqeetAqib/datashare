

function buttonHide(){
    let downloadAndDeleteButton = document.getElementById("hiddenButtons");
    downloadAndDeleteButton.style.display="none";
    downloadAndDeleteButton.style.transition = "all 0.4s";
}

function buttonShow(){
    let downloadAndDeleteButton = document.getElementById("hiddenButtons");
    downloadAndDeleteButton.style.display="block";
    downloadAndDeleteButton.style.transition = "all 0.4s";
}


function selectAll(){
    let selectButton = document.getElementById('selectAll');
    var selectAll = document.getElementsByClassName('checkboxValidation');
    if(selectButton.value === "Select All"){
    
        for (let i = 0 ; i < selectAll.length ; i++){
            selectAll[i].checked=true;
        }
    selectButton.value = "Unselect All";
    checkboxValid();
    
    }else{
        for(let i=0 ; i< selectAll.length ; i++) {
            selectAll[i].checked = false;
        }
        selectButton.value = "Select All";
        selectButton.style.trasition = "all 3s";
        checkboxValid();
    }
}
function checkboxValid(){
    var edit = document.getElementsByClassName('checkboxValidation');
    let card = document.getElementsByClassName('card');
    let selectionCount = document.getElementById('selectionCount');
        
    let count = 0;

    for (let i = 0 ; i < edit.length ; i++){
        
        if(edit[i].checked){
            count++;
            selectionCount.innerHTML = "<span class='text-light'>"+count+" are Selected</span>";
            card[i+1].style.opacity = 0.5;
            card[i+1].style.transition = "all 0.2s";
        }
        else{
            card[i+1].style.opacity = 1;
        }
        
    }
    if(count > 0){
        buttonShow();
    }
    else{
        buttonHide();
    }
}

