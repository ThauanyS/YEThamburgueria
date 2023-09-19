
const checkboxes = document.querySelectorAll('input[type="checkbox"]');

// Evento de escuta para cada checkbox
checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {
        const selecionados = document.querySelectorAll('input[type="checkbox"]:checked');

        // Verificar se o número de opções selecionadas é maior que três
        if (selecionados.length > 2) {
            // Desabilitar os checkboxes restantes
            checkboxes.forEach(function (cb) {
                if (!cb.checked) {
                    cb.disabled = true;
                }
            });
        } else {
            // Habilitar todos os checkboxes
            checkboxes.forEach(function (cb) {
                cb.disabled = false;
            });
        }
    });
});
const form = document.getElementById("myForm");

// Função para formatar visualmente o campo de telefone
function formatarTelefone(input) {
    // Obter o valor do campo de entrada e remover caracteres não numéricos
    let valor = input.value.replace(/\D/g, "");

    // Variável para armazenar o valor formatado do telefone
    let formatado;

    // Verificar o comprimento do valor para determinar o formato adequado
    if (valor.length === 11) {
        // Formatar como (XX) XXXXX-XXXX
        formatado = `(${valor.substring(0, 2)}) ${valor.substring(2, 7)}-${valor.substring(7)}`;
    } else if (valor.length === 10) {
        // Formatar como (XX) XXXX-XXXX
        formatado = `(${valor.substring(0, 2)}) ${valor.substring(2, 6)}-${valor.substring(6)}`;
    } else {
        // Manter o valor original se não corresponder a nenhum formato esperado
        formatado = valor;
    }

    // Atualizar o valor do campo de entrada com o valor formatado
    input.value = formatado;
}


const textarea = document.getElementById("observacao");
const charCount = document.getElementById("charCount");
const maxLength = 300;

textarea.addEventListener("input", function () {
    const currentLength = textarea.value.length;
    const remainingLength = maxLength - currentLength;

    charCount.textContent = `Máximo de caracteres: ${remainingLength}`;
});
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
    resumo = resumo.slice(0, -2) + "<br><br>"; // Adicionar duas quebras de linha após os molhos selecionados
    resumo += "<strong>Retirada ou Entrega:</strong> " + opcao + "<br>";
    resumo += "<strong>Forma de Pagamento:</strong> " + formaPagamento + "<br>";
    resumo += "<strong>Observação:</strong> " + observacao + "<br>";

    // Atualizar o conteúdo do elemento 'resumo'
    document.getElementById("resumo").innerHTML = resumo;
}

