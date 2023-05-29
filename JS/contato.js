const inputs = document.querySelectorAll("[required]");
inputs.forEach( (elemento)=> {
    elemento.addEventListener("blur", (evento)=>{
        validaCampo(evento.target)
    });
});

function validaCampo(campo){
    const msnErro = campo.parentNode.querySelector("[data-erro]");
    if(campo.name === "Nome"){
        if(campo.value.length<5){
            msnErro.textContent = "Digite o nome completo";
        }else{
            msnErro.textContent= "";
        }
    }
}