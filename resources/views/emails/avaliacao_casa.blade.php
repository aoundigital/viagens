<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email de Avaliação</title>
</head>
<body>
    <h1>Avaliação</h1>
    <ul>
        <li>Propriedade: {{ $conteudo['nomeProrpiedade'] }}</li>
        <li>Sócio: {{ $conteudo['nomeSocio'] }}</li>
        <ul>
            <h2>Médias das Notas</h2>
            <hr>
            <h3>Casa</h3>
            <li>Acomodações: {{ $conteudo['mediasCasaAcomodacao'] }}</li>
            <li>Funcionários: {{ $conteudo['mediasCasaFuncionarios'] }}</li>
            <li>Equipamentos: {{ $conteudo['mediasCasaEquipamentos'] }}</li>
            <li>Tecnologia TI: {{ $conteudo['mediasCasaTi'] }}</li>
        </ul>
    </ul>
</body>
</html>
