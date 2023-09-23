const form = document.getElementById("myForm");
// Função para formatar número de CPF

function formatarCPF(input) {
    let valor = input.value.replace(/\D/g, "");
    let formatado = "";

    for (let i = 0; i < valor.length; i++) {
        if (i === 3 || i === 6) {
            formatado += ".";
        } else if (i === 9) {
            formatado += "-";
        }
        formatado += valor[i];
    }

    input.value = formatado;
}

// Função para formatar número de telefone
function formatarTelefone(input) {
    let valor = input.value.replace(/\D/g, "");
    let formatado = "";

    if (valor.length === 11) {
        formatado = `(${valor.substring(0, 2)}) ${valor.substring(2, 7)}-${valor.substring(7)}`;
    } else if (valor.length === 10) {
        formatado = `(${valor.substring(0, 2)}) ${valor.substring(2, 6)}-${valor.substring(6)}`;
    } else {
        formatado = valor;
    }

    input.value = formatado;
}

// Função para esconder as mensagens após 5 segundos
window.onload = function () {
    setTimeout(function () {
        const messages = document.querySelectorAll('.message');
        messages.forEach(function (message) {
            message.style.display = 'none';
        });
    }, 5000);
};

const textareas = document.getElementsByTagName('textarea');
const charCount = document.getElementById("charCount");
const maxLength = 300;

textarea.addEventListener("input", function () {
    const currentLength = textarea.value.length;
    const remainingLength = maxLength - currentLength;

    charCount.textContent = `Máximo de caracteres: ${remainingLength}`;
});

const checkboxes = document.querySelectorAll('input[type="checkbox"]');

checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {
        const selecionados = document.querySelectorAll('input[type="checkbox"]:checked');

        if (selecionados.length > 2) {
            checkboxes.forEach(function (cb) {
                if (!cb.checked) {
                    cb.disabled = true;
                }
            });
        } else {
            checkboxes.forEach(function (cb) {
                cb.disabled = false;
            });
        }
    });
});

// Função para atualizar o resumo do pedido
function atualizarResumo() {
    const nome = document.getElementById("nome").value;
    const telefone = document.getElementById("phone").value;
    const hamburgueres = document.getElementById("hamburgueres").value;
    const bebida = document.getElementById("bebida").value;
    const endereco = document.getElementById("endereco").value;
    const molhos = document.getElementsByName("molhos[]");
    const opcao = document.getElementById("opcao").value;
    const formaPagamento = document.getElementById("formapagamento").value;
    const observacao = document.getElementById("observacao").value;

    let resumo = "<strong>Nome:</strong> " + nome + "<br>";
    resumo += "<strong>Celular:</strong> " + telefone + "<br>";
    resumo += "<strong>Hambúrgueres:</strong> " + hamburgueres + "<br>";
    resumo += "<strong>Bebida:</strong> " + bebida + "<br>";
    resumo += "<strong>Endereço:</strong> " + endereco + "<br>";
    resumo += "<strong>Molhos:</strong> ";

    for (let i = 0; i < molhos.length; i++) {
        if (molhos[i].checked) {
            resumo += molhos[i].value + ", ";
        }
    }

    resumo = resumo.slice(0, -2) + "<br><br>";
    resumo += "<strong>Retirada ou Entrega:</strong> " + opcao + "<br>";
    resumo += "<strong>Forma de Pagamento:</strong> " + formaPagamento + "<br>";
    resumo += "<strong>Observação:</strong> " + observacao + "<br>";

    document.getElementById("resumo").innerHTML = resumo;
}
