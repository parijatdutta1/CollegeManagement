<?php
// Assuming the database value is stored as a string
$databaseValue = '["ID177","ID277","ID377","ID477"]'; // Example string, could have 1 or more IDs
$cleanedString = trim($databaseValue, '[]');
$ids = explode(',', str_replace('"', '', $cleanedString));
foreach ($ids as $index => $id) {
    ${"id" . ($index + 1)} = $id; // Create variables like $id1, $id2, $id3
}
for ($i = 1; $i <= count($ids); $i++) {
    echo "ID{$i}: " . ${"id" . $i} . "\n";
}
?>
