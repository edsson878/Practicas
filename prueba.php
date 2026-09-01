<?php
    
    header('Content-Type: application/json; charset=utf-8');

    $buscar = $_GET['buscar'] ?? '';

    $resultados = [
        [
            'id' => 1,
            'nombre' => 'Maria'
        ],
        [
            'id' => 2,
            'nombre' => 'Ernestina'
        ]
    ];

    echo json_encode(
        $resultados
    );