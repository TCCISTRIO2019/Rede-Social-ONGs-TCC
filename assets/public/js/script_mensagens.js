document.getElementById("texto_mensagem").value = getSavedValue("texto_mensagem");    // seta o valor do campo quando ele carrega a pagina

//Save the value function - save it to localStorage as (ID, VALUE)
function salvarValor(elemento){
    var id = elemento.id;  // get the sender's id to save it .
    var val = elemento.value; // get the value.
    localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override .
}

//get the saved value function - return the value of "v" from localStorage.
function getSavedValue (valor){
    if (!localStorage.getItem(valor)) {
        return "";// You can change this to your defualt value.
    }
    return localStorage.getItem(valor);
}

function limpaValorSalvo (elemento){
    var id = elemento.id;

    localStorage.removeItem(id);
}