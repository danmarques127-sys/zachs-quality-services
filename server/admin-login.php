<?php
require_once __DIR__.'/config.php';
admin_session();
header('Cache-Control: no-store');
header('X-Robots-Tag: noindex, nofollow');
$error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
 csrf_check();
 $name=getenv('ZACHS_ADMIN_USERNAME')?:'';
 $hash=getenv('ZACHS_ADMIN_PASSWORD_HASH')?:'';
 if($name!==''&&$hash!==''&&hash_equals($name,(string)($_POST['username']??''))&&password_verify((string)($_POST['password']??''),$hash)){
  session_regenerate_id(true);$_SESSION['zachs_admin']=true;header('Location: /server/tips-manager.php',true,303);exit;
 }
 $error='Invalid login details.';
}
?><!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><meta name="robots" content="noindex,nofollow"><title>Admin Sign In | Zach's Quality Services</title><style>body{font:16px system-ui;background:#0b163f;color:white;min-height:100vh;display:grid;place-items:center}main{background:#fff;color:#12213d;padding:2rem;border-radius:12px;max-width:420px;width:90%}label,input,button{display:block;width:100%;box-sizing:border-box;margin:.7rem 0}input,button{padding:.8rem}button{background:#0b163f;color:white;border:0;border-radius:6px;cursor:pointer}</style></head><body><main><h1>Administrator sign in</h1><?php if($error):?><p role="alert"><?=html($error)?></p><?php endif;?><form method="post"><input type="hidden" name="csrf_token" value="<?=html(csrf_token())?>"><label>Username<input name="username" autocomplete="username" required></label><label>Password<input name="password" type="password" autocomplete="current-password" required></label><button>Sign in</button></form></main></body></html>