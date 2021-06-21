<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Link para Avaliação</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="text-center">
    <h2>Link para Avaliação</h2>
    <p>
        Olá {{ $conteudo['nomeSocio'] }}, tudo bom?<br>
        A sua avaliação está pronta para ser preenchida.<br>
        É só clicar no botão abaixo, obrigado!
    </p>
    <br>
    <br>
    <a href="{{ $conteudo['linkagem'] }}" class="btn btn-primary">Avaliar Agora!</a>
    <br>
    <br>
    <p>Se o botão não funcionar é só copiar este link e colar no browser da sua preferência</p>
    <h5>{{ $conteudo['linkagem'] }}</h5>
</body>
</html>
