<?php
require_once 'config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $platform = $_POST['platform'];
    $release_year = $_POST['release_year'];
    $rating = $_POST['rating'];
    
    $stmt = $conn->prepare("INSERT INTO games (title, genre, platform, release_year, rating) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$title, $genre, $platform, $release_year, $rating]);
    
    header('Location: index.php?message=added');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Game</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>🎮 Tambah Game Baru</h1>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="title">Judul Game</label>
                <input type="text" id="title" name="title" required placeholder="Masukkan judul game">
            </div>
            
            <div class="form-group">
                <label for="genre">Genre</label>
                <select id="genre" name="genre" required>
                    <option value="">Pilih Genre</option>
                    <option value="Action">Action</option>
                    <option value="Adventure">Adventure</option>
                    <option value="RPG">RPG</option>
                    <option value="Strategy">Strategy</option>
                    <option value="Sports">Sports</option>
                    <option value="Racing">Racing</option>
                    <option value="Simulation">Simulation</option>
                    <option value="Puzzle">Puzzle</option>
                    <option value="Horror">Horror</option>
                    <option value="Fighting">Fighting</option>
                    <option value="Sandbox">Sandbox</option>
                    <option value="Action-Adventure">Action-Adventure</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="platform">Platform</label>
                <input type="text" id="platform" name="platform" required placeholder="Contoh: PC, PS5, Xbox">
            </div>
            
            <div class="form-group">
                <label for="release_year">Tahun Rilis</label>
                <input type="number" id="release_year" name="release_year" required min="1970" max="2030" placeholder="2024">
            </div>
            
            <div class="form-group">
                <label for="rating">Rating (0.0 - 10.0)</label>
                <input type="number" id="rating" name="rating" step="0.1" min="0" max="10" required placeholder="9.5">
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Simpan Game</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>