<?php
session_start();
include '../includes/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); 
    exit();
}

$id = $_GET['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $id) {
    $title = $_POST['title'];
    $genre_id = $_POST['genre'];
    $synopsis = $_POST['synopsis'];
    $fileNovel = $_FILES['file']['name'] ?? null;

    if ($fileNovel) {
        if (pathinfo($fileNovel, PATHINFO_EXTENSION) !== 'pdf') {
            echo "Tolong kirim file dengan tipe PDF.";
        } else {
            move_uploaded_file($_FILES['file']['tmp_name'], "../uploads/$fileNovel");
            $query = "UPDATE LightNovels SET title = ?, genre_id = ?, synopsis = ?, file_path = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$title, $genre_id, $synopsis, $fileNovel, $id]);
        }
    } else {
        $query = "UPDATE LightNovels SET title = ?, genre_id = ?, synopsis = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$title, $genre_id, $synopsis, $id]);
    }

    header("Location: ../index.php");
    exit();
}

$query = "SELECT * FROM LightNovels WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$id]);
$novel = $stmt->fetch();

if (!$novel) {
    echo "Novel tidak ditemukan!";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style_add_edit.css">
    <title>Edit Light Novel</title>
</head>
<body>
    <div class="container">
        <h1>EDIT LIGHT NOVEL</h1>
        <form method="post" action="" enctype="multipart/form-data">
            Title: <input type="text" name="title" value="<?php echo htmlspecialchars($novel['title']); ?>" required><br>
            Genre: 
            <select name="genre" required>
                <option value="1" <?php echo $novel['genre_id'] == 1 ? 'selected' : ''; ?>>Fantasy</option>
                <option value="2" <?php echo $novel['genre_id'] == 2 ? 'selected' : ''; ?>>Romance</option>
                <option value="3" <?php echo $novel['genre_id'] == 3 ? 'selected' : ''; ?>>Adventure</option>
                <option value="4" <?php echo $novel['genre_id'] == 4 ? 'selected' : ''; ?>>Sci-Fi</option>
                <option value="5" <?php echo $novel['genre_id'] == 5 ? 'selected' : ''; ?>>School</option>
                <option value="6" <?php echo $novel['genre_id'] == 6 ? 'selected' : ''; ?>>Comedy</option>
            </select><br>
            File (PDF) : <input type="file" name="File" accept=".pdf"><br>
            Synopsis : <textarea name="synopsis" required><?php echo htmlspecialchars($novel['synopsis']); ?></textarea><br>
            <button type="submit">Update Novel</button>
        </form>
    </div>
</body>
</html>
