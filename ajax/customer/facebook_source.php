<?php
include 'Facebook/autoload.php';
include('fbconfig.php');
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://phunghuulong.com/webfamily/ajax/customer/fb-callback.php',$permissions);
// Thử hai trường hợp các đường link trong loginUrl
?>

