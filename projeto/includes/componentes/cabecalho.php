<?php
session_start();
if(!$_SESSION['logado'])
{
	header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="scripts/javascript.js"></script>
    <link rel="stylesheet" href="css/navbar.css">
