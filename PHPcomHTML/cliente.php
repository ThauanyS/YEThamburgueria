<?php
$_con = mysqli_connect('127.0.0.1', 'root', '', 'bd_yet');
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário usando o método POST
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    // Crie e execute a consulta de inserção
    $query = "INSERT INTO cliente (nome_cli, email_cli, celular_cli,  cpf_cli, senha_cli) 
            VALUES ('$nome', '$email', '$celular', '$cpf', '$senha')";
    $result = mysqli_query($_con, $query);

    if ($result) {
        $message = "Os dados foram cadastrados com sucesso!";
    } else {
        $message = "Erro ao cadastrar os dados: " . mysqli_error($_con);
    }
}
mysqli_close($_con);


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
            font-size: 50px;
            /* Outros estilos desejados */
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