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
        <h4>Propriedade: {{ $conteudo['nomeProrpiedade'] }}</h4>
        <h4>Sócio: {{ $conteudo['nomeSocio'] }}</h4>
        <ul>
            <h2>Médias das Notas</h2>
            <hr>
            <h3>Casa</h3>
            <li>Acomodações: {{ $conteudo['mediasCasaAcomodacao'] }}</li>
            <li>Funcionários: {{ $conteudo['mediasCasaFuncionarios'] }}</li>
            <li>Equipamentos: {{ $conteudo['mediasCasaEquipamentos'] }}</li>
            <li>Tecnologia TI: {{ $conteudo['mediasCasaTi'] }}</li>
            <hr>
            <li>Ocorrências:</li>
            <ul>
                <li>Acomodações: {{ $conteudo['ocorrenciasCasaAcomodacao'] }}</li>
                <li>Funcionários: {{ $conteudo['ocorrenciasCasaFuncionarios'] }}</li>
                <li>Equipamentos: {{ $conteudo['ocorrenciasCasaEquipamentos'] }}</li>
                <li>Tecnologia TI: {{ $conteudo['ocorrenciasCasaTi'] }}</li>
            </ul>
            <hr>
            <h3>Barco</h3>
            <li>Acomodações: {{ $conteudo['mediasBarcoAcomodacao'] }}</li>
            <li>Funcionários: {{ $conteudo['mediasBarcoFuncionarios'] }}</li>
            <li>Equipamentos:
                @if ( $conteudo['nomeProrpiedade'] == 'Angra dos Reis')
                    {{ $conteudo['mediasBarcoEquipamentosAngra'] }}
                @else
                    {{ $conteudo['mediasBarcoEquipamentosAvare'] }}
                @endif
            </li><hr>
            <li>Ocorrências:</li>
            <ul>
                <li>Acomodações: {{ $conteudo['ocorrenciasbarcoAcomodacao'] }}</li>
                <li>Funcionários: {{ $conteudo['ocorrenciasbarcoFuncionarios'] }}</li>
                <li>Tecnologia TI: {{ $conteudo['ocorrenciasbarcoTi'] }}</li>
            </ul>
        </ul>
    </ul>
</body>
</html>
