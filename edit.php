<?php
require_once 'config.php';

$id = $_GET['id'] ?? 0;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $platform = $_POST['platform'];
    $release_year = $_POST['release_year'];
    $rating = $_POST['rating'];
    
    $stmt = $conn->prepare("UPDATE games SET title=?, genre=?, platform=?, release_year=?, rating=? WHERE id=?");
    $stmt->execute([$title, $genre, $platform, $release_year, $rating, $id]);
    
    header('Location: index.php?message=updated');
    exit;
}

$stmt = $conn->prepare("SELECT * FROM games WHERE id = ?");
$stmt->execute([$id]);
$game = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$game) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Game</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Game</h1>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="title">Judul Game</label>
                <input type="text" id="title" name="title" required value="<?php echo htmlspecialchars($game['title']); ?>">
            </div>
            
            <div class="form-group">
                <label for="genre">Genre</label>
                <select id="genre" name="genre" required>
                    <option value="">Pilih Genre</option>
                    <option value="Action" <?php if($game['genre'] == 'Action') echo 'selected'; ?>>Action</option>
                    <option value="Adventure" <?php if($game['genre'] == 'Adventure') echo 'selected'; ?>>Adventure</option>
                    <option value="RPG" <?php if($game['genre'] == 'RPG') echo 'selected'; ?>>RPG</option>
                    <option value="Strategy" <?php if($game['genre'] == 'Strategy') echo 'selected'; ?>>Strategy</option>
                    <option value="Sports" <?php if($game['genre'] == 'Sports') echo 'selected'; ?>>Sports</option>
                    <option value="Racing" <?php if($game['genre'] == 'Racing') echo 'selected'; ?>>Racing</option>
                    <option value="Simulation" <?php if($game['genre'] == 'Simulation') echo 'selected'; ?>>Simulation</option>
                    <option value="Puzzle" <?php if($game['genre'] == 'Puzzle') echo 'selected'; ?>>Puzzle</option>
                    <option value="Horror" <?php if($game['genre'] == 'Horror') echo 'selected'; ?>>Horror</option>
                    <option value="Fighting" <?php if($game['genre'] == 'Fighting') echo 'selected'; ?>>Fighting</option>
                    <option value="Sandbox" <?php if($game['genre'] == 'Sandbox') echo 'selected'; ?>>Sandbox</option>
                    <option value="Action-Adventure" <?php if($game['genre'] == 'Action-Adventure') echo 'selected'; ?>>Action-Adventure</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="platform">Platform</label>
                <input type="text" id="platform" name="platform" required value="<?php echo htmlspecialchars($game['platform']); ?>">
            </div>
            
            <div class="form-group">
                <label for="release_year">Tahun Rilis</label>
                <input type="number" id="release_year" name="release_year" required min="1970" max="2030" value="<?php echo $game['release_year']; ?>">
            </div>
            
            <div class="form-group">
                <label for="rating">Rating (0.0 - 10.0)</label>
                <input type="number" id="rating" name="rating" step="0.1" min="0" max="10" required value="<?php echo $game['rating']; ?>">
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Update Game</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
