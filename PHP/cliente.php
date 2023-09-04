<?php 
$_con = mysqli_connect('127.0.0.1','root','','bd_yet');
if($_con===FALSE) {
    echo "Não foi possível conectar ao Servidor de banco de dados ";
} else {
    echo "Foi possível conectar ao Servidor de banco de dados ";
    // Exemplo: SQL query
    // $result = mysqli_query($_con, "use bd_escola;");
    $query = "SELECT * FROM cliente";
    $result = mysqli_query($_con, $query);
    mysqli_close($_con);
}
?>
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
        $data = $_POST['date'];
        $cep = $_POST['cep'];
        $cpf = $_POST['cpf'];



        // Crie e execute a consulta de inserção
        $query = "INSERT INTO cliente (nome_cli, email_cli, data_nasc_cli,cpf_cli,celular_cli, cep_cli) 
        VALUES ('$nome', '$email', '$data', '')";
        $result = mysqli_query($_con, $query);

        if ($result) {
            echo "Os dados foram inseridos com sucesso.";
        } else {
            echo "Erro ao inserir os dados: " . mysqli_error($_con);
        }

        mysqli_close($_con);
    }

?>