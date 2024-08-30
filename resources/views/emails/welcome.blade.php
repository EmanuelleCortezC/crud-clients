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
            <img src="{{ $message->embed('storage/images/company-logo.png') }}" alt="Wolf Components">
        </div>
        <div class="content">
            <h1>Bem-vindo à Wolf Components {{ $client->name }}! </h1>
            <p>Aqui na Wolf Components, somos lobos quando o assunto é tecnologia! Oferecemos tudo que você precisa para montar, atualizar ou manter seu computador: peças de alta qualidade, periféricos top de linha, e serviços de montagem e manutenção.</p>
            <p>Nosso diferencial? Entregamos rápido, com serviço garantido em todo o Brasil. Seja onde for, nosso bando está pronto para te atender. Conte com a gente para cuidar da sua máquina com a força e agilidade de um lobo!</p>
        </div>
        <div class="footer">
            <p>
                Atenciosamente,
                <br>
                Equipe Wolf Components
            </p>
            <p>Endereço: Rua Nova Esperança, 123, Vila Olímpica, São Paulo - SP, 01234-567
                <br>
                <a href="mailto:contato@wolfcomponents.com">contato@wolfcomponents.com</a>
            </p>
            <p>© 2024 Wolf Components. Siga o bando!</p>
        </div>
    </div>
</body>

</html>