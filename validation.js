const FLOAT_REGEX = /^-?\d+(?:\.\d+)?$/;



function funcClick() {
    const x = parseFloat(X_value_array.pop);
    X_value_array.push(x);
    const y = document.getElementById("Y").value;
    let rP = document.getElementById("R");
    const r = parseFloat(rP.options[rP.selectedIndex].value);
    const err = document.getElementById('error');
    
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