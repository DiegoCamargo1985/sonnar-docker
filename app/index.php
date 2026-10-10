<?php
echo "<h1>Servidor Docker funcionando</h1>";

// Probar conexión a PostgreSQL
try {
    $pdo = new PDO("pgsql:host=postgres;dbname=mi_base", "admin", "contraseña_segura_123");
    echo "<p>PostgreSQL: Conexion exitosa</p>";
} catch (PDOException $e) {
    echo "<p>PostgreSQL: " . $e->getMessage() . "</p>";
}

// Probar conexión a Redis
if (class_exists('Redis')) {
    try {
        $redis = new Redis();
        $redis->connect('redis', 6379);
        $redis->set('prueba', 'Hola desde Redis');
        echo "<p>Redis: Conexion exitosa - Valor: " . $redis->get('prueba') . "</p>";
    } catch (Exception $e) {
        echo "<p>Redis: " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p>Redis: La extension PHP de Redis no esta instalada en el contenedor</p>";
}

// Mostrar info de PHP
phpinfo();
?>
