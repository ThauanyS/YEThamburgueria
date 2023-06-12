const inputs = document.querySelectorAll("[required]");
inputs.forEach( (elemento)=> {
    elemento.addEventListener("blur", (evento)=>{
        validaCampo(evento.target)
    });
});


function validaCampo(campo){
    const msnErro = campo.parentNode.querySelector("[data-erro]");
    if(campo.name === "nome"){
        if(campo.value.length<5){
            msnErro.textContent = "Digite o nome completo";
        }else{
            msnErro.textContent= "";
        }
    }
}
const textarea = document.getElementById("mensagem");
const charCount = document.getElementById("charCount");
const maxLength = 300; 

textarea.addEventListener("input", function() {
  const currentLength = textarea.value.length;
  const remainingLength = maxLength - currentLength;
  
  charCount.textContent = `Máximo de caracteres: ${remainingLength}`;
});

function submitForm(event) {
    event.preventDefault();
  
    const nome = document.getElementById("nome").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const assunto = document.getElementById("assunto").value;
    const mensagem = document.getElementById("mensagem").value;
  
    var messageBox = document.getElementById("messageBox");
  
    document.getElementById("nome").value = "";
    document.getElementById("email").value = "";
    document.getElementById("phone").value = "";
    document.getElementById("assunto").value = "";
    document.getElementById("mensagem").value = "";
  
    // Limpar os erros
    const erros = document.querySelectorAll("[data-erro]");
    erros.forEach((erro) => {
      erro.textContent = "";
    });
  
    // Redefinir o contador de caracteres
    const charCount = document.getElementById("charCount");
    charCount.textContent = `Máximo de caracteres: ${maxLength}`;
  
    messageBox.innerHTML = "Formulário enviado com sucesso!";
    messageBox.className = "message success";
    
    setTimeout(function() {
        messageBox.innerHTML = "";
        messageBox.className = "message";
      }, 3000);
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





