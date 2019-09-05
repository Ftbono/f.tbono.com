<!DOCTYPE html>

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
$donodosite_email="felipe@nipotech.com";
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

# $enviarcontato = mail($emaildestinatario, $assunto, $mensagemHTML, $headers );

?>

<html lang="pt-br">

<head>
<link rel="stylesheet" type="text/css" href="visual.css">

<title>Ftbono</title>

</head>

<body>

  <div class="header">
            
      <a href="https://f.tbono.com" class="logo">Ftbono</a>

  <div class="header-right">
    
      <a href="https://f.tbono.com">Início</a>
  
      <a class="active" href="https://f.tbono.com/contato.php">Contato</a>
    
      <a href="#about">Sobre</a>
        
  </div>
  </div>

  <div style="padding-left:20px">

      <h1>Contato</h1>
        <!-- Formulário -->
        <h2>Fale comigo</h2>
                           
         <form method="post" action="contatoenvia.php">

               <fieldset>
                          
                  <legend>Dados:</legend>

                  <p>
                  Nome:<br />
                  <input type="text" name="nome" size="30" value="" required><br>
                  </p>

                  <p>
                  Email:<br />
                  <input type="email" name="email" size="30" value="" required><br>
                  </p>

                  <p>
                  Telefone [(xx) xxxxx-xxxx]:<br />
                  <input type="tel" pattern='[\(]\d{2}[\)] \d{5}[\-]\d{4}' name="telefone" value="" size="30" required><br>
                  </p>

                  <p>
                  Mensagem:<br />
                  <textarea type="text" name="mensagem" size="35" value="" required></textarea><br>
                  </p>

                  <p>
                  <input type="submit" value="Enviar" name="BTEnvia">
                  <input type="reset" value="Apagar" name="BTApagar">
                  </p>

               </fieldset>
               
         </form>

    </div>

</body>
</html>
