<?php
$_con = mysqli_connect('127.0.0.1', 'root', '', 'bd_yet');
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário usando o método POST
    $nome = $_POST['nome'];
    $celular = $_POST['celular'];
    $hamburgueres = $_POST['hamburgueres'];
    $bebidas = $_POST['bebidas'];
    $molhos = $_POST['molhos'];
    $endereco = $_POST['endereco'];
    $opcao = $_POST['opcao'];
    $formapagamento = $_POST['formapagamento'];
    $observacao = $_POST['observacao'];

    // Crie e execute a consulta de inserção
    $query = "INSERT INTO pedido (nome_ped, celular_ped, hamburgueres_ped, bebidas_ped, molho_ped, endereco_ped, retirada_entrega_ped, forma_pag_ped, observacao_ped) 
    VALUES ('$nome', '$celular', '$hamburgueres', '$bebidas', '$molhos', '$endereco', '$opcao', '$formapagamento', '$observacao')";
    $result = mysqli_query($_con, $query);

    if ($result) {
        $message = "Pedido enviado com sucesso. Aguarde...";
    } else {
        $message = "Erro ao enviar o pedido: " . mysqli_error($_con);
    }

    mysqli_close($_con);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/cliente.css">
    <link rel="stylesheet" href="../CSS/layout.css">
    <link rel="icon" href="../imagem/YTE.jpg">
    <title>Finalizado!</title>
    <style>
        .message-container,
        .message-container a {
            background-color: darkorange;
            color: black;
        }
    </style>
</head>

<body>

    <nav class="topnav">
        <a href="../HTML/index.html">Home</a>
        <a href="../HTML/quem_somos.html">Quem somos</a>
        <a href="../HTML/cardapio.html">Cardápio</a>
        <a href="../HTML/promocao_do_dia.html">Promoção do Dia</a>
        <a href="../HTML/contato.html"> Contato</a>
        <a href="../HTML/pedido.html">Pedido</a>
        <a href="../HTML/reserva.html">Reserva</a>
        <a href="../HTML/cliente.html">Cliente</a>
    </nav>
    
    <div class="message-container">
        <?php if ($message !== '') { ?>
            <a id="message"><?php echo $message; ?></a>
            <img id="message" src="https://www.photofunky.net/output/image/d/b/0/e/db0e69/photofunky.gif" alt="GIF" width="100" height="100">
        <?php } ?>
    </div>
</body>

</html>