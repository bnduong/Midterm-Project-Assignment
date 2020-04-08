<?php 
function get_makes() {
global $db;
$query = 'SELECT Make FROM vehicles GROUP BY Make';
$statement = $db->prepare($query);
$statement->execute();
$Makes = $statement->fetchAll();
$statement->closeCursor();
return $Makes;
}
?>