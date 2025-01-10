<?php
class LoginCon {
    public function login() {
        // Check if the user is already logged in
        if (isset($_SESSION['user'])) {
            header('Location: index.php?modul=home&fitur=list'); // Redirect to a home page or dashboard
            exit;
        }

        // Display login form (this could be a form view)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle login form submission
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            // Here, you can add logic to authenticate the user from the database
            if ($username === 'admin' && $password === 'password') {  // Example hardcoded check
                $_SESSION['user'] = $username;  // Set session data
                header('Location: index.php?modul=dashboard&fitur=list');  // Redirect to home or dashboard
                exit;
            } else {
                echo "Invalid credentials.";
            }
        } else {
            // Show the login form
            echo '<form method="POST" action="">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">Login</button>
                </form>';
        }
    }

    public function logout() {
        // Destroy the session to log out the user
        session_destroy();
        header('Location: index.php?modul=login&fitur=login'); // Redirect back to the login page
        exit;
    }
}
?>
