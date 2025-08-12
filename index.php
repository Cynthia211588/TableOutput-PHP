<?php
// Path to your CSV file
$path = __DIR__ . '/Table_Input.csv';

if (!file_exists($path)) {
    die("File not found: Table_Input.csv");
}

// Read CSV and parse rows
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

// Map index => value for calculations
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

?>

<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Table Output</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
</head>
<body class="p-4">

<div class="container">
    <h1 class="mb-4">Table 1</h1>
    <table class="table table-bordered table-sm">
        <thead class="thead-dark">
            <tr>
                <th>Index</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['index']) ?></td>
                    <td><?= htmlspecialchars($row['value']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2 class="mt-5">Table 2</h2>
    <table class="table table-bordered table-sm">
        <thead class="thead-light">
            <tr>
                <th>Category</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Alpha</td>
                <td><?= htmlspecialchars($alpha) ?></td>
            </tr>
            <tr>
                <td>Beta</td>
                <td><?= htmlspecialchars($beta) ?></td>
            </tr>
            <tr>
                <td>Charlie</td>
                <td><?= htmlspecialchars($charlie) ?></td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>
