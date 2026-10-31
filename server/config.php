<?php
declare(strict_types=1);
ini_set('display_errors','0');
ini_set('log_errors','1');
function admin_session(): void {
 if(session_status()!==PHP_SESSION_ACTIVE){
  $https=(!empty($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!=='off');
  session_set_cookie_params(['httponly'=>true,'secure'=>$https,'samesite'=>'Lax','path'=>'/']);
  session_start();
 }
}
function admin_only(): void {
 admin_session();
 if(empty($_SESSION['zachs_admin'])) {header('Location: /server/admin-login.php',true,302);exit;}
}
function csrf_token(): string {admin_session();return $_SESSION['csrf_token']??=bin2hex(random_bytes(32));}
function csrf_check(): void {if(!hash_equals(csrf_token(),(string)($_POST['csrf_token']??''))){http_response_code(403);exit('Invalid form token.');}}
function html($value): string {return htmlspecialchars((string)$value,ENT_QUOTES|ENT_SUBSTITUTE,'UTF-8');}
function db(): mysqli {
 $host=getenv('ZACHS_DB_HOST')?:'localhost';$name=getenv('ZACHS_DB_NAME')?:'';
 $user=getenv('ZACHS_DB_USER')?:'';$pass=getenv('ZACHS_DB_PASSWORD');
 if(!$name||!$user||$pass===false){http_response_code(503);exit('Publishing database is not configured.');}
 try {$db=new mysqli($host,$user,$pass,$name);$db->set_charset('utf8mb4');return $db;}
 catch(Throwable $e){error_log('Zachs database connection failed: '.$e->getMessage());http_response_code(503);exit('Publishing database is temporarily unavailable.');}
}
$conn=db();
