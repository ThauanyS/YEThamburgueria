const inputs = document.querySelectorAll("[required]");
inputs.forEach( (elemento)=> {
    elemento.addEventListener("blur", (evento)=>{
        console.log("sair")
    });
});