<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Preferance System with Session Management</title>
</head>
<body>

<?php
// For testing: https://testsn-22280.siv-ams.servebolt.cloud/test.php?name=Daniel

// Start the session
session_start();

// Get the user's name from the URL parameter or set to default guest
$name = $_GET['name'] ?? 'Guest';

// Check if the user has submitted the preference form
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['greeting_preference'])) {
    // Set the user's preference in the session
    $_SESSION['greeting_preference'] = $_POST['greeting_preference'];
}

// Check if the user wants to reset their preference
if (isset($_GET['reset_preference'])) {
    unset($_SESSION['greeting_preference']);
}

// Get the current time
$currentHour = date('G');

// Define the greeting based on the time of day
if ($currentHour >= 5 && $currentHour < 12) {
    $timeOfDayGreeting = "Good Morning";
} elseif ($currentHour >= 12 && $currentHour < 17) {
    $timeOfDayGreeting = "Good Afternoon";
} else {
    $timeOfDayGreeting = "Good Evening";
}

// Check if the user has a stored preference, otherwise use default
$greetingStyle = isset($_SESSION['greeting_preference']) ? $_SESSION['greeting_preference'] : 'default';

// Output the user greeting system with HTML
if ($greetingStyle === 'formal') {
    echo "<h1>{$timeOfDayGreeting}, Mr./Ms. {$name}!</h1>";
} elseif ($greetingStyle === 'casual') {
    echo "<h1>Hey {$name}, what's up?</h1>";
} else {
    echo "<h1>{$timeOfDayGreeting}, {$name}!</h1>";
}
?>

<!-- Preference Form -->
<form method="post">
    <label>
	<input type="radio" name="greeting_preference" value="formal" <?php echo ($greetingStyle === 'formal') ? 'checked' : ''; ?>>
        Formal
    </label>
    <label>
	<input type="radio" name="greeting_preference" value="casual" <?php echo ($greetingStyle === 'casual') ? 'checked' : ''; ?>>
        Casual
    </label>
    <button type="submit">Set Preference</button>
</form>

<!-- Preference Reset Link -->
<p><a href="?reset_preference=1">Reset Preference</a></p>

</body>
</html>
