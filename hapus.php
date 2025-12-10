<?php
require_once 'config.php';

$id = $_GET['id'] ?? 0;

$stmt = $conn->prepare("DELETE FROM games WHERE id = ?");
$stmt->execute([$id]);

header('Location: index.php?message=deleted');
exit;
?>
