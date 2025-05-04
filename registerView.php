<?php
class RegisterView {
    public function registerForm() {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>User Registration</title>
        </head>
        <body>
            <h1>User Registration</h1>
            <form action="index.php?route=registerController" method="POST">
                <div>
                    <label for="firstname">First Name:</label>
                    <input type="text" id="firstname" name="firstname" required>
                </div>

                <div>
                    <label for="lastname">Last Name:</label>
                    <input type="text" id="lastname" name="lastname" required>
                </div>

                <div>
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" required>
                </div>

                <div>
                    <label for="date_of_birth">Date of Birth:</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" required>
                </div>

                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div>
                    <label for="phone_number">Phone Number:</label>
                    <input type="tel" id="phone_number" name="phone_number" required>
                </div>

                <button type="submit">Register</button>
            </form>
        </body>
        </html>
        <?php
    }
}
?>