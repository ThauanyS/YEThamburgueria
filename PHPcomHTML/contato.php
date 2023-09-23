<?php
$_con = mysqli_connect('127.0.0.1', 'root', '', 'bd_yet');
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário usando o método POST
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];

    // Crie e execute a consulta de inserção
    $query = "INSERT INTO contato (nome_con, assunto_con, mensagem_con, email_con, celular_con) 
        VALUES ('$nome', '$assunto', '$mensagem', '$email', '$celular')";
    $result = mysqli_query($_con, $query);

    if ($result) {
        $message = "Os dados foram cadastrados com sucesso.";
    } else {
        $message = "Erro ao cadastrar os dados: " . mysqli_error($_con);
    }

    mysqli_close($_con);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/contato.css">
    <link rel="icon" href="../imagem/YTE.jpg">
    <title>Contato</title>
</head>

<body>

    <nav class="topnav">
        <a href="index.html">Home</a>
        <a href="quem_somos.html">Quem somos</a>
        <a href="cardapio.html">Cardápio</a>
        <a href="promocao_do_dia.html">Promoção do Dia</a>
        <a href="contato.html">Contato</a>
        <a href="pedido.html">Pedido</a>
        <a href="reserva.html">Reserva</a>
        <a href="cliente.html">Cliente</a>
    </nav>

    <div class="container">
        <?php if ($message !== '') { ?>
            <a id="message"><?php echo $message; ?></a>
            <img id="message" src="https://www.photofunky.net/output/image/d/b/0/e/db0e69/photofunky.gif" alt="GIF" width="100" height="100">
        <?php } ?>

        <!-- Campos do formulário -->
        <form id="myForm" class="form" method="POST" action="../PHPcomHTML/contato.php">
            <div>
                <img class="card" src="https://cdn-icons-png.flaticon.com/512/2776/2776451.png">
                <p>Entre em contato conosco</p>
            </div>

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo." required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="xxxxxxxx@xxxxx" required>

            <label for="phone">Celular:</label>
            <input type="tel" id="phone" minlength="14" name="celular" maxlength="15" oninput="formatarTelefone(this)" placeholder="(XX) XXXXX-XXXX" pattern="\([0-9]{2}\) [0-9]{5}-[0-9]{4}" required>

            <label for="assunto">Selecione um assunto:</label>
            <select id="assunto" name="assunto" name="assunto" onchange="this.classList.add('changed')" required>
                <option value=""></option>
                <option value="Fazer um pedido">Fazer um pedido</option>
                <option value="Consulta sobre o cardápio">Consulta sobre o cardápio</option>
                <option value="Solicitar informações sobre alergias alimentares">Solicitar informações sobre alergias
                    alimentares</option>
                <option value="Feedback ou sugestões">Feedback ou sugestões</option>
                <option value="Parcerias ou eventos especiais">Parcerias ou eventos especiais</option>
                <option value="Outras perguntas ou dúvidas">Outras perguntas ou dúvidas</option>
                <option value="Reportar um erro no site ou aplicativo">Reportar um erro no site ou aplicativo</option>
                <option value="Enviar currículo para oportunidades de emprego">Enviar currículo</option>
                <option value="Reclamação ou problema com um pedido">Reclamação ou problema com um pedido</option>
                <option value="Agendar uma reserva ou evento">Agendar uma reserva ou evento</option>
                <option value="Solicitar informações sobre promoções ou descontos">Solicitar informações sobre promoções
                    ou descontos</option>
                <option value="Consulta sobre opções vegetarianas ou veganas">Consulta sobre opções vegetarianas ou
                    veganas</option>
                <option value="Solicitar informações sobre opções de catering ou entrega em eventos">Solicitar
                    informações sobre opções de catering ou entrega em eventos</option>
                <option value="Solicitar informações sobre opções de pagamento ou formas de entrega">Solicitar
                    informações sobre opções de pagamento ou formas de entrega</option>
                <option value="Solicitar informações sobre horário de funcionamento ou localização da hamburgueria">
                    Solicitar informações sobre horário de funcionamento ou localização da hamburgueria</option>
            </select>

            <label for="mensagem">Mensagem:</label>
            <textarea id="Mensagem" name="mensagem" placeholder="..." maxlength="300" rows="4" cols="50" style="height: 90px" required></textarea>
            <div class="carac" id="charCountMensagem">Máximo de caracteres: 300</div>

            <button type="submit">Enviar</button>
        </form>
    </div>

    <!-- Para validar e manipular o formulário -->
    <script src="../JS/script-formulario.js"></script>

    <!-- Footer -->
    <footer class="footer">
        <div class="contact">
            <ul>
                <div>
                    <a>Delivery</a>
                </div>

                <div>
                    <a>(69) 3422-9902</a>
                </div>

                <div>
                    <a>(69) 99935-6547 (WhatsApp) </a>
                </div>
            </ul>
        </div>

        <div class="end">
            <ul>
                <div>
                    <a>Rua Seis de Maio, 991</a>
                </div>
                <div>
                    <a>URUPÁ</a>
                </div>
                <div>
                    <a>JI-PARANÁ</a>
                </div>
                <div>
                    <a>RONDÔNIA</a>
                </div>
            </ul>
        </div>
    </footer>
</body>

</html>