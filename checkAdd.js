X_value = null;

function add_X_value(id){
    arr = [...document.querySelectorAll(".check_b")];
    arr.forEach(element => { 
        if(element.id != id){
            element.checked = false;
        }
        
    });
    
    const got_x = document.getElementById(id);
    X_value = got_x.value;
}