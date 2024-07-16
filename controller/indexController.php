<?php
require_once("../config/config.php");

$DBconnection = new DBconnection();
$pdo = $DBconnection -> connect();

$stmt = $pdo->query("SELECT * FROM article");
// retourne dans un tableau tous les produits.
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

require_once("../templates/page/indexView.php");