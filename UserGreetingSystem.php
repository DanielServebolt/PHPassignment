<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Greeting System</title>
</head>
<body>

<?php
// For testing: https://testsn-22280.siv-ams.servebolt.cloud/test.php?name=Daniel

// Get the user's name from the URL parameter or set to default guest
$name = $_GET['name'] ?? 'Guest';

// Get the current time
$currentHour = date('G');

// Define the greeting based on the time of day
if ($currentHour >= 5 && $currentHour < 12) {
    $greeting = "Good Morning";
} elseif ($currentHour >= 12 && $currentHour < 17) {
    $greeting = "Good Afternoon";
} else {
    $greeting = "Good Evening";
}

// Output the user greeting system with HTML
echo "<h1>{$greeting}, {$name}!</h1>";
?>

</body>
</html>
