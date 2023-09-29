<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/pedido.css">
    <link rel="stylesheet" href="../CSS/layout.css">
    <link rel="icon" href="../imagem/YTE.jpg">
    <title>Pedido</title>
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
            $message = "Pedido enviado com sucesso.";
        } else {
            $message = "Erro ao enviar o pedido: " . mysqli_error($_con);
        }

        mysqli_close($_con);
    }
    ?>
    <div class="container">
        <?php if ($message !== '') { ?>
            <a id="message"><?php echo $message; ?></a>
            <img id="message" src="https://www.photofunky.net/output/image/d/b/0/e/db0e69/photofunky.gif" alt="GIF" width="100" height="100">
        <?php } ?>

        <!-- Campos do formulário -->
        <form id="myForm" method="POST" action="../PHPcomHTML/pedido.php">
            <div>
                <img class="card" src="https://cdn-icons-png.flaticon.com/256/5787/5787016.png">
                <h2>Formulário de Pedido</h2>
            </div>

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo." required>

            <label for="phone">Celular:</label>
            <input type="tel" id="phone" minlength="14" name="celular" maxlength="15" oninput="formatarTelefone(this)" placeholder="(XX) XXXXX-XXXX" pattern="\([0-9]{2}\) [0-9]{5}-[0-9]{4}" required>

            <label for="hamburgueres">Hambúrgueres:</label>
            <input type="text" id="hamburgueres" placeholder="Descreva o que você gostaria de pedir.(Nome, Quantidade...)" name="hamburgueres" required>

            <label for="bebida">Bebidas:</label>
            <input type="text" id="bebida" placeholder="Digite o que você quer beber(opcional)" name="bebidas">

            <h3>Escolha três molhos(opcional):</h3>
            <div class="molhos">
                <input type="checkbox" id="ketchup" name="molhos" value="Ketchup">
                <label for="ketchup">Ketchup</label><br>
            </div>
            <div class="molhos">
                <input type="checkbox" id="maionese" name="molhos" value="Maionese">
                <label for="maionese">Maionese Temperada</label><br>
            </div>
            <div class="molhos">
                <input type="checkbox" id="mostarda" name="molhos" value="Mostarda">
                <label for="mostarda">Mostarda</label><br>
            </div>
            <div class="molhos">
                <input type="checkbox" id="barbecue" name="molhos" value="Barbecue">
                <label for="barbecue">Barbecue</label><br>
            </div>
            <div class="molhos">
                <input type="checkbox" id="alho" name="molhos" value="Alho">
                <label for="alho">Molho de Alho</label><br>
            </div>

            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" placeholder="Cidade, Bairro, Rua, Número." name="endereco" required>

            <label for="opcao">Retirada ou Entrega:</label>
            <select id="opcao" name="opcao" onchange="this.classList.add('changed')" required>
                <option value=""></option>
                <option value="retirada">Retirada</option>
                <option value="entrega">Entrega</option>
            </select>

            <label>Forma de Pagamento:</label>
            <select id="formapagamento" name="formapagamento" onchange="this.classList.add('changed')" required>
                <option value=""></option>
                <option value="Crédito">Cartão de Crédito</option>
                <option value="Dinheiro">Dinheiro</option>
                <option value="Débito">Cartão de Débito</option>
                <option value="Pix">Pix</option>
            </select>

            <div class="inputBox">
                <label for="observacao">Observação:</label>
                <textarea id="Observacao" name="observacao" placeholder="..." required maxlength="300" rows="4" cols="50" style="height: 90px"></textarea>
                <div class="carac" id="charCountObservacao">Máximo de caracteres: 300</div>
            </div>

            <button type="submit">Enviar</button>
            <div id="messageBox"></div>
        </form>
    </div>
    <script src="../JS/script-formulario.js"></script>


    <!-- Footer -->
    <footer class="footer">
        <ul>
            <li>Delivery</li>
            <li>(69) 3422-9902</li>
            <li>(69) 99935-6547 (WhatsApp)</li>
            <li>Rua Seis de Maio, 991</li>
            <li>URUPÁ</li>
            <li>JI-PARANÁ</li>
            <li>RONDÔNIA</li>
            <li>
                Copyright © 2023 <a href="#">HAMBURGUERIA YET</a>
            </li>
            <li>
                A Hamburgueria YET traz um novo conceito em Hambúrguer! Pão especial,
                ingredientes selecionados e um hambúrguer elaborado para surpreender
                seus sentidos!
            </li>
        </ul>
    </footer>
</body>

</html>