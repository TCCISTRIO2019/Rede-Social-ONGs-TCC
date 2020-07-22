$(document).ready(function(){

    scrollDown = function() {
        $(document).scrollTop($(document).height());
    }

    document.getElementById("texto_mensagem").value = getSavedValue("texto_mensagem");    // seta o valor do campo quando ele carrega a pagina

    //Save the value function - save it to localStorage as (ID, VALUE)
    // function salvarValor(elemento){
    //     var id = elemento.id;  // get the sender's id to save it .
    //     var val = elemento.value; // get the value.
    //     localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override .
    // }

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

    // =============== Função para refresh apenas das mensagens, se atualizar a página inteira ================
    // Função que verifica se o navegador tem suporte AJAX
    function AjaxF()
    {
        var ajax;

        try
        {
            ajax = new XMLHttpRequest();
        }
        catch(e)
        {
            try
            {
                ajax = new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch(e)
            {
                try
                {
                    ajax = new ActiveXObject("Microsoft.XMLHTTP");
                }
                catch(e)
                {
                    alert("Seu browser não da suporte à AJAX!");
                    return false;
                }
            }
        }
        return ajax;
    }

    var myVar = setInterval(atualizaMensagens, 1000);

    function atualizaMensagens() {
        var ajax = AjaxF();

        var id_conversa = document.getElementById('id_conversa').value;

        $.ajax({
            type: "POST",
            url: baseURL + "/conversa/carregar_quadro_mensagens/id_" + id_conversa,
            data: {idconversa: $("#id_conversa").val()},
            dataType: "text",
            cache:false,
            success:
                function(data){
                    document.getElementById('lista_mensagens').innerHTML = data;  //as a debugging message.
                }
        });
    }
});

