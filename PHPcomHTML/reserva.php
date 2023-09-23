<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/reserva.css">
    <title>Reserva</title>
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

    <div class="container">
        <?php if ($message !== '') { ?>
            <div id="message">
                <?php echo $message; ?>
                <img src="https://www.photofunky.net/output/image/d/b/0/e/db0e69/photofunky.gif" alt="GIF" width="100" height="100">
            </div>
        <?php } ?>

        <form id="myForm" method="POST" action="../PHPcomHTML/reserva.php">
            <div>
                <img class="card" src="../imagem/mesa.png">
                <p>Reserve seu cantinho especial ♥</p>
            </div>

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required>

            <label for="QtdDePessoas">Quantidade de pessoas</label>
            <input type="number" id="QtdDePessoas" name="QtdDePessoas" placeholder="Digite ou escolha a quantidade" required>


            <label for="phone">Telefone:</label>
            <input type="tel" id="phone" minlength="14" name="celular" maxlength="15" oninput="formatarTelefone(this)" placeholder="(XX) XXXXX-XXXX" pattern="\([0-9]{2}\) [0-9]{5}-[0-9]{4}" required>

            <label for="mesa">Escolha uma mesa:</label>
            <select id="mesa" name="mesa" onchange="this.classList.add('changed')" required>
                <option value=""></option>
                <option value="Mesa centralizada">Mesa centralizada</option>
                <option value="Mesa nas laterais">Mesa nas laterais</option>
                <option value="Mesa discreta">Mesa discreta</option>
                <option value="Mesa ao ar livre no terraço">Mesa ao ar livre no terraço</option>
            </select>

            <label for="date">Data:</label>
            <input type="date" id="date" name="data" placeholder="" required>


            <label for="hora">Hora:</label>
            <input type="time" id="time" name="hora" placeholder="" required>



            <button type="submit">Concluir Reserva</button>
        </form>
    </div>

    <script src="../JS/reserva.js"></script>

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
        <div class="bottom">
            <ul>
                <div>
                    <a>Copyright © 2023 <span><a href="#">HAMBURGUERIA YET</a></span></a>
                </div>
                <div class="text">
                    <p>A Hamburgueria YET traz um novo conceito em Hambúrguer! Pão especial, ingredientes selecionados e
                        um hambúrguer elaborado para surpreender seus sentidos!</p>
                </div>
            </ul>
        </div>
    </footer>
</body>

</html>