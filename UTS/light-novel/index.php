<?php
session_start();
include 'includes/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: pages/login.php"); 
    exit();
}

$query = "SELECT LN.id, LN.title, LN.synopsis, LN.file_path, G.genre_name 
          FROM LightNovels LN 
          LEFT JOIN Genres G ON LN.genre_id = G.id";
$stmt = $conn->prepare($query);
$stmt->execute();
$novels = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style_index.css">
    <title>Light Novel List</title>
</head>
<body>
    <div class="container">
        <h1>LIGHT NOVEL</h1>
        <a href="pages/add.php">Add Novel</a> | 
        <a href="pages/logout.php">Logout</a>
        
        <ul>
            <?php foreach ($novels as $novel): ?>
                <li>
                    <a class="edit" href="pages/edit.php?id=<?php echo $novel['id']; ?>">Edit</a> |
                    <a class="delete" href="pages/delete.php?id=<?php echo $novel['id']; ?>" 
                    onclick="return confirm('Kamu yakin ingin menghapus novel ini?');">Delete</a> |
                    <a class="download" href="pages/download.php?file=<?php echo urlencode($novel['file_path']); ?>">Download PDF</a>
                    <br>
                    <span class="title"><?php echo htmlspecialchars($novel['title']); ?></span> (Genre: <?php echo htmlspecialchars($novel['genre_name']); ?>)
                    <br>
                    <span class="synopsis">Synopsis: <?php echo htmlspecialchars($novel['synopsis']); ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
