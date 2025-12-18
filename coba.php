<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- komentar -->
    <h1>
        <?php
        $name ="john doe"; //string text
        $age = 25;//intiger float
        $address = "Sidoarjo";
        $male = FALSE; //boolean
        // array numerik
        $fruits = Array("apel","mangga","jeruk");
        $Fruits = ["apel","mangga","jeruk"];
        // array asosiatif
        $mahasiswa=[
            "nama"=> "budi",
            "jurusan"=> "teknik informatika",
            "angkatan"=> 2023
        ];

        echo $name."<br>";
        echo $age;
        echo $address;
        echo $male;
        echo $Fruits[2];
        echo $mahasiswa["nama"];
        ?>
    </h1>
</body>
</html>