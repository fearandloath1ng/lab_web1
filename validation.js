const FLOAT_REGEX = /^-?\d+(?:\.\d+)?$/;



function funcClick() {
    const x = X_value;
    const y = document.getElementById("Y").value;
    let rP = document.getElementById("R");
    const r = parseFloat(rP.options[rP.selectedIndex].value);
    const err = document.getElementById('error');
    const errX = document.getElementById('errX');
    
    if(!validate_X()) {
        errX.innerHTML = "X choose";
        return; 
    }
    if(!validationFloat(y)) {
        err.innerHTML = "Y not validation";
        document.getElementById("Y").value = ""
        return;
    }
    if(!domainFloat(parseFloat(y), -3., 3. )) {
        err.innerHTML ="Y value out of bounds";
        document.getElementById("Y").value = ""
        return;

    }
    
	document.getElementById("main_form").submit();
}
function domainFloat(floatNum, leftBorder, rightBorder) {
    if(floatNum >= rightBorder || floatNum <= leftBorder) {
        return false;
    }
    return true;
}

function validationFloat(strFloat) {
    return FLOAT_REGEX.test(strFloat);
}

function validate_X(){
    arr = [...document.querySelectorAll(".check_b")];
    count = 0;
    arr.forEach(element => { 
        if(element.checked){
            count++;
        }
        
    });
    return count == 1;
}