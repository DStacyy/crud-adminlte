<?php
session_start();
include 'conn.php';

function showMessage($type, $message){
    $_SESSION['message']=[
        'type' => $type,
        'message' => $message
    ];

}
function getMessage(){
    if (isset($_SESSION['message'])){
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
        return $message;
    }
    return null;
}

$server_name = $_SERVER['SERVER_NAME'];
$project_path = '/crud_adminlte';

$is_localhost = in_array($server_name, ['localhost','127.0.0.1']);
if($is_localhost){
    define('BASE_URL','http://'. $server_name . $project_path);
}else{
    define('BASE_URL','http://'. $server_name);
}

//path utk adminlte
define('ADMIN_LTE', BASE_URL . 'adminlte');
?>
