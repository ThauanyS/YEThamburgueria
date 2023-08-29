function validar(event) {
    event.preventDefault(); // Impede o envio padrão do formulário

    const nome = document.getElementById("nome").value;
    const phone = document.getElementById("phone").value;
    const mesa = document.getElementById("mesa").value;
    const QtdDePessoas = document.getElementById("QtdDePessoas").value;
    const date = document.getElementById("date").value;
    const messageBox = document.getElementById("messageBox");

    const nomeSobrenomeRegex = /^[a-zA-Z]+\s[a-zA-Z]+$/;
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
    } else if (mesa === '') {
        messageBox.innerHTML = 'Por favor, selecione uma mesa.';
        messageBox.className = "message error";
        return; // interrompe a execução se houver erro
    } else if (date === '') {
        messageBox.innerHTML = 'Por favor, selecione uma data.';
        messageBox.className = "message error";
        return; // interrompe a execução se houver erro
    } else if (QtdDePessoas === '') {
        messageBox.innerHTML = 'Por favor, selecione a quantidade de pessoas.';
        messageBox.className = "message error";
        return; // interrompe a execução se houver erro
    }

    // Se todas as validações passarem, exibe uma mensagem de sucesso
    messageBox.innerHTML = 'Reserva realizada com sucesso!';
    messageBox.className = "message success";
}

function formatarTelefone(input) {
    let value = input.value;
    value = value.replace(/\D/g, ""); // Remove todos os caracteres não numéricos
    value = value.replace(/^(\d{2})(\d)/g, "($1) $2"); // Adiciona parênteses em volta dos dois primeiros dígitos
    value = value.replace(/(\d)(\d{4})$/, "$1-$2"); // Adiciona um hífen entre o quarto e o quinto dígitos
    input.value = value;
}
