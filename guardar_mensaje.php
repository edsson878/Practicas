<?php

require_once 'Database.php';

try {
    $db = new Database();
    $conexion = $db->conectar();

    echo 'Exito';

    guardar_mensaje($conexion);
    
}catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

function guardar_mensaje($conexion){
    $contenido = $_POST['texto']??'';
    if($contenido!==''){
        $sql  = "INSERT_INTO mensajes (contenido) VALUES (:contenido)";
        $stmt =  $conexion -> prepare($sql);
        $stmt -> execute([
            ':texto' => $contenido
        ]);

        $id = $conexion -> lastInsertId();

        $resultado = [
            'id' => (int) $id,
            'nombre' => $contenido
        ];

        header('Content-Type: application/json; charset-utf-8');
        echo json_encode(
            $resultado,
            JSON_UNESCAPED_UNICODE
        );
    }
}