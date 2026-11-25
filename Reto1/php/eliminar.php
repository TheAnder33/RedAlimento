<?php
    require_once 'api.php';

    $id = $_GET['id'] ?? null;

    if (!$id) {
        header('Location: ../frontend/alimentos.php');
        exit;
    }

    $resultado = llamarApi('DELETE', API_URL . '/' . $id);
    
    header('Location: ../frontend/alimentos.php');
    exit;
?>