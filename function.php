<?php
// Path to CSV file
$path = __DIR__ . '/Table_Input.csv';

if (!file_exists($path)) {
    die("File not found: Table_Input.csv");
}

// Read CSV a
$rows = [];
if (($handle = fopen($path, 'r')) !== false) {
    // Skip header
    fgetcsv($handle);

    while (($data = fgetcsv($handle)) !== false) {
        $index = trim($data[0] ?? '');
        $value = isset($data[1]) ? (int)$data[1] : 0;
        $rows[] = ['index' => $index, 'value' => $value];
    }
    fclose($handle);
}

$map = [];
foreach ($rows as $row) {
    $map[$row['index']] = $row['value'];
}

// Calculate values
$alpha = ($map['A5'] ?? 0) + ($map['A20'] ?? 0);

$a7 = $map['A7'] ?? 0;
$a15 = $map['A15'] ?? 0;
$beta = ($a7 != 0) ? intdiv($a15, $a7) : 0;

$charlie = ($map['A13'] ?? 0) * ($map['A12'] ?? 0);

