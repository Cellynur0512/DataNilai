<?php
$localhost = 'localhost';
$username = 'root';
$password = '';
$database = 'oop_html';

// Membuat koneksi ke database
$conn = new mysqli($localhost, $username, $password, $database);
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Fungsi untuk melakukan login
function login($username, $password) {
    global $conn;

    // Melindungi dari serangan SQL injection
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Mengecek apakah username dan password cocok
    $query = "SELECT * FROM gin WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Login berhasil
        return true;
    } else {
        // Login gagal
        return false;
    }
}

// Memproses form login jika sudah dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (login($username, $password)) {
        // Jika login berhasil, alihkan ke halaman lain atau tampilkan pesan sukses
        header("Location: index.php");
        exit();
    } else {
        // Jika login gagal, tampilkan pesan error
        echo "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit">Login</button>
        </form>
       
    </div>
</body>
<style>
    .container {
  width: 350px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f2f2f2;
  border-radius: 5px;
}

h2 {
  text-align: center;
  color: #6a1b9a;
}

form {
  margin-top: 20px;
}

.form-group {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
  color: #6a1b9a;
}

input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #6a1b9a;
  border-radius: 3px;
}

button[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #6a1b9a;
  border: none;
  border-radius: 3px;
  color: #fff;
  cursor: pointer;
}

p {
  margin-top: 10px;
  color: #f44336;
  text-align: center;
}

</style>
</html>