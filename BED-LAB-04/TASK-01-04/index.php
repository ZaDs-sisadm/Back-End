<?php
require_once 'autoload.php';

$userModel = new Models\UserModel();
$userModel->showMessage();

$userView = new Views\UserView();
$userView->showMessage();

$userController = new Controllers\UserController();
$userController->showMessage();
?>
