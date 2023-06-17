function validar() {
  
    const nome = document.getElementById("nome").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const assunto = document.getElementById("assunto").value;
    const mensagem = document.getElementById("mensagem").value;
    const mensagemErro = document.getElementById("mensagemErro");
  
    var nomeSobrenomeRegex = /^[a-zA-Z]+\s[a-zA-Z]+$/;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var phoneRegex = /^\(\d{2}\)\s\d{4,5}-\d{4}$/;
  
    if (nome === '') {
      mensagemErro.textContent = 'Por favor, preencha o campo de nome.';
      return; // interrompe a execução se houver erro
    } if (!nomeSobrenomeRegex.test(nome)) {
      mensagemErro.textContent = 'Por favor, insira um nome e sobrenome válidos (apenas letras).';
      return; // interrompe a execução se houver erro
    } if (phone === '') {
      mensagemErro.textContent = 'Por favor, preencha o campo de celular.';
      return; // interrompe a execução se houver erro
    } if (!phoneRegex.test(phone)) {
      mensagemErro.textContent = 'Por favor, insira um número de celular válido no formato (XX) XXXX-XXXX.';
      return; // interrompe a execução se houver erro
    } if (email === '') {
      mensagemErro.textContent = 'Por favor, preencha o campo de e-mail.';
      return; // interrompe a execução se houver erro
    } if (!emailRegex.test(email)) {
      mensagemErro.textContent = 'Por favor, insira um endereço de e-mail válido.';
      return; // interrompe a execução se houver erro
    } if (assunto === '') {
      mensagemErro.textContent = 'Por favor, selecione um assunto.';
      return; // interrompe a execução se houver erro
    } if (mensagem === '') {
      mensagemErro.textContent = 'Por favor, preencha o campo de mensagem.';
      return; // interrompe a execução se houver erro
    }
  
    // Se todas as validações passarem, limpar a mensagem de erro
  

    mensagemErro.textContent = "Salvo com sucesso! Fique a vontade para mais cadastros.";


    // Limpar os campos
    document.getElementById("nome").value = '';
    document.getElementById("email").value = '';
    document.getElementById("phone").value = '';
    document.getElementById("assunto").value = '';
    document.getElementById("mensagem").value = '';
  }
  const form = document.getElementById("myForm");
  form.addEventListener("submit", function (event) {
    event.preventDefault(); // Impede o envio padrão do formulário
    validar();
  });