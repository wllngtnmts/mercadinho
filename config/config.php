<?php
#caminho absoluto
$pastaInterna="mercadinho/";
define('SSL', false);
$s=(SSL==true)?'s':'';
define('DIRPAGE',"http{$s}://{$_SERVER['HTTP_HOST']}/{$pastaInterna}");
if(substr($_SERVER['DOCUMENT_ROOT'],-1)=='/'){$barra="";}else{$barra="/";}
define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}{$barra}{$pastaInterna}");
define("DIRPAGEADMIN","http{$s}://{$_SERVER['HTTP_HOST']}/{$pastaInterna}admin/");
define('DIRREQADMIN',"{$_SERVER['DOCUMENT_ROOT']}{$barra}{$pastaInterna}views/admin/");

define('DIRIMG',DIRPAGE.'img/');
define('DIRCSS',DIRPAGE.'lib/css/');
define('DIRJS',DIRPAGE.'lib/js/');

#ServiçoBancoDeDadosWEb
define('HOST','localhost');
define('DB','sistemasesoftware');
define('USER','sistemasesoftwa');
define('PASS','vl.15x@9sJ-s%sTv.Da');

#Informações do servidor de e-mail
define("HOSTMAIL",'smtp.sistemasesoftware.com.br');
define("USERMAIL",'suporte=sistemasesoftware.com.br');
define("PASSMAIL",'vl.15x@9sJ-s%sTv.Da');

define('SITEKEY', '6Lc1FNkUAAAAAIyDjH4wQYiVD1fSJx3mQVoSS5ZZ');
define('SECRETKEY', '6Lc1FNkUAAAAAKg0utnXUIzD13eMuijs654Gl2OC');

define("DOMAIN",$_SERVER["HTTP_HOST"]);

