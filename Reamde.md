# User Login System with PHP, PDO, and AJAX

This project demonstrates a simple user login system implemented using PHP for server-side processing, PDO for secure database interactions, and AJAX for asynchronous requests to enhance the user experience.

## Technologies Used:

- **PHP with PDO:**

  - Used for server-side scripting and secure database interactions.
  - PDO provides a flexible and secure way to interact with databases.
  - Prepared statements and parameterized queries are employed to prevent SQL injection.

- **AJAX (Asynchronous JavaScript and XML):**
  - Used to perform asynchronous requests to the server without reloading the entire page.
  - Enhances user experience by providing a seamless login process.

## Project Structure:

- **index.php:**

  - The main HTML file containing the login form.
  - Includes jQuery for AJAX and a separate JavaScript file (`script.js`).

- **login.php:**

  - Handles the server-side login logic.
  - Utilizes PDO for secure database queries and password verification.
  - Responds to AJAX requests with JSON-encoded data.

- **script.js:**
  - Contains JavaScript functions, including the AJAX login function.
  - Sends data to `login.php` and updates the UI based on the server response.

## How to Use:

1. Ensure you have a database set up with a `users` table (columns: `user_id`, `username`, `password`).
2. Configure your database connection in the `config.php` file.
3. Open `index.php` in a web browser.

## Security Considerations:

- User inputs are validated and sanitized to prevent common vulnerabilities.
- Passwords are securely hashed using the `password_hash` function.
- Prepared statements and parameterized queries are used to prevent SQL injection.

## Notes:

- This is a basic example for educational purposes.
- For production, consider additional security measures and error handling.
- Always keep software libraries and dependencies up-to-date.
