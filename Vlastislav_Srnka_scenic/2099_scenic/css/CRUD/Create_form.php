<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Add New User</h1>
        <form action="create.php" method="POST" class="mt-3">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>

            <div class="form-group mt-2">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>

            <div class="form-group mt-2">
                <label for="message">Message</label>
                <textarea name="message" class="form-control" id="message" required></textarea>
            </div>

            <button type="submit" class="btn btn-success mt-3" name="submit">Submit</button>
            <a href="admin.php" class="btn btn-secondary mt-3">Cancel</a>
        </form>
    </div>
</body>
</html>
