
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

function formatarCPF(input) {
    // Obter o valor do campo de entrada e remover caracteres não numéricos
    let valor = input.value.replace(/\D/g, "");

    // Variável para armazenar o valor formatado do CPF
    let formatado;

    // Verificar o comprimento do valor para determinar o formato adequado
    if (valor.length === 11) {
        // Formatar como XXX.XXX.XXX-XX
        formatado = `${valor.substring(0, 3)}.${valor.substring(3, 6)}.${valor.substring(6, 9)}-${valor.substring(9)}`;
    } else {
        // Manter o valor original se não corresponder ao formato esperado
        formatado = valor;
    }

    // Atualizar o valor do campo de entrada com o valor formatado
    input.value = formatado;
}
