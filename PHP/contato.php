
<?php 
    $_con = mysqli_connect('127.0.0.1', 'root', '', 'bd_yet');
    if ($_con === FALSE) {
        echo "Não foi possível conectar ao Servidor de banco de dados ";
    } else {
        echo "Foi possível conectar ao Servidor de banco de dados ";

        // Recupere os dados do formulário usando o método POST
        $nome = $_POST['nome']; 
        $email = $_POST['email']; 
        $celular = $_POST['celular'];
        $assunto = $_POST['assunto'];
        $mensagem = $_POST['mensagem'];



        // Crie e execute a consulta de inserção
        $query = "INSERT INTO contato (nome_con,assunto_con, mensagem_con, email_con, celular_con) 
        VALUES ('$nome', '$assunto', '$mensagem', '$email', '$celular')";
        $result = mysqli_query($_con, $query);

        if ($result) {
            echo "Os dados foram inseridos com sucesso.";
        } else {
            echo "Erro ao inserir os dados: " . mysqli_error($_con);
        }

        mysqli_close($_con);
    }

?>