function validar(event) {
    event.preventDefault(); // Impede o envio padrão do formulário
    const nome = document.getElementById("nome").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const cep = document.getElementById("cep").value;
    const dataDeNascimento = document.getElementById("date").value;
    const cpf = document.getElementById("cpf").value;
    const messageBox = document.getElementById("messageBox");

    const nomeSobrenomeRegex = /^[a-zA-Z]+\s[a-zA-Z]+$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phoneRegex = /^\(\d{2}\)\s\d{4,5}-\d{4}$/;

    if (nome === '') {
        messageBox.innerHTML = 'Por favor, preencha o campo de nome.';
        messageBox.className = "message error";
        return; // interrompe a execução se houver erro
    } else if (!nomeSobrenomeRegex.test(nome)) {
        messageBox.innerHTML = 'Por favor, insira um nome e sobrenome válidos (apenas letras).';
        messageBox.className = "message error";
        return; // interrompe a execução se houver erro
    } else if (phone === '') {
        messageBox.innerHTML = 'Por favor, preencha o campo de celular.';
        messageBox.className = "message error";
        return; // interrompe a execução se houver erro
    } else if (!phoneRegex.test(phone)) {
        messageBox.innerHTML = 'Por favor, insira um número de celular válido com 11 ou 10 números.';
        messageBox.className = "message error";
        return; // interrompe a execução se houver erro
    } else if (email === '') {
        messageBox.innerHTML = 'Por favor, preencha o campo de e-mail.';
        messageBox.className = "message error";
        return; // interrompe a execução se houver erro
    } else if (!emailRegex.test(email)) {
        messageBox.innerHTML = 'Por favor, insira um email válido. Certifique-se de incluir o símbolo "@" e o domínio ".com"';
        messageBox.className = "message error";
        return; // interrompe a execução se houver erro
    } else if (dataDeNascimento === '') {
        messageBox.innerHTML = 'Por favor, selecione sua data de nascimento.';
        messageBox.className = "message error";
        return; // interrompe a execução se houver erro
    } else if (cep === '') {
        messageBox.innerHTML = 'Por favor, digite seu CEP.';
        messageBox.className = "message error";
        return; // interrompe a execução se houver erro
    } else if (cpf === '') {
        messageBox.innerHTML = 'Por favor, digite seu CPF.';
        messageBox.className = "message error";
        return; // interrompe a execução se houver erro
    }

    // Limpar os campos
    document.getElementById("nome").value = '';
    document.getElementById("email").value = '';
    document.getElementById("phone").value = '';
    document.getElementById("cep").value = '';
    document.getElementById("date").value = '';
    document.getElementById("cpf").value = '';

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
}

const form = document.getElementById("myForm");
form.addEventListener("submit", validar);

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

