<?php
// Função para determinar se um número é par ou ímpar
function checkParImpar($number) {
    return ($number % 2 == 0) ? 'par' : 'ímpar';
}

// Inicializa as variáveis para calcular a soma e contar o número de elementos
$sum = [];
$count = [];
$dataNums = [];

// Abre o arquivo CSV para leitura
$file = fopen('data.csv', 'r');

// Verifica se o arquivo foi aberto com sucesso
if ($file !== false) {
    // Lê cada linha do arquivo CSV
    while (($data = fgetcsv($file)) !== false) {
        // Verifica se é uma linha válida e contém valores numéricos
        if (sizeof($data) > 0) {
            // Pega os valores da linha e separa
            $dataNums = explode(";", $data[0]);
            // Soma os valores para cada coluna
            $sum[0] += (int)$dataNums[0];
            $sum[1] += (int)$dataNums[1];
            // Incrementa o contador para cada coluna
            $count[0]++;
            $count[1]++;
        }
    }
    // Fecha o arquivo após a leitura
    fclose($file);
    // Calcula a média das colunas numéricas
    $average1 = $sum[0] / $count[0];
    $average2 = $sum[1] / $count[1];

    // Determina se a média é par ou ímpar usando a função
    $result1 = checkParImpar((int)$average1);
    $result2 = checkParImpar((int)$average2);

    // Exibe o resultado
    print_r( "A média da primeira coluna numérica é: " . round($average1, 2) . ", que é " . $result1 . "\n");
    print_r( "A média da segunda coluna numérica é: " . round($average2, 2) . ", que é " . $result2 . "\n");
} else {
    // Exibe uma mensagem de erro se não for possível abrir o arquivo
    print_r( "Erro ao abrir o arquivo CSV.\n");
}

?>
