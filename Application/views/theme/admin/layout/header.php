<!DOCTYPE html>
<html>
<title><?=$data['title'] ?? "Painel Administrativo";?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?=url('/assets/css/w3.css')?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open('mySidebar');"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">Painel</span>
</div>

<!-- Sidebar/menu -->
<?php include __DIR__ . "..\sidebar-menu.php";?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

<?= flash() ?? '' ?>

