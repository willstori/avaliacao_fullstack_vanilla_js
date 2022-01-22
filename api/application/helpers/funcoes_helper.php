<?php

/**
 * Retorna uma variável do arquivo .env
 *
 * @param  string $variavel Nome da váriavel do arquivo .env
 * @return mixed 
 */
function env($variavel)
{

    static $ini_array;

    if (!$ini_array) {

        $ini_array = parse_ini_file(".env");
    }

    return isset($ini_array[$variavel]) ? $ini_array[$variavel] : null;
}

/**
 * Retorna string em letras maiusculas
 *
 * @param  string $string
 * @return string
 */
function maiuscula($string)
{
    return mb_strtoupper($string, 'UTF-8');
}

/**
 * Formata data no formato aaaa-mm-dd
 *
 * @param  string $string
 * @return string
 */
function data_banco($string)
{
    $data = implode("-", array_reverse(explode("/", $string)));
    return $data;
}

/**
 * Formata data no formato dd/mm/aaaa
 *
 * @param  string $string
 * @return string
 */
function data_br($string)
{
    $data = implode("/", array_reverse(explode("-", $string)));
    return $data;
}

/**
 * Converte o número do telefone no formato aceito pelo whatsapp
 *
 * @param  string $numero
 * @return string
 */
function whatsapp_numero($numero)
{
    $caracteres = array("(", ")", "-", ".", "+", " ");
    return "55" . str_replace($caracteres, "", $numero);
}

/**
 * Converte o número do telefone no formato aceito pelo whatsapp (Internacional)
 *
 * @param  string $numero Número de telefone formatado
 * @return string
 */
function whatsapp_internacional($numero)
{
    $caracteres = array("(", ")", "-", ".", "+", " ");
    return str_replace($caracteres, "", $numero);
}

/**
 * Formata data no formato dd abreviatura aaaa
 *
 * @param  string $string
 * @return string
 */
function data_blog($string)
{

    $meses = array('jan', 'fev', 'mar', 'abr', 'maio', 'jun', 'jul', 'ago', 'set', 'out', 'nov', 'dez');

    $date_array = explode("-", $string);

    return $date_array[2] . ' ' . $meses[($date_array[1] - 1)] . ' ' . $date_array[0];
}

/**
 * Formata data no formato dd mês aaaa
 *
 * @param  string $data
 * @return string
 */
function data_extenso($data)
{
    $mes_ano = array(1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril', 5 => 'Maio', 6 => 'Junho', 7 => 'Julho', 8 => 'Agosto', 9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro');
    $data = explode('-', $data);
    $data = $data[2] . ' de ' . $mes_ano[number_format($data[1])] . ' de ' . $data[0];
    return $data;
}

/**
 * Converte o link de compartilhamento do youtube para link da thumb
 *
 * @param  string $string
 * @return string
 */
function thumb_youtube($string)
{
    $id_youtube = explode('/youtu.be/', $string);
    return 'http://img.youtube.com/vi/' . $id_youtube[1] . '/maxresdefault.jpg';
}

/**
 * Converte o link de compartilhamento do youtube para link do vídeo
 *
 * @param  string $string
 * @return string
 */
function link_youtube($string)
{
    $id_youtube = explode('/youtu.be/', $string);
    return "https://www.youtube.com/embed/" . $id_youtube[1];
}

/**
 * Cria href com base no contéudo de $link
 *
 * @param  string $link
 * @return string
 */
function link_externo($link)
{
    if (!empty($link)) {
        return 'href="' . $link . '"';
    } else {
        return '';
    }
}

/**
 * Formata valor de moeda para o banco de dados
 *
 * @param  string $valor
 * @return float
 */
function desfazMaskMoney($valor)
{
    return str_replace(",", ".", str_replace(".", "", $valor));
}

/**
 * Formata valor float para moeda 
 *
 * @param  float $valor
 * @return string
 */
function moeda($valor)
{
    if (!empty($valor)) {
        $valor = str_replace(",", "", $valor);
        $valor = number_format($valor, 2, ',', '.');
    }
    return $valor;
}

/**
 * Função para exibir conteúdo de array
 *
 * @param  array $array
 * @param  bool $die
 * @return void
 */
function debug_array($array, $die = FALSE)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';

    if ($die) {
        exit();
    }
}

/**
 * Retorna um id aleatório
 *
 * @param  int $largura
 * @return string
 */
function gerar_id($largura)
{
    $caracteres = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o');
    $ID = '';
    for ($i = 0; $i < $largura; $i++) {
        $ID .= $caracteres[floor(rand() % count($caracteres))];
    }
    return $ID;
}

/**
 * Verifica se o email é valido
 *
 * @param  string $mail
 * @return string
 */
function validaEmail($mail)
{
    if (preg_match("/^([[:alnum:]_.-]){3,}@([[:lower:][:digit:]_.-]{3,})(.[[:lower:]]{2,3})(.[[:lower:]]{2})?$/", $mail)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Verifica se o formulário está preenchido
 *
 * @param  mixed $Form
 * @return bool
 */
function valida_form($Form)
{

    $chaves = array_keys($Form);

    foreach ($chaves as $c) {

        if (!empty($Form[$c])) {
            return true;
        }
    }

    return false;
}

/**
 * Faz o processo de encriptar a senha
 *
 * @param  string $salt
 * @param  string $senha
 * @return string
 */
function encriptar($salt, $senha)
{

    $hash = md5($salt) . $senha;

    for ($h = 0; $h < 1000; $h++) {

        $hash = hash("sha256", $hash);
    }

    return $hash;
}

/**
 * Organiza os indices do array $_FILES para o formato correto
 *
 * @param  array $arr
 * @return array
 */
function reorganizar($arr)
{

    foreach ($arr as $key => $all) {
        foreach ($all as $i => $val) {
            $new[$i][$key] = $val;
        }
    }

    return $new;
}

/**
 * Função para carregamento de arquivos no servidor
 *
 * @param  string $arquivo
 * @param  string $pasta
 * @param  array $tipos
 * @param  bool $renomear
 * @return string
 */
function carregar_arquivo($arquivo, $pasta, $tipos = array('png', 'jpg', 'jpeg', 'gif'), $renomear = TRUE)
{
    $ci = &get_instance();

    $config_upload['upload_path'] = $pasta;
    $config_upload['allowed_types'] = !empty($tipos) ? $tipos : '*';

    if ($renomear) {

        $config_upload['file_name'] = date('Ymd') . '_' . gerar_id(8);
    }

    $ci->load->library('upload', $config_upload);

    $ci->upload->initialize($config_upload);

    if (!$ci->upload->do_upload($arquivo)) {

        echo json_encode(array(
            'titulo' => 'Falha!',
            'mensagem' => strip_tags($ci->upload->display_errors()),
            'tipo' => 'error'
        ));

        exit();
    } else {

        return $pasta . '/' . $ci->upload->data('file_name');
    }
}

/**
 * Elimina arquivo do servidor
 *
 * @param  string $arquivo
 * @return void
 */
function deletar_arquivo($arquivo)
{
    if (!empty($arquivo)) {

        if (file_exists($arquivo)) {

            unlink($arquivo);
        }
    }
}

/**
 * Verifica quais itens do array devem ser marcados como checked
 *
 * @param  array $ativos Array de dados ativos
 * @param  string $key Chave do array de ativos a ser usada na comparação
 * @param  int $value valor a ser comparado com ativos 
 * @return string
 */
function is_cheked($ativos, $key, $value)
{
    foreach ($ativos as $a) {

        if ($a[$key] == $value) {

            return 'checked';
        }
    }
}

/**
 * Verifica quais itens do array devem ser marcados como selected
 *
 * @param  array $ativos Array de dados ativos
 * @param  string $key Chave do array de ativos a ser usada na comparação
 * @param  int $value valor a ser comparado com ativos 
 * @return string
 */
function is_selected($ativos, $key, $value)
{
    foreach ($ativos as $a) {

        if ($a[$key] == $value) {

            return 'selected';
        }
    }
}

/**
 * Cria options para selects e adiciona selected caso informado
 *
 * @param  array $list
 * @param  string $coluna coluna que sera
 * @param  int $ativo
 * @return void
 */
function options($list, $coluna, $ativo = 0)
{
    echo '<option value="">Selecione:</option>';

    foreach ($list as  $l) {

        echo '<option value="' . $l['id'] . '" ' . ($ativo == $l['id'] ? "selected" : "") . '>' . $l[$coluna] . '</option>';
    }
}
