<?php include_once(__DIR__ . '/../templates/header.php'); ?>
<div class="w3-bar w3-teal">
    <div class="w3-bar-item">NoteKeeper</div>
    <div class="w3-bar-item w3-right">
        Welcome, <?php echo htmlspecialchars($_SESSION['username'] ?? ''); ?>
        <a href="logout.php" class="w3-button w3-red w3-margin-left">Logout</a>
    </div>
</div>

<div class="w3-container w3-padding-32">
    <!-- Note Form -->
    <div class="w3-card w3-margin w3-padding">
        <h2>Add New Note</h2>
        <form action="add_note.php" method="post">
            <div class="w3-row-padding">
                <div class="w3-col m12">
                    <textarea class="w3-input w3-border" name="note_text" rows="4" required></textarea>
                </div>
            </div>
            <button class="w3-button w3-teal w3-margin-top" type="submit">Add Note</button>
        </form>
    </div>

    <!-- Notes Table -->
    <div class="w3-card w3-margin">
        <table class="w3-table w3-striped">
            <thead>
            <tr class="w3-teal">
                <th>#</th>
                <th>Note</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($notes)): ?>
                <?php foreach ($notes as $index => $note): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo htmlspecialchars($note['text']); ?></td>
                        <td>
                            <form action="delete_note.php" method="post">
                                <input type="hidden" name="note_id" value="<?php echo $note['id']; ?>">
                                <button class="w3-button w3-red w3-small" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="w3-center">No notes found. Add your first note above!</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once(__DIR__ . '/../templates/footer.php'); ?>