<?php
include("db-process.php");

// prepara a consulta para selecionar todos os registros da tabela
$sql = "SELECT id, nome, data_nascimento, email, telefone, cep, rua, numero, bairro, cidade, estado, complemento, assunto, mensagem, cpf, rg FROM usuario";
$result = $conn->query($sql);

if (!$result) {
    die("Erro na consulta: " . $conn->error);
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
    <title>Visualizar Cadastros</title>
    <script>

    </script>
</head>
<body>
    <nav class="navbar justify-content-center bg-dark barra"> <!-- navbar -->
            <p class="fw-bold text-white fs-3 mt-1">Visualizar Cadastros</p>
    </nav>

    <main class="container-fluid mt-5">

    <div class="container d-flex justify-content-center">
        <h2 class="mb-4">Lista de Cadastros</h2>
    </div>
    <div class="container d-flex justify-content-center">
    <a href="mainpage.html"><button type="button" class="btn btn-secondary fw-bold">FORMULÁRIO</button></a>
    </div>
        <div class="row table-responsive">
        <table class="table table-striped table-bordered table-sm mt-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>CEP</th>
                    <th>Rua</th>
                    <th>Número</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Complemento</th>
                    <th>Assunto</th>
                    <th>Mensagem</th>
                    <th>CPF</th>
                    <th>RG</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // verifica se há resultados
                if ($result->num_rows > 0) {
                    // exibe os dados de cada linha
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='mb-5'>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['data_nascimento']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['telefone']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['cep']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['rua']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['numero']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['bairro']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['cidade']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['estado']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['complemento']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['assunto']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['mensagem']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['cpf']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['rg']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<h2>Nenhum cadastro foi encontrado</h2>";
                }

                // fechar a conexao
                $result->free();
                $conn->close();
                ?>
            </tbody>
        </table>
        </div>
    </main>
</body>
</html>
