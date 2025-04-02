<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);

    // E-mail para onde você quer receber os contatos
    $to = 'atendimento@cgstech.com.br';
    $subject = 'Novo Contato do Site CGS Tech';
    $message = "
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 20px;
                }
                .container {
                    background-color: #ffffff;
                    border-radius: 5px;
                    padding: 20px;
                    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                }
                h2 {
                    color: #333;
                }
                p {
                    color: #555;
                }
                .footer {
                    margin-top: 20px;
                    font-size: 12px;
                    color: #888;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h2>Você recebeu um novo contato!</h2>
                <p><strong>Nome:</strong> $name</p>
                <p><strong>E-mail:</strong> $email</p>
                <p><strong>Telefone:</strong> $phone</p>
                <p>Obrigado por entrar em contato conosco. Nossa equipe irá responder o mais breve possível.</p>
            </div>
            <div class='footer'>
                <p>CGS Tech &copy; " . date("Y") . "</p>
            </div>
        </body>
        </html>
    ";
    
    // Cabeçalhos do e-mail
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: <$email>" . "\r\n"; // E-mail do remetente

    // Enviar o e-mail para você
    if (mail($to, $subject, $message, $headers)) {
        // E-mail de confirmação para o cliente
        $subjectConfirmation = 'Confirmação de Recebimento';
        $confirmationMessage = "
            <html>
            <head>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        margin: 0;
                        padding: 20px;
                    }
                    .container {
                        background-color: #ffffff;
                        border-radius: 5px;
                        padding: 20px;
                        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                    }
                    h2 {
                        color: #333;
                    }
                    p {
                        color: #555;
                    }
                    .footer {
                        margin-top: 20px;
                        font-size: 12px;
                        color: #888;
                    }
                </style>
            </head>
            <body>
                <div class='container'>
                    <h2>Obrigado pelo seu contato!</h2>
                    <p>Olá $name,</p>
                    <p>Recebemos seu contato e nossa equipe entrará em contato em breve.</p>
                    <p>Se precisar de assistência imediata, sinta-se à vontade para nos contatar pelo telefone ou e-mail.</p>
                    <p>Atenciosamente,<br>Equipe CGS Tech</p>
                </div>
                <div class='footer'>
                    <p>CGS Tech &copy; " . date("Y") . "</p>
                </div>
            </body>
            </html>
        ";

        // Cabeçalhos para o e-mail de confirmação
        $headersConfirmation = "MIME-Version: 1.0" . "\r\n";
        $headersConfirmation .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headersConfirmation .= "From: <atendimento@cgstech.com.br>" . "\r\n"; // E-mail de origem

        // Enviar e-mail de confirmação
        mail($email, $subjectConfirmation, $confirmationMessage, $headersConfirmation);
        
        echo "E-mails enviados com sucesso!";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGS Tech</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
</body>



</html>



<?php
    } else {
        echo "Falha ao enviar os e-mails.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
