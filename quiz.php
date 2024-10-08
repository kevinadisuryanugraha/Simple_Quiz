<?php
// Daftar soal
$list_soal = array(
    array(
        'soal' => 'Soal pertama 1',
        'jawaban' => array(
            'A' => 'Jawaban A',
            'B' => 'Jawaban B',
            'C' => 'Jawaban C',
            'D' => 'Jawaban D',
        ),
        'kunci' => 'B'
    ),
    array(
        'soal' => 'Soal pertama 2',
        'jawaban' => array(
            'A' => 'Jawaban A',
            'B' => 'Jawaban B',
            'C' => 'Jawaban C',
            'D' => 'Jawaban D',
        ),
        'kunci' => 'A'
    ),
    array(
        'soal' => 'Soal pertama 3',
        'jawaban' => array(
            'A' => 'Jawaban A',
            'B' => 'Jawaban B',
            'C' => 'Jawaban C',
            'D' => 'Jawaban D',
        ),
        'kunci' => 'A'
    ),
    array(
        'soal' => 'Soal pertama 3',
        'jawaban' => array(
            'A' => 'Jawaban A',
            'B' => 'Jawaban B',
            'C' => 'Jawaban C',
            'D' => 'Jawaban D',
        ),
        'kunci' => 'A'
    ),
    array(
        'soal' => 'Soal pertama 3',
        'jawaban' => array(
            'A' => 'Jawaban A',
            'B' => 'Jawaban B',
            'C' => 'Jawaban C',
            'D' => 'Jawaban D',
        ),
        'kunci' => 'A'
    ),
);

$hasil = '';
if (isset($_POST['submit'])) {
    $score = 0;
    $benar = 0;
    foreach ($list_soal as $key => $soal) {
        if (isset($_POST['soal_' . $key]) && $_POST['soal_' . $key] == $soal['kunci']) {
            $benar++;
        }
    }
    $score = round(($benar / count($list_soal)) * 100);
    $hasil = "Nilai kamu adalah $score.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        .soal {
            margin-bottom: 20px;
        }
        .jawaban {
            margin-left: 20px;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .hasil {
            margin-top: 20px;
            font-size: 18px;
            color: blue;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Kerjakan soal berikut ini!</h2>
        <form method="post" action="">
            <?php foreach ($list_soal as $key => $soal): ?>
                <div class="soal">
                    <p><strong><?= ($key + 1) . '. ' . $soal['soal'] ?></strong></p>
                    <?php foreach ($soal['jawaban'] as $huruf => $jawaban): ?>
                        <div class="jawaban">
                            <input type="radio" name="soal_<?= $key ?>" value="<?= $huruf ?>" required>
                            <?= $huruf ?>. <?= $jawaban ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
            <button type="submit" name="submit" class="btn">Cek Hasil Jawaban</button>
        </form>
        <?php if ($hasil): ?>
            <div class="hasil"><?= $hasil ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
