const inputs = document.querySelectorAll("[required]");
inputs.forEach((elemento) => {
    elemento.addEventListener("blur", (evento) => {
        validaCampo(evento.target)
    });
});


function validaCampo(campo) {
    const msnErro = campo.parentNode.querySelector("[data-erro]");
    if (campo.name === "nome") {
        if (campo.value.length < 5) {
            msnErro.textContent = "Digite o nome completo";
        } else {
            msnErro.textContent = "";
        }
    }
}
const textarea = document.getElementById("observacao");
const charCount = document.getElementById("charCount");
const maxLength = 300;

textarea.addEventListener("input", function () {
    const currentLength = textarea.value.length;
    const remainingLength = maxLength - currentLength;

    charCount.textContent = `Máximo de caracteres: ${remainingLength}`;
});

function submitForm(event) {
    event.preventDefault(); // Evita o envio do formulário para a página de destino

    // Captura dos valores dos campos
    var nome = document.getElementById("nome").value;
    var telefone = document.getElementById("phone").value;
    var hamburgueres = document.getElementById("hamburgueres").value;
    var bebida = document.getElementById("bebida").value;
    var endereco = document.getElementById("endereco").value;
    var molhos = document.querySelectorAll('input[name="molhos[]"]:checked');
    var opcao = document.getElementById("opcao").value;
    var formaPagamento = document.getElementById("formapagamento").value;
    var observacao = document.getElementById("observacao").value;

    // Limpeza dos campos após o envio
    document.getElementById("nome").value = "";
    document.getElementById("phone").value = "";
    document.getElementById("hamburgueres").value = "";
    document.getElementById("bebida").value = "";
    document.getElementById("endereco").value = "";
    molhos.forEach(function (checkbox) {
        checkbox.checked = false;
    });
    document.getElementById("opcao").value = "";
    document.getElementById("formapagamento").value = "";
    document.getElementById("observacao").value = "";
    document.getElementById("charCount").innerHTML = "Máximo de caracteres: 300";



    const erros = document.querySelectorAll("[data-erro]");
    erros.forEach((erro) => {
        erro.textContent = "";
    });
    // Redefinir o contador de caracteres
    const charCount = document.getElementById("charCount");
    charCount.textContent = `Máximo de caracteres: ${maxLength}`;
    document.getElementById("resumo").innerHTML = "";

    var messageBox = document.getElementById("messageBox");
    messageBox.innerHTML = "Pedido enviado com sucesso! Entraremos em contato para a confirmação.";
    messageBox.className = "message success";

    setTimeout(function () {
        messageBox.innerHTML = "";
        messageBox.className = "message";
    }, 5000);

}

const form = document.getElementById("myForm");
form.addEventListener("submit", submitForm);

function formatarTelefone(input) {

    let valor = input.value.replace(/\D/g, "");

    let formatado;

    if (valor.length === 11) {
        formatado = `(${valor.substring(0, 2)}) ${valor.substring(2, 7)}-${valor.substring(7)}`;
    } else if (valor.length === 10) {
        formatado = `(${valor.substring(0, 2)}) ${valor.substring(2, 6)}-${valor.substring(6)}`;
    } else {
        formatado = valor;
    }

    input.value = formatado;
}

function atualizarResumo() {
    // Obter os elementos selecionados pelo cliente
    var nome = document.getElementById("nome").value;
    var telefone = document.getElementById("phone").value;
    var hamburgueres = document.getElementById("hamburgueres").value;
    var bebida = document.getElementById("bebida").value;
    var endereco = document.getElementById("endereco").value;
    var molhos = document.getElementsByName("molhos[]");
    var opcao = document.getElementById("opcao").value;
    var formaPagamento = document.getElementById("formapagamento").value;
    var observacao = document.getElementById("observacao").value;

    // Construir o resumo do pedido
    var resumo = "<strong>Nome:</strong> " + nome + "<br>";
    resumo += "<strong>Celular:</strong> " + telefone + "<br>";
    resumo += "<strong>Hambúrgueres:</strong> " + hamburgueres + "<br>";
    resumo += "<strong>Bebida:</strong> " + bebida + "<br>";
    resumo += "<strong>Endereço:</strong> " + endereco + "<br>";
    resumo += "<strong>Molhos:</strong> ";
    for (var i = 0; i < molhos.length; i++) {
        if (molhos[i].checked) {
            resumo += molhos[i].value + ", ";
        }
    }
    resumo = resumo.slice(0, -2) + "<br>"; // Remover a vírgula extra no final dos molhos selecionados
    resumo += "<strong>Retirada ou Entrega:</strong> " + opcao + "<br>";
    resumo += "<strong>Forma de Pagamento:</strong> " + formaPagamento + "<br>";
    resumo += "<strong>Observação:</strong> " + observacao;

    // Atualizar o conteúdo do elemento 'resumo'
    document.getElementById("resumo").innerHTML = resumo;
}




