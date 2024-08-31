<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo à Wolf Components</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 150px;
        }

        .content {
            margin-bottom: 20px;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ $message->embed(public_path('storage/images/company-logo.png')) }}" alt="Wolf Components">
        </div>
        <div class="content">
            <h1>Bem-vindo(a) à Wolf Components, </h1>
            <h1>{{ $client->name }}! </h1>
            <p>Se você busca a melhor loja para peças de qualidade, periféricos, montagens e manutenção de computadores, você está no lugar certo!</p>
            <p>Entregamos rápido, com serviço garantido em todo o Brasil. Nossa equipe está pronta para cuidar de cada detalhe do seu pedido, desde a compra até a entrega. Está esperando o que para se juntar a matilha?</p>
        </div>
        <div class="footer">
            <p>
                Atenciosamente,
                <br>
                Equipe Wolf Components
            </p>
            <p>Rua Nova Esperança, 123, Vila Olímpica, São Paulo - SP, 01234-567
                <br>
                <a href="mailto:contato@wolfcomponents.com">contato@wolfcomponents.com</a>
            </p>
            <p>© 2024 Wolf Components. Siga a matilha!</p>
        </div>
    </div>
</body>

</html>