<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../imagem/cliente.png">
    <link rel="stylesheet" href="../CSS/cliente.css">
    <title>Cadastrar Cliente</title>


</head>

<body>

    <nav class="topnav">
        <a href="../html/index.html">Home</a>
        <a href="../html/quem_somos.html">Quem somos</a>
        <a href="../html/cardapio.html">Cardápio</a>
        <a href="../html/promocao_do_dia.html">Promoção do Dia</a>
        <a href="../PHPcomHTML/contato.php"> Contato</a>
        <a href="../PHPcomHTML/pedido.php">Pedido</a>
        <a href="../PHPcomHTML/reserva.php">Reserva</a>
        <a href="../PHPcomHTML/cliente.php">Cliente</a>
    </nav>
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
    <div class="container">

        <?php
        if ($message !== '') {
        ?>
            <a id="message"><?php echo $message; ?></a>
            <img id="message" src="https://www.photofunky.net/output/image/d/b/0/e/db0e69/photofunky.gif" alt="GIF" width="100" height="100">
        <?php
        }
        ?>

        <!-- Campos do formulário -->
        <form id="myForm" class="form" method="POST" action="../PHPcomHTML/cliente.php">
            <div>
                <img class="card" src="../imagem/cliente.png">
                <p>Cadastre-se como nosso cliente e seja nosso cliente oficial!!!</p>
            </div>

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo." required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="xxxxxxxx@xxxxx" required>

            <label for="phone">Celular:</label>
            <input type="tel" id="phone" minlength="14" name="celular" maxlength="15" oninput="formatarTelefone(this)" placeholder="(XX) XXXXX-XXXX" pattern="\([0-9]{2}\) [0-9]{5}-[0-9]{4}" required>

            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" class="form-control" id="cpf" minlength="14" maxlength="14" placeholder="Formato: 999.999.999-99" pattern="[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}" oninput="formatarCPF(this)" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" placeholder="senha" required>

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