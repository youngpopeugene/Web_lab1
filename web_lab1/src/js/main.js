
let form = document.querySelector('.input_form');
let validationMessage = document.querySelector('.message');

let x;
let y;
let R = "";

let count = true;

function validator(){
    let checkboxes = document.querySelectorAll('input[name="value_X"]:checked');

    let values = [];
    checkboxes.forEach((checkbox) => {
        values.push(checkbox.value);
    });

    if (values.length !== 1){
        validationMessage.textContent = ' Error : Invalid values!';
        if(values.length === 0) validationMessage.textContent = " Not all values entered!";
        return false;
    }

    x = form.querySelector('input[name="value_X"]:checked').value;
    y = form.querySelector('[name="value_Y"]').value;

    if(y.toLowerCase() == "e"){
        y = Math.E.toFixed(2);
    }

    if(x!=="" && y!=="" && R!==""){
        if(!isNaN(x) && !isNaN(y) && !isNaN(R)){
            if (y > -5 && y < 3) {
                validationMessage.textContent = "";
                return true;
            } else validationMessage.textContent = " Error : Values out of range!";
        }else validationMessage.textContent = ' Error : Invalid values!';
    }else validationMessage.textContent = " Not all values entered!";
    return false;
}

function post_request(event){
    event.preventDefault();
    if(validator()) {
        let data = " R= " + encodeURIComponent(R) + " & x= " + encodeURIComponent(x) + " & y= " + encodeURIComponent(y);
        let xhr = new XMLHttpRequest();
        // xhr.open("POST", "/handler.php/src/php/handler.php", true);
        xhr.open("POST", "handler.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    $('#result_table tr:last').after(xhr.response);
                    let prev = localStorage.getItem("result");
                    prev = prev + "\n" + xhr.response;
                    localStorage.setItem("result", prev);
                }
            }
        }
    }
}

function onetime(){
    if(count){
        $('#result_table tr:last').after(localStorage.getItem("result"));
        count = false;
    }
}

function set_valueR(value){
    R = value;
}