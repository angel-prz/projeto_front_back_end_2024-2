<?php
//parâmetros de configuração para o upload

// limitar as extensões? (sim ou não)
$limitar_ext="sim";

//extensões autorizadas
$extensoes_validas=array(".gif",".jpg",".jpeg",".bmp",".png",".GIF",".JPG",".JPEG",".BMP",".PNG");

// caminho absoluto onde os arquivos serão armazenados
$caminho="../../imagens";

// limitar o tamanho do arquivo? (sim ou não)
$limitar_tamanho="sim";

//tamanho limite do arquivo em bytes
$tamanho_bytes="500000";

// se já existir o arquivo indica se ele deve ser sobrescrito (sim ou não)
$sobrescrever="sim";

function uploadArquivo($file, $caminho)
{
    //chamas as variaveis de fora da funcao
    global $limitar_ext, $extensoes_validas, $limitar_tamanho, $tamanho_bytes, $sobrescrever;

    $nome_arquivo = $file['name'];
    $tamanho_arquivo = $file['size'];
    $arquivo_temporario = $file['tmp_name'];

    if (empty($nome_arquivo)) {
        throw new Exception("Nenhum arquivo foi enviado.");
    }

    // Verifica se o arquivo já existe
    if ($sobrescrever === "não" && file_exists("$caminho/$nome_arquivo")) {
        throw new Exception("Arquivo já existe.");
    }

    // Verifica o tamanho do arquivo
    if ($limitar_tamanho === "sim" && $tamanho_arquivo > $tamanho_bytes) {
        throw new Exception("Arquivo deve ter no máximo $tamanho_bytes bytes.");
    }

    // Verifica a extensão do arquivo
    $ext = strrchr($nome_arquivo, '.');
    if ($limitar_ext === "sim" && !in_array($ext, $extensoes_validas)) {
        throw new Exception("Extensão de arquivo inválida para upload.");
    }

    // Move o arquivo para o destino
    $destino = rtrim($caminho, '/') . '/' . $nome_arquivo;
    if (!move_uploaded_file($arquivo_temporario, $destino)) {
        throw new Exception("Falha ao mover o arquivo para o destino.");
    }

    // Retorna o caminho do arquivo salvo
    return $destino;
}
?>
