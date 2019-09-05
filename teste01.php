<html>
    <head>
        <title>teste 01</title>
    </head>

    <body>

    <h1>teste</h1>
   
<?php
//1 – Definimos Para quem vai ser enviado o email
$para = "ftbono@nipotech.com";
//2 - resgatar o nome digitado no formulário e  grava na variavel $nome
$nome = $_POST['nome'];
// 3 - resgatar o assunto digitado no formulário e  grava na variavel 
//$assunto
$assunto = $_POST['assunto'];
 //4 – Agora definimos a  mensagem que vai ser enviado no e-mail
$mensagem = "<strong>Nome:  </strong>".$nome;
$mensagem .= "<br>  <strong>Mensagem: </strong>"
.$_POST['mensagem'];
 
//5 – agora inserimos as codificações corretas e  tudo mais.
$headers =  "Content-Type:text/html; charset=UTF-8\n";
$headers .= "From:  dominio.com.br<sistema@dominio.com.br>\n"; 
//Vai ser //mostrado que  o email partiu deste email e seguido do nome
$headers .= "X-Sender:  <f@tbono.com>\n"; 
//email do servidor //que enviou
$headers .= "X-Mailer: PHP  v".phpversion()."\n";
$headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
$headers .= "Return-Path:  <f@tbono.com>\n"; 
//caso a msg //seja respondida vai para  este email.
$headers .= "MIME-Version: 1.0\n";
 
mail($para, $assunto, $mensagem, $headers);  //função que faz o envio do email.
?>

<form  id="form1" name="form1" method="post" action="enviarEmail.php">
  <table  width="500" border="0" align="center" cellpadding="0" cellspacing="2">
    <tr>
      <td  align="right">Nome:</td>
      <td><input  type="text" name="nome" id="nome" /></td>
    </tr>
    <tr>
      <td  align="right">Assunto:</td>
      <td><input  type="text" name="assunto" id="assunto" /></td>
    </tr>
    <tr>
      <td  align="right">Mensagem:</td>
      <td><textarea  name="mensagem" id="mensagem" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td  colspan="2" align="center"><input type="submit" value="Enviar" /></td>
    </tr>
  </table>
</form>    

    </body>
</html>

