<?php 
function get_vehicles_by_class($Class_code, $sort) {
global $db;
if ($sort == 'year'){
$orderby = 'V.vYear';
} else {
$orderby = 'V.price';
}
if ($Class_code == NULL || $Class_code == FALSE) {
$query = 'SELECT V.vYear, V.make, V.model, V.price, T.typeName, C.className 
FROM vehicles V  
LEFT JOIN classes C ON V.classID = C.classID 
LEFT JOIN types T ON V.typeID = T.typeID 
ORDER BY ' . $orderby . ' DESC';
} else {
$query = 'SELECT V.vYear, V.make, V.model, V.price, T.typeName, C.className 
FROM vehicles V 
LEFT JOIN classes C ON V.classID = C.classID 
LEFT JOIN types T ON V.typeID = T.typeID 
WHERE V.classID = :class_id 
ORDER BY ' . $orderby . ' DESC';
}
$statement = $db->prepare($query);
$statement->bindValue(':Class_code', $Class_code);
$statement->execute();
$vehicles = $statement->fetchAll();
$statement->closeCursor();
return $vehicles;
}
function get_vehicles_by_type($Type_code, $sort) {
global $db;
if ($sort == 'year'){
$orderby = 'V.vYear';
} else {
$orderby = 'V.price';
}
if ($Type_code == NULL || $Type_code == FALSE) {
$query = 'SELECT V.vYear, V.make, V.model, V.price, T.typeName, C.className 
FROM vehicles V 
LEFT JOIN classes C ON V.classID = C.classID 
LEFT JOIN types T ON V.typeID = T.typeID  
ORDER BY ' . $orderby . ' DESC';
} else {
$query = 'SELECT V.vYear, V.make, V.model, V.price, T.typeName, C.className 
FROM vehicles V 
LEFT JOIN classes C ON V.classID = C.classID 
LEFT JOIN types T ON V.typeID = T.typeID  
WHERE V.typeID = :Type_code 
ORDER BY ' . $orderby . ' DESC';
}
$statement = $db->prepare($query);
$statement->bindValue(':Type_code', $Type_code);
$statement->execute();
$vehicles = $statement->fetchAll();
$statement->closeCursor();
return $vehicles;
}
function get_vehicles_by_make($Make, $sort) {
global $db;
if ($sort == 'year'){
$orderby = 'V.vYear';
} else {
$orderby = 'V.price';
}
if ($Make == NULL || $Make == FALSE) {
$query = 'SELECT V.vYear, V.make, V.model, V.price, T.typeName, C.className 
FROM vehicles V 
LEFT JOIN classes C ON V.classID = C.classID 
LEFT JOIN types T ON V.typeID = T.typeID  
ORDER BY ' . $orderby . ' DESC';
} else {
$query = 'SELECT V.vYear, V.make, V.model, V.price, T.typeName, C.className 
FROM vehicles V 
LEFT JOIN classes C ON V.classID = C.classID 
LEFT JOIN types T ON V.typeID = T.typeID  
WHERE V.make = :Make 
ORDER BY ' . $orderby . ' DESC';
}
$statement = $db->prepare($query);
$statement->bindValue(':Make', $Make);
$statement->execute();
$vehicles = $statement->fetchAll();
$statement->closeCursor();
return $vehicles;
}
function get_all_vehicles($sort) {
global $db;
if ($sort == 'year'){
$orderby = 'V.vYear';
} else {
$orderby = 'V.price';
}
$query = 'SELECT V.vYear, V.make, V.model, V.price, T.typeName, C.className 
FROM vehicles V 
LEFT JOIN classes C ON V.classID = C.classID 
LEFT JOIN types T ON V.typeID = T.typeID  
ORDER BY ' . $orderby . ' DESC';
$statement = $db->prepare($query);
$statement->execute();
$vehicles = $statement->fetchAll();
$statement->closeCursor();
return $vehicles;
}
function get_vehicle($vehicle_id) {
global $db;
$query = 'SELECT * FROM vehicles WHERE vehicleID = :vehicle_id';
$statement = $db->prepare($query);
$statement->bindValue(':vehicle_id', $vehicle_id);
$statement->execute();
$vehicle = $statement->fetch();
$statement->closeCursor();
return $vehicle;
}
function delete_vehicle($vehicle_id) {
global $db;
$query = 'DELETE FROM vehicles WHERE vehicleID = :vehicle_id';
$statement = $db->prepare($query);
$statement->bindValue(':vehicle_id', $vehicle_id);
$statement->execute();
$statement->closeCursor();
}
function add_vehicle($Type_code, $Class_code, $year, $make, $model, $price) {
global $db;
$query = 'INSERT INTO vehicles (vYear, make, model, price, typeID, classID)
VALUES
(:vyear, :make, :model, :price, :Type_code, :Class_code)';
$statement = $db->prepare($query);
$statement->bindValue(':vyear', $year);
$statement->bindValue(':Make', $Make);
$statement->bindValue(':model', $model);
$statement->bindValue(':price', $price);
$statement->bindValue(':Type_code', $Type_code);
$statement->bindValue(':Class_code', $Class_code);
$statement->execute();
$statement->closeCursor();
}
?>