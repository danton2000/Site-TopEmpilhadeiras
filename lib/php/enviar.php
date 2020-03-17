<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Envio de Mensagem</title>

    <style>
		body{
			background-color: #326799;
		}
    </style>
</head>

<body> 
    <?php
    /* Valores recebidos do formulário  */
    $nome = $_POST['nome'];
    $email = $_POST['email']; // Email que será respondido
    $mensagem = $_POST['mensagem'];
    
 
    /* Destinatário e remetente - EDITAR SOMENTE ESTE BLOCO DO CÓDIGO */
    $to = "topempilhadeiras@topempilhadeiras.com.br";
    $remetente = "contato@topempilhadeiras.com.br"; // Deve ser um email válido do domínio
 
    /* Cabeçalho da mensagem  */
    $boundary = "XYZ-" . date("dmYis") . "-ZYX";
    $headers = "MIME-Version: 1.0\n";
    $headers.= "From: $remetente\n";
    $headers.= "Reply-To: $email\n";
    $headers.= " 
    <br>Formulário via site
    <br>--------------------------------------------<br>
    <br><strong>Nome:</strong> $nome
    <br><strong>Email:</strong> $email
    <br><strong>Mensagem:</strong> $mensagem
    <br><br>--------------------------------------------
    ";
    $headers.= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";  
    $headers.= "$boundary\n"; 
 
        
    $mensagem = "--$boundary\n"; 
    $mensagem.= "MENSAGEM DE CONTATO!"; 
    $mensagem.= "$corpo_mensagem\n";
    
 
    /* Função que envia a mensagem  */
    if(mail($to, $mensagem, $headers))
    {
        $msg = "Sua mensagem foi para";
        echo "<script>alert('$msg {$to}!');
        window.location.assign('http://www.topempilhadeiras.com.br/#formulario');</script>";
        
    } 
    else
    {
        $msg = "Erro ao enviar a mensagem."; 
        echo "<script>alert('$msg!');
        window.location.assign('http://www.topempilhadeiras.com.br/#formulario');</script>";
    }

    
?>
</body>
</html>
