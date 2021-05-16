document.addEventListener("DOMContentLoaded", function(){
    setInputsDisabled(false) //Enable all inputs in case the user clicked back
});

function handleEmptyInputs(){
    setInputsDisabled(true)
    return true
}

/** @description This function disables all empty input, therefore they won't appear in the URL */
function setInputsDisabled(isDisabled){
    let form = document.getElementById('form_filter')
    let inputs = form.getElementsByTagName('input')
    for (let i = 0; i < inputs.length; i++){
        if (inputs[i].value === ''){
            inputs[i].disabled = isDisabled
        }
    }
}
