<?php
require_once 'config.php';

$stmt = $conn->query("SELECT * FROM games ORDER BY created_at DESC");
$games = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Collection</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Game Collection</h1>
        
        <div class="header-actions">
            <h2>Daftar Game</h2>
            <a href="tambah.php" class="btn btn-primary">+ Tambah Game Baru</a>
        </div>

        <?php if(isset($_GET['message'])): ?>
            <div class="alert alert-success">
                <?php 
                    if($_GET['message'] == 'added') echo 'Game berhasil ditambahkan!';
                    if($_GET['message'] == 'updated') echo 'Game berhasil diupdate!';
                    if($_GET['message'] == 'deleted') echo 'Game berhasil dihapus!';
                ?>
            </div>
        <?php endif; ?>

        <?php if(count($games) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Game</th>
                        <th>Genre</th>
                        <th>Platform</th>
                        <th>Tahun Rilis</th>
                        <th>Rating</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($games as $game): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo htmlspecialchars($game['title']); ?></td>
                        <td><?php echo htmlspecialchars($game['genre']); ?></td>
                        <td><?php echo htmlspecialchars($game['platform']); ?></td>
                        <td><?php echo $game['release_year']; ?></td>
                        <td><span class="rating">⭐ <?php echo $game['rating']; ?></span></td>
                        <td>
                            <div class="actions">
                                <a href="edit.php?id=<?php echo $game['id']; ?>" class="btn btn-warning">Edit</a>
                                <a href="hapus.php?id=<?php echo $game['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus game ini?')">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="empty-state">
                <p>Belum ada game dalam koleksi</p>
                <a href="tambah.php" class="btn btn-primary">Tambah Game Pertama</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>