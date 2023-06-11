<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <h1 class="data"><img src="librarysymbolofthreerectangularbooksoutlines_79988.png" width="30" height="30"><a class="out" href="login.php">LOG OUT</a>  Data Nilai</h1>
</head>
 
<body>
    <center>
        <form action="" method="post">

            <h1>Masukkan NIS anda</h1>
           
            <input type="text" name="nis" placeholder="NIS">

            <h1>Masukkan Nilai Anda</h1>

            <input type="text" name="mtk" placeholder="Matematika"><br><br>

            <input type="text" name="prod" placeholder="Produktif"><br><br>

            <input type="text" name="pipas" placeholder="PIPAS"><br><br>

            <input type="text" name="sejarah" placeholder="Sejarah"><br><br>

            <input type="text" name="agama" placeholder="PABP"><br><br>

            <input type="text" name="bindo" placeholder="B.Indonesia"><br><br>
            
            <button id="button" type="submit" name="submit">Submit</button><br><br>
            
        </form>
    </center>
</body>
<br>
</html>
<center><div class="oop">
<?php
class FormHandler
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function handleSubmit()
    {
        if (isset($_POST['submit'])) {
            $nis = $_POST['nis'];
            $mtk = $_POST['mtk'];
            $prod = $_POST['prod'];
            $pipas = $_POST['pipas'];
            $sejarah = $_POST['sejarah'];
            $agama = $_POST['agama'];
            $bindo = $_POST['bindo'];

            $sql = "INSERT INTO `hitung`(`nis`,`mtk`, `prod`, `pipas`, `sejarah`, `agama`, `bindo`) VALUES ('$nis','$mtk','$prod','$pipas','$sejarah','$agama','$bindo')";
            $apakah = mysqli_query($this->conn, $sql);

            if ($apakah) {
                echo "Berhasil ditambahkan";
            } else {
                echo "Gagal";
                exit;
            }

            $data = array($mtk, $prod, $pipas, $sejarah, $agama, $bindo);

    
            $totalSemua = array_sum($data);
            echo "Jumlah total angka: " . $totalSemua . "<br>";


            $total1 = array_sum($data);
            $jumlahData = count($data);
            $rataRata = $total1 / $jumlahData;
            echo "Jumlah rata rata: " . $rataRata . "<br>";


            $maksimum = max($data);
            echo "Nilai maksimum: " . $maksimum . "<br>";

           
            $minimum = min($data);
            echo "Nilai minimum: " . $minimum . "<br>";

          
            if ($totalSemua >= 540) {
                echo "A";
            } elseif ($totalSemua >= 480) {
                echo "B";
            } elseif ($totalSemua >= 420) {
                echo "C";
            } else {
                echo "D";
            }
            echo "<br>";
        }
    }
}

include "koneksi.php";
$formHandler = new FormHandler($conn);
$formHandler->handleSubmit();
?>
<a id="a" href="tampil.php">Tampilkan</a></center>
</div>
<style>
    body{
        background-color: #F9F5F6;
        font-family: sans-serif;
    }
    .data{
        background-color: #8000ff;
        color: white;
        margin: -10px -10px 50px -10px;
        padding: 20px;
    }
    label{
        margin-right: 330px;
    }
    .oop{
        text-align: center;
        width: 600px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background-color: rgb(255, 255, 255);
        padding: 30px 30px 30px 30px;
        border-radius: 30px;
        box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.062);
    }
    form{
        width: 600px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: rgb(255, 255, 255);
        padding: 30px 30px 30px 30px;
        border-radius: 30px;
        box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.062);
    }
    input{
        width: 70%;
        height: 40px;
        background-color: transparent;
        border: none;
        border-bottom: 2px solid rgb(173, 173, 173);
        border-radius: 30px;
        margin: 10px 0;
        color: black;
        font-size: .8em;
        font-weight: 500;
        box-sizing: border-box;
        padding-left: 30px;
    }
    #button {
        position: relative;
        width: 50%;
        border: 2px solid #8000ff;
        background-color: #8000ff;
        height: 40px;
        color: white;
        font-size: .8em;
        font-weight: 500;
        letter-spacing: 1px;
        border-radius: 30px;
        margin: 10px;
        cursor: pointer;
        overflow: hidden;
    }
    #button::after {
        content: "";
        position: absolute;
        background-color: rgba(255, 255, 255, 0.253);
        height: 100%;
        width: 150px;
        top: 0;
        left: -200px;
        border-bottom-right-radius: 100px;
        border-top-left-radius: 100px;
        filter: blur(10px);
        transition-duration: .5s;
    }

    #button:hover::after {
        transform: translateX(600px);
        transition-duration: .5s;
    }
    #a {
        position: relative;
        left: 200px;
        width: 30%;
        border: 2px solid #8000ff;
        background-color: #8000ff;
        height: 40px;
        color: white;
        font-size: .8em;
        font-weight: 500;
        letter-spacing: 1px;
        border-radius: 30px;
        margin: 10px;
        cursor: pointer;
        overflow: hidden;
    }
    #a::after {
        content: "";
        position: absolute;
        background-color: rgba(255, 255, 255, 0.253);
        height: 100%;
        width: 150px;
        top: 0;
        left: -200px;
        border-bottom-right-radius: 100px;
        border-top-left-radius: 100px;
        filter: blur(10px);
        transition-duration: .5s;
    }

    #a:hover::after {
        transform: translateX(600px);
        transition-duration: .5s;
    }
    a{
        text-decoration: none;
        color: white;
        
    }
    .out{
    float:right;
    cursor: pointer;
    }

</style>
