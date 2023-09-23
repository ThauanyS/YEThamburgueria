
<?php 
    $_con = mysqli_connect('127.0.0.1', 'root', '', 'bd_yet');
    if ($_con === FALSE) {
        echo "Não foi possível conectar ao Servidor de banco de dados ";
    } else {
        echo "Foi possível conectar ao Servidor de banco de dados ";

        // Recupere os dados do formulário usando o método POST
        $nome = $_POST['nome']; 
        $celular = $_POST['celular'];
        $hamburgueres = $_POST['hamburgueres'];
        $bebidas = $_POST['bebidas'];
        $molho = $_POST['molhos'];
        $endereco = $_POST['endereco'];
        $ret_ent = $_POST['opcao'];
        $forma = $_POST['formapagamento'];
        $obs = $_POST['observacao'];


        // Crie e execute a consulta de inserção
        $query = "INSERT INTO pedido (nome_ped, celular_ped, hamburgueres_ped, bebidas_ped, molho_ped, endereco_ped, retirada_entrega_ped, forma_pag_ped, observacao_ped) 
        VALUES ('$nome', '$celular', '$hamburgueres', '$bebidas', '$molho', '$endereco', '$ret_ent', '$forma', '$obs')";
        $result = mysqli_query($_con, $query);

        if ($result) {
            echo "Os dados foram inseridos com sucesso.";
        } else {
            echo "Erro ao inserir os dados: " . mysqli_error($_con);
        }

        mysqli_close($_con);
    }

?>