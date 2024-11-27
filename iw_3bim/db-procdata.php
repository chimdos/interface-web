<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bs/css/bootstrap.min.css">
    <title>Adicionar Cadastros</title>
</head>

<?php
// Inclua o arquivo de conexão com o banco de dados
include("db-process.php");

// função para limpar os dados

// captura e sanitiza os dados do formulário
$nome = $_GET["nome"];
$data_nascimento = $_GET["data_nascimento"];
$email = $_GET["email"];
$telefone = $_GET["telefone"];
$telefoneformatado = preg_replace('/[^0-9]/', '', $telefone);
$cep = $_GET["cep"];
$cepformatado = str_replace('-', '', $cep);
$rua = $_GET["rua"];
$numero = $_GET["numero"];
$bairro = $_GET["bairro"];
$cidade = $_GET["cidade"];
$estado = $_GET["estado"];
$complemento = $_GET["complemento"];
$assunto = $_GET["assunto"];
$mensagem = $_GET["mensagem"];
$senha = $_GET["senha"];
$cpf = $_GET["cpf"];
$cpfformatado = preg_replace('/[^0-9]/', '', $cpf);
$rg = $_GET["rg"];
$rgformatado = preg_replace('/[^0-9]/', '', $rg);

// validar os dados
$errors = [];
if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $data_nascimento)) {
    $errors[] = "<h2>Data de nascimento inválida. Use o formato YYYY-MM-DD.</h2>";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "<h2>E-mail inválido.</h2>";
}
if (!preg_match("/^\d{11}$/", $telefoneformatado)) {
    $errors[] = "<h2>Telefone inválido. Deve conter 11 dígitos.</h2>";
}
if (!preg_match("/^\d{11}$/", $cpfformatado)) {
    $errors[] = "<h2>CPF inválido. Deve conter 11 dígitos.</h2>";
}
if (!preg_match("/^\d+$/", $rgformatado)) {
    $errors[] = "<h2>RG inválido. Deve conter apenas números.</h2>";
}
if (strlen($senha) < 6) {
    $errors[] = "<h2>A senha deve ter pelo menos 6 caracteres.</h2>";
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }
    exit;
}

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);


$sqlinsert = "insert into usuario (nome, data_nascimento, email, telefone, cep, rua, numero, bairro, cidade, estado, complemento, assunto, mensagem, senha, cpf, rg) values ('$nome', '$data_nascimento', '$email', '$telefone', '$cep', '$rua', '$numero', '$bairro', '$cidade', '$estado', '$complemento', '$assunto', '$mensagem', '$senha', '$cpf', '$rg')";

$resultado = mysqli_query($conn, $sqlinsert);
if (!$resultado) {
    die('Algo deu errado' . mysqli_error($conn));
} else {
    echo ("<h1 class='fw-bold'>Registro Concluído</h1>");
    echo ("<a href='db-viewcadastros.php'><button class='btn btn-warning fw-bold mt-3' type='button'>VER REGISTROS</button></a>");
}

