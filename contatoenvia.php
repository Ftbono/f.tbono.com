<?php

##### Headers de no-cache
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

if (isset($_POST['nome']))  { $nome=$_POST['nome']; } else   { $nome=''; }
if (isset($_POST['email'])) { $email=$_POST['email']; } else { $email=''; }
if (isset($_POST['telefone']))   { $telefone=$_POST['telefone']; } else     { $telefone=''; }
if (isset($_POST['mensagem']))  { $mensagem=$_POST['mensagem']; } else   { $mensagem=''; }


##### Variáveis
$donodosite_nome="Felipe";
$donodosite_email="ftbono@nipotech.com";
$emaildestinatario  = $donodosite_email;
$assunto            =   "Contato enviado através do site ".$_SERVER['SERVER_NAME']." vindo do IP ".$_SERVER['REMOTE_ADDR'];
$mensagemHTML       =<<<HTML
<h1>Olá,</h1>

Foi feito um novo contato pelo formulário do site<br>
Nome: {$nome}<br>
Email: {$email}<br>
Telefone: {$telefone}<br>
Mensagem: {$mensagem}<br><br>

Valeu !

HTML;

#### Definir os headers do email que será enviado
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: {$nome} <{$email}>\r\n";
$headers .= "Bcc: felipe@nipotech.com\r\n";

$executaoenviodoemail = mail($emaildestinatario, $assunto, $mensagemHTML, $headers );

#### Conexão com MySQL  
$servername = "localhost";
$database = "ftbono";
$username = "ftbono";
$password = "ftbono2k19X#";

# Criar uma conexão
$conn = mysqli_connect($servername, $username, $password, $database);

# Checar a conexão
if (!$conn) {
      die("Conexão falha: <br>" . mysqli_connect_error());
}
 
echo "Conexão sucedida<br>";
 
$sql = "INSERT INTO contato (id, nome, email, telefone, mensagem) VALUES (NULL, '{$nome}', '{$email}', '{$telefone}', '{$mensagem}')";
if (mysqli_query($conn, $sql)) {
      echo "Seu contato foi enviado!<br>";
} else {
      echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

header("Location:contatoobrigado.php");



?>