<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['useragent'] = 'CodeIgniter'; // Agente de Usuário

$config['protocol'] = env('SMTP_PROT'); // Protocolo de e-mail

$config['mailpath'] = '/usr/sbin/sendmail'; // Pasta de envio do servidor

$config['smtp_host'] = env('SMTP_HOST'); // Configuração do host

$config['smtp_user'] = env('SMTP_USER'); // Configuração do usuário

$config['smtp_pass'] = env('SMTP_PASS');

$config['smtp_port'] = env('SMTP_PORT');

$config['smtp_timeout'] = '5'; // Tempo em segundos

$config['smtp_keepalive'] = FALSE; // Habilita conexões persistentes

$config['smtp_crypto'] = env('SMTP_CRYP'); // Criptografia de conexão

$config['wordwrap'] = TRUE; // Quebra de palavras;

$config['wrapchars'] = 76; // Número de caracters para quebra

$config['mailtype'] = 'html'; //Tipo de dados para envio

$config['charset'] = 'utf-8'; // Codificação dos caracteres do e-mail

$config['validate'] = TRUE; // Validação de endereços

$config['priority'] = 3; // Escolha a prioridade do e-mail 1 a 5

$config['crlf'] = '\n'; // Caracter para quebra de linha
 
$config['newline'] = '\n'; //Caracter de nova linha

$config['bcc_batch_mode'] = FALSE; // Ativa o modo BCC Batch

$config['bcc_batch_size'] = 200; // Número de email para BCC Batch

$config['dsn'] = FALSE; // Habilita notificações para o servidor