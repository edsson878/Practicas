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
            'nombre' => 'Juan'
        ],
        [
            'id' => 3,
            'nombre' => 'Carlos'
        ],
        [
            'id' => 4,
            'nombre' => 'Ana'
        ]
    ];

    echo json_encode(
        $resultados
    );