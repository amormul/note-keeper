<?php include_once(__DIR__ . '/../templates/header.php'); ?>
<div class="w3-container w3-teal">
    <h1>NoteKeeper</h1>
</div>
<div class="w3-container w3-padding-32">
    <div class="w3-card-4 w3-margin w3-white" style="max-width:500px;margin:auto !important;">
        <div class="w3-container w3-teal">
            <h2>Register</h2>
        </div>
        <?php if (isset($_GET['error'])): ?>
            <div class="w3-panel w3-pale-red w3-leftbar w3-border-red">
                <?php if ($_GET['error'] === 'password_mismatch'): ?>
                    <p>Passwords do not match. Please try again.</p>
                <?php elseif ($_GET['error'] === 'username_exists'): ?>
                    <p>Username already exists. Please choose another.</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <form class="w3-container w3-padding-16" action="register.php" method="post">
            <label class="w3-text-grey">Username</label>
            <input class="w3-input w3-border" type="text" name="username" required>

            <label class="w3-text-grey">Password</label>
            <input class="w3-input w3-border" type="password" name="password" required>

            <label class="w3-text-grey">Confirm Password</label>
            <input class="w3-input w3-border" type="password" name="confirm_password" required>

            <button class="w3-btn w3-teal w3-margin-top" type="submit">Register</button>
        </form>
        <div class="w3-container w3-padding-16">
            <p>Already have an account? <a href="index.php" class="w3-text-teal">Login here</a></p>
        </div>
    </div>
</div>
<?php include_once(__DIR__ . '/../templates/footer.php'); ?>