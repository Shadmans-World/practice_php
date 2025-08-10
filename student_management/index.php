<?php
// Database connection setup (PDO)
$host = 'localhost';
$dbname = 'student_management';
$user = 'root';
$pass = ''; // তোমার MySQL পাসওয়ার্ড বসাও এখানে

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Handle form submission
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $course = trim($_POST['course'] ?? '');
    $phone = trim($_POST['phone'] ?? '');

    // Simple validation
    if ($name && $email && $course && $phone) {
        $stmt = $pdo->prepare("INSERT INTO students (name, email, course, phone) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $course, $phone]);
        $message = "Student added successfully!";
    } else {
        $message = "Please fill all the fields.";
    }
}

// Fetch all students
$stmt = $pdo->query("SELECT * FROM students ORDER BY id DESC");
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Student Management System</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { margin-bottom: 30px; }
        label { display: block; margin-top: 10px; }
        input[type=text], input[type=email] { padding: 8px; width: 300px; }
        input[type=submit] { padding: 10px 20px; margin-top: 15px; }
        table { border-collapse: collapse; width: 100%; max-width: 700px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .message { margin-bottom: 20px; color: green; }
        .error { color: red; }
    </style>
</head>
<body>

<h1>Student Management System</h1>

<?php if ($message): ?>
    <p class="<?= strpos($message, 'successfully') !== false ? 'message' : 'error' ?>">
        <?= htmlspecialchars($message) ?>
    </p>
<?php endif; ?>

<!-- Add Student Form -->
<form method="post" action="">
    <label>Name:</label>
    <input type="text" name="name" required />

    <label>Email:</label>
    <input type="email" name="email" required />

    <label>Course:</label>
    <input type="text" name="course" required />

    <label>Phone:</label>
    <input type="text" name="phone" required />

    <input type="submit" value="Add Student" />
</form>

<!-- Students List -->
<h2>All Students</h2>
<?php if (count($students) > 0): ?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Phone</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $std): ?>
        <tr>
            <td><?= htmlspecialchars($std['id']) ?></td>
            <td><?= htmlspecialchars($std['name']) ?></td>
            <td><?= htmlspecialchars($std['email']) ?></td>
            <td><?= htmlspecialchars($std['course']) ?></td>
            <td><?= htmlspecialchars($std['phone']) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
<p>No students found.</p>
<?php endif; ?>

</body>
</html>
