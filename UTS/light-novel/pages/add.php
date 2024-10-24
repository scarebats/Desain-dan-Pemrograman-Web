<?php
session_start();
include '../includes/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); 
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $genre_id = $_POST['genre'];
    $synopsis = $_POST['synopsis'];
    $fileNovel = $_FILES['file']['name'] ?? null;

    if ($fileNovel && pathinfo($fileNovel, PATHINFO_EXTENSION) !== 'pdf') {
        echo "Tolong kirim file dengan tipe PDF.";
    } else {
      
        if ($fileNovel) {
            move_uploaded_file($_FILES['file']['tmp_name'], "../uploads/$fileNovel");
        }

        $query = "INSERT INTO LightNovels (title, genre_id, synopsis, file_path) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([$title, $genre_id, $synopsis, $fileNovel]);

        header("Location: ../index.php");
        exit();
    }
}

$query = "SELECT * FROM Genres"; 
$stmt = $conn->prepare($query);
$stmt->execute();
$genres = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style_add_edit.css">
    <title>Add Light Novel</title>
</head>
<body>
    <div class="container">
        <h1>ADD LIGHT NOVEL</h1>
        <form method="post" action="" enctype="multipart/form-data">
            Title: <input type="text" name="title" required><br>
            Genre: 
            <select name="genre" required>
                <?php foreach ($genres as $genre): ?>
                    <option value="<?php echo $genre['id']; ?>"><?php echo htmlspecialchars($genre['genre_name']); ?></option>
                <?php endforeach; ?>
            </select><br>
            File (PDF): <input type="file" name="file" accept=".pdf" required><br>
            Synopsis: <textarea name="synopsis" required></textarea><br>
            <button type="submit">Tambahkan Novel</button>
        </form>
        <a href="../index.php">Kembali</a>
    </div>
</body>
</html>
