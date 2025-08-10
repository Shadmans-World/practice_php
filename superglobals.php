<?php

// GET
if (isset($_GET['name'])) {
    echo "Hello, " . htmlspecialchars($_GET['name']);
}

echo "You are " . (int)$_GET['age'] . " years old.";


// POST
// form method="post" action="submit.php"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    echo "Welcome, " . htmlspecialchars($username);
}
// SESSION
session_start();            
$_SESSION['username'] = 'Shadman';
echo "Session username is: " . $_SESSION['username'];

    // Session Destroyed
    session_start();
    session_unset();
    session_destroy();

// COOKIE
if (isset($_COOKIE['user'])) {
    echo "Welcome back, " . htmlspecialchars($_COOKIE['user']);
}

// Setting a cookie:
setcookie('user', 'Shadman', time() + 3600); // expires in 1 hour


// FILE UPLOAD

// ফাইল আপলোড চেক করা
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // $_FILES থেকে ডাটা নেওয়া
    $fileName = $_FILES['myfile']['name'];         // ফাইলের নাম
    $fileTmpName = $_FILES['myfile']['tmp_name'];  // টেম্প লোকেশন
    $fileSize = $_FILES['myfile']['size'];         // ফাইলের সাইজ
    $fileError = $_FILES['myfile']['error'];       // কোনো এরর হলে কোড

    // এরর চেক
    if ($fileError === 0) {
        // ফাইল সেভ করার লোকেশন
        $destination = "uploads/" . $fileName;

        // ফাইল মুভ করা
        if (move_uploaded_file($fileTmpName, $destination)) {
            echo "✅ ফাইল সফলভাবে আপলোড হয়েছে: " . $fileName;
        } else {
            echo "❌ ফাইল মুভ করতে সমস্যা হয়েছে!";
        }
    } else {
        echo "❌ ফাইল আপলোডে সমস্যা হয়েছে! এরর কোড: $fileError";
    }
}


// HTML Form
// <form action="" method="POST" enctype="multipart/form-data">
//     <label>ফাইল সিলেক্ট করুন:</label>
//     <input type="file" name="myfile" required>
//     <button type="submit">Upload</button>
// </form>


?>