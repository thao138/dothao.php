<?php require 'functions.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Phép tính trên hai số</title>
</head>
<body>
    <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>

    <form method="post">
        <label>Chọn phép tính:</label><br>
        <input type="radio" name="pheptinh" value="cong" checked> Cộng
        <input type="radio" name="pheptinh" value="tru"> Trừ
        <input type="radio" name="pheptinh" value="nhan"> Nhân
        <input type="radio" name="pheptinh" value="chia"> Chia
        <input type="radio" name="pheptinh" value="nguyento"> Nguyên tố
        <input type="radio" name="pheptinh" value="chanle"> Chẵn/lẻ
        <br><br>

        Số thứ nhất: <input type="number" name="so1" required><br><br>
        Số thứ hai: <input type="number" name="so2"><br><br>

        <input type="submit" name="submit" value="Tính">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $a = (int)$_POST['so1'];
        $b = isset($_POST['so2']) ? (int)$_POST['so2'] : 0;
        $pheptinh = $_POST['pheptinh'];

        echo "<h3>KẾT QUẢ:</h3>";
        echo "Chọn phép tính: <strong>" . ucfirst($pheptinh) . "</strong><br>";
        echo "Số 1: $a<br>";

        if (in_array($pheptinh, ['cong', 'tru', 'nhan', 'chia'])) {
            echo "Số 2: $b<br>";
        }

        echo "Kết quả: ";
        switch ($pheptinh) {
            case 'cong':
                echo tong($a, $b);
                break;
            case 'tru':
                echo hieu($a, $b);
                break;
            case 'nhan':
                echo tich($a, $b);
                break;
            case 'chia':
                echo thuong($a, $b);
                break;
            case 'nguyento':
                echo laSoNguyenTo($a) ? "$a là số nguyên tố" : "$a không phải là số nguyên tố";
                break;
            case 'chanle':
                echo laSoChan($a) ? "$a là số chẵn" : "$a là số lẻ";
                break;
            default:
                echo "Phép tính không hợp lệ";
        }
    }
    ?>
</body>
</html>
