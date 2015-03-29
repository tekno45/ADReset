<?php
require_once('../../resources/core/init.php');

if (isset($_POST['changePassword'])) {
    $changePassword = new changePassword();
}
elseif (isset($_POST['changeProfile'])) {
	$userInfo = new UserInfo();
    $userInfo->setProfile($_SESSION['user_name']);
}

$login = new Login();
if ($login->isUserLoggedIn() == true) {
    if (!isset($userInfo)) {
		$userInfo = new UserInfo();
    }
    
    require_once(RESOURCE_DIR . "views/local_admin/usersettings.php");

} else {
    header('Location: /admin.php');
    exit();
}