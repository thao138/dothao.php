<?php
// Tạo dữ liệu sách (100 quyển)
$books = [];
for ($i = 1; $i <= 100; $i++) {
    $books[] = [
        'ten' => "Tensach$i",
        'noidung' => "Noidung$i"
    ];
}

// Cấu hình phân trang
$rowsPerPage = 10;
$totalBooks = count($books);
$totalPages = ceil($totalBooks / $rowsPerPage);

// Lấy trang hiện tại từ URL, mặc định là 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
if ($page > $totalPages) $page = $totalPages;

// Tính vị trí bắt đầu
$start = ($page - 1) * $rowsPerPage;

// Lấy dữ liệu cho trang hiện tại
$currentBooks = array_slice($books, $start, $rowsPerPage);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Danh sách sách</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 60%;
            margin: auto;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .pagination {
            text-align: center;
            margin-top: 20px;
        }
        .pagination a {
            padding: 6px 12px;
            border: 1px solid #333;
            text-decoration: none;
            margin: 0 2px;
            color: #333;
        }
        .pagination a.active {
            background-color: #333;
            color: white;
            font-weight: bold;
        }
        .pagination a.disabled {
            color: #aaa;
            border-color: #aaa;
            pointer-events: none;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">📚 Danh sách sách</h2>
<table>
    <tr>
        <th>STT</th>
        <th>Tên sách</th>
        <th>Nội dung sách</th>
    </tr>
    <?php foreach ($currentBooks as $index => $book): ?>
        <tr>
            <td><?= $start + $index + 1 ?></td>
            <td><?= $book['ten'] ?></td>
            <td><?= $book['noidung'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<div class="pagination">
    <!-- Nút Trang trước -->
    <?php if ($page > 1): ?>
        <a href="?page=<?= $page - 1 ?>">« Trang trước</a>
    <?php else: ?>
        <a class="disabled">« Trang trước</a>
    <?php endif; ?>

    <!-- Các số trang -->
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <?php if ($i == $page): ?>
            <a class="active"><?= $i ?></a>
        <?php else: ?>
            <a href="?page=<?= $i ?>"><?= $i ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <!-- Nút Trang sau -->
    <?php if ($page < $totalPages): ?>
        <a href="?page=<?= $page + 1 ?>">Trang sau »</a>
    <?php else: ?>
        <a class="disabled">Trang sau »</a>
    <?php endif; ?>
</div>

</body>
</html>