<?php
$_con = mysqli_connect('127.0.0.1', 'root', '', 'bd_yet');
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário usando o método POST
    $nome = $_POST['nome'];
    $QtdP = $_POST['QtdDePessoas'];
    $telefone = $_POST['celular'];
    $mesa = $_POST['mesa'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];

    // Crie e execute a consulta de inserção
    $query = "INSERT INTO reserva (nome_res, QtdPessoas_res, telefone_res, mesa_res, data_res, hora_res) 
        VALUES ('$nome', '$QtdP', '$telefone', '$mesa', '$data', '$hora')";
    $result = mysqli_query($_con, $query);

    if ($result) {
        $message = "Reserva cadastrada com sucesso.";
    } else {
        $message = "Erro ao cadastrar a reserva: " . mysqli_error($_con);
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
            <a href="index.html">Home</a>
            <a href="quem_somos.html">Quem somos</a>
            <a href="cardapio.html">Cardápio</a>
            <a href="promocao_do_dia.html">Promoção do Dia</a>
            <a href="contato.html"> Contato</a>
            <a href="pedido.html">Pedido</a>
            <a href="reserva.html">Reserva</a>
            <a href="cliente.html">Cliente</a>
        </nav>
    <div class="message-container">
        <?php if ($message !== '') { ?>
            <a id="message"><?php echo $message; ?></a>
            <img id="message" src="https://www.photofunky.net/output/image/d/b/0/e/db0e69/photofunky.gif" alt="GIF" width="100" height="100">
        <?php } ?>
    </div>

</body>

</html>