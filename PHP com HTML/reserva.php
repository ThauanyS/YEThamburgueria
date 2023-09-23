
<?php 
    $_con = mysqli_connect('127.0.0.1', 'root', '', 'bd_yet');
    if ($_con === FALSE) {
        echo "Não foi possível conectar ao Servidor de banco de dados ";
    } else {
        echo "Foi possível conectar ao Servidor de banco de dados ";

        // Recupere os dados do formulário usando o método POST
        $nome = $_POST['nome']; 
        $QtdP = $_POST['QtdDePessoas']; 
        $telefone = $_POST['telefone'];
        $mesa = $_POST['mesa'];
        $data = $_POST['data'];
        $hora = $_POST['hora'];

        // Crie e execute a consulta de inserção
        $query = "INSERT INTO reserva (nome_res, QtdPessoas_res, telefone_res, mesa_res, data_res, hora_res) 
        VALUES ('$nome', '$QtdP', '$telefone', '$mesa', '$data', '$hora')";
        $result = mysqli_query($_con, $query);

        if ($result) {
            echo "Os dados foram inseridos com sucesso.";
        } else {
            echo "Erro ao inserir os dados: " . mysqli_error($_con);
        }

        mysqli_close($_con);
    }

?>