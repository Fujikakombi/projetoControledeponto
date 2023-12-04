<?php

// Incluir a conexão com o banco de dados
include_once "conexaoponto.php";

// ID do usuário fixo para testar
$id_usuario = 1;

// Consulta para obter todos os registros de ponto do usuário
$query_registros = "SELECT data_entrada, entrada, saida_intervalo, retorno_intervalo, saida 
                    FROM pontos
                    WHERE usuario_id = :usuario_id
                    ORDER BY id DESC";

// Preparar a QUERY
$result_registros = $conn->prepare($query_registros);

// Substituir o link da QUERY pelo valor
$result_registros->bindParam(':usuario_id', $id_usuario);

// Executar a QUERY
$result_registros->execute();

// Verificar se encontrou algum registro no banco de dados
if ($result_registros->rowCount() > 0) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Registros de Ponto</title>
        <link rel="stylesheet" href="listaregistro.css">
    </head>
    <body>
        <h1>Lista de Registros de Ponto</h1>
        <table border="1">
            <tr>
                <th>Data</th>
                <th>Entrada</th>
                <th>Saída Intervalo</th>
                <th>Retorno Intervalo</th>
                <th>Saída</th>
            </tr>
            <?php
            while ($row_registro = $result_registros->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?= $row_registro['data_entrada'] ?></td>
                    <td><?= $row_registro['entrada'] ?></td>
                    <td><?= $row_registro['saida_intervalo'] ?></td>
                    <td><?= $row_registro['retorno_intervalo'] ?></td>
                    <td><?= $row_registro['saida'] ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
    </html>
    <?php
} else {
    echo "<p>Nenhum registro de ponto encontrado.</p>";
}
?>
