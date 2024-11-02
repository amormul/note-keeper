<?php include_once(__DIR__ . '/../templates/header.php'); ?>
<div class="w3-container w3-teal">
    <h1>NoteKeeper</h1>
</div>

<div class="w3-container w3-padding-32">
    <div class="w3-card-4 w3-margin w3-white" style="max-width:500px;margin:auto !important;">
        <div class="w3-container w3-teal">
            <h2>Login</h2>
        </div>
        <?php if (isset($_GET['error']) && $_GET['error'] === 'invalid_credentials'): ?>
            <div class="w3-panel w3-pale-red w3-leftbar w3-border-red">
                <p>Invalid username or password. Please try again.</p>
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['success']) && $_GET['success'] === 'registered'): ?>
            <div class="w3-panel w3-pale-green w3-leftbar w3-border-green">
                <p>Registration successful! Please login with your credentials.</p>
            </div>
        <?php endif; ?>
        <form class="w3-container w3-padding-16" action="auth.php" method="post">
            <label class="w3-text-grey">Username</label>
            <input class="w3-input w3-border" type="text" name="username" required>

            <label class="w3-text-grey">Password</label>
            <input class="w3-input w3-border" type="password" name="password" required>

            <button class="w3-btn w3-teal w3-margin-top" type="submit">Login</button>
        </form>
        <div class="w3-container w3-padding-16">
            <p>Don't have an account? <a href="register.php" class="w3-text-teal">Register here</a></p>
        </div>
    </div>
</div>
<?php include_once(__DIR__ . '/../templates/footer.php'); ?>