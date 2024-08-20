<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <!-- Add the Bulma CSS here -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css"
    >

    <script>
        function validateForm() {
            // Get form elements
            var name = document.querySelector('input[name="complete_name"]');
            var email = document.querySelector('input[name="email"]');
            var button = document.querySelector('button[type="submit"]');
            
            // Function to check if email is valid
            function isValidEmail(email) {
                return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
            }

            // Enable or disable the button based on the inputs
            if (name.value.trim() === "" || !isValidEmail(email.value)) {
                button.disabled = true;
            } else {
                button.disabled = false;
            }
        }

        // Add event listeners for real-time validation
        window.onload = function() {
            var nameInput = document.querySelector('input[name="complete_name"]');
            var emailInput = document.querySelector('input[name="email"]');

            nameInput.addEventListener('input', validateForm);
            emailInput.addEventListener('input', validateForm);
        }
    </script>
</head>
<body>
<section class="section">
    <h1 class="title">User Registration</h1>
    <h2 class="subtitle">
        This is the IPT10 PHP Quiz Web Application Laboratory Activity. Please register
    </h2>
    <!-- Supply the correct HTTP method and target form handler resource -->
    <form method="POST" action="instructions.php">
        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input" type="text" name="complete_name" placeholder="Complete Name">
            </div>
        </div>

        <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input class="input" name="email" type="email" />
            </div>
        </div>

        <div class="field">
            <label class="label">Birthdate</label>
            <div class="control">
                <input class="input" name="birthdate" type="date" />
            </div>
        </div>

        <div class="field">
            <label class="label">Contact Number</label>
            <div class="control">
                <input class="input" name="contact_number" type="number" />
            </div>
        </div>

        <!-- Next button -->
        <button type="submit" class="button is-link" disabled>Proceed Next</button>
    </form>
</section>

</body>
</html>