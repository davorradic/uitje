<?php
//echo password_hash("tech", PASSWORD_DEFAULT);
//exit;

include_once('dbconfig.php');
include_once('template/header.php');
if(isset($_GET['page']) && !empty($_GET['page'])){
    $pages = ['signup', 'login', 'home'];
    if(in_array($_GET['page'], $pages)){
        include_once($_GET['page'].'.php');
    } else {
        include_once('404.php');
    } 
} else {
    include_once('home.php');
}
include_once('template/footer.php');
?>