function validar() {
    const nome = document.getElementById("nome").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const assunto = document.getElementById("assunto").value;
    const mensagem = document.getElementById("mensagem").value;
    const messageBox = document.getElementById("messageBox");

    const nomeSobrenomeRegex = /^[a-zA-Z]+\s[a-zA-Z]+$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phoneRegex = /^\(\d{2}\)\s\d{4,5}-\d{4}$/;

    if (nome === '' || !nomeSobrenomeRegex.test(nome) || phone === '' || !phoneRegex.test(phone) || email === '' || !emailRegex.test(email) || assunto === '' || mensagem === '') {
        // Exibir mensagem de erro no mesmo messagebox
        messageBox.innerHTML = "Por favor, preencha todos os campos corretamente.";
        messageBox.className = "message error";
        return false; // Retorna false para impedir o envio do formulário
    }

    // Limpar os campos
    document.getElementById("nome").value = '';
    document.getElementById("email").value = '';
    document.getElementById("phone").value = '';
    document.getElementById("assunto").value = '';
    document.getElementById("mensagem").value = '';

    // Redefinir o contador de caracteres
    const charCount = document.getElementById("charCount");
    charCount.textContent = `Máximo de caracteres: ${maxLength}`;

    // Exibir mensagem de sucesso no mesmo messagebox
    messageBox.innerHTML = "Enviado com sucesso!";
    messageBox.className = "message success";
    messageBox.style.display = "block";

    // Seleciona o elemento select
    const selectElement = document.querySelector('select');

    // Remove a classe "changed" quando o valor selecionado é alterado
        selectElement.classList.remove('changed');

    setTimeout(function () {
        messageBox.innerHTML = "";
        messageBox.className = "message success";
    }, 3000);

    return true; // Retorna true para permitir o envio do formulário
}

const form = document.getElementById("myForm");
form.onsubmit = validar;



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



const textarea = document.getElementById("mensagem");
const charCount = document.getElementById("charCount");
const maxLength = 300;

textarea.addEventListener("input", function () {
    const currentLength = textarea.value.length;
    const remainingLength = maxLength - currentLength;

    charCount.textContent = `Máximo de caracteres: ${remainingLength}`;
});