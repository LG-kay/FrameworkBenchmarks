<?php
// Set content type
header('Content-type: application/json');

require __DIR__.'/boot-eloquent.php';

if (! isset($_GET['queries'])) {
    echo json_encode(World::find(mt_rand(1, 10000))->toArray());
    return;
}

// Read number of queries to run from URL parameter
$query_count = 1;
if ($_GET['queries'] > 1) {
    $query_count = $_GET['queries'] > 500 ? 500 : $_GET['queries'];
}
// Create an array with the response string.
$arr = [];
// For each query, store the result set values in the response array
while (0 < $query_count--) {
    // Store result in array.
    $arr[] = World::find(mt_rand(1, 10000))->toArray();
}

// Use the PHP standard JSON encoder.
// http://www.php.net/manual/en/function.json-encode.php
echo json_encode($arr);
