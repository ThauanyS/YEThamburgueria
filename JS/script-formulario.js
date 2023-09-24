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
        const messages = document.querySelectorAll('#message');
        messages.forEach(function (message) {
            message.style.display = 'none';
        });
    }, 5000);
};
// Seleciona todos os elementos textarea na página
const textareas = document.getElementsByTagName('textarea');
const maxLength = 300;

// Adiciona um ouvinte de eventos a todos os elementos textarea
for (let i = 0; i < textareas.length; i++) {
    const textarea = textareas[i];
    const charCount = document.getElementById(`charCount${textarea.id}`);

    textarea.addEventListener("input", function () {
        const currentLength = textarea.value.length;
        const remainingLength = maxLength - currentLength;

        charCount.textContent = `Máximo de caracteres restantes: ${remainingLength}`;
        
        // Limita o número de caracteres no textarea
        if (currentLength > maxLength) {
            textarea.value = textarea.value.substring(0, maxLength);
        }
    });
}



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

