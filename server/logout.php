<?php
require_once __DIR__.'/config.php';admin_session();$_SESSION=[];session_regenerate_id(true);session_destroy();header('Location: /server/admin-login.php',true,303);exit;
