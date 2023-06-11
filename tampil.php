<?php
class DataPage
{
    private $conn;

    public function __construct($conn) 
    {
        $this->conn = $conn;
    }

    public function displayData()
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style.css">
            <title>Document</title>
        </head>

        <body>
            <h2>DATA - DATA</h2>
            <table class="table" border="1" cellpadding="10" cellspacing="0">
                <th>NIS</th>
                <th>Matematika</th>
                <th>Prod</th>
                <th>Pipas</th>
                <th>Sejarah</th>
                <th>Agama</th>
                <th>Bindo</th>
                <th>Aksi</th>

                <a class="a" href="index.php">Tambah data</a><br>

                <?php
                $no = 1;
                $ambil = mysqli_query($this->conn, "SELECT * FROM hitung");
                while ($data = mysqli_fetch_array($ambil)) {
                    ?>
                    <tr class="tr">
                        <td><?php echo $data['nis']; ?></td>
                        <td><?php echo $data['mtk']; ?></td>
                        <td><?php echo $data['prod']; ?></td>
                        <td><?php echo $data['pipas']; ?></td>
                        <td><?php echo $data['sejarah']; ?></td>
                        <td><?php echo $data['agama']; ?></td>
                        <td><?php echo $data['bindo']; ?></td>
                        <td>
                            <a href="hapus.php?nis=<?php echo $data['nis']; ?>">HAPUS</a>
                            <a href=""></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </body>

        </html>
    <?php
    }
}

// Usage
include "koneksi.php";
$dataPage = new DataPage($conn);
$dataPage->displayData();
?>
<style>
  body {
  background-color: #f2f2f2;
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 20px;
}

h2 {
  text-align: center;
  color: #6a2c70;
}

.table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

.table th,
.table td {
  padding: 10px;
  text-align: center;
  border: 1px solid #ccc;
}

.table th {
  background-color: #e6d1e7;
  font-weight: bold;
  color: #6a2c70;
}

.table tr:nth-child(even) {
  background-color: #f2f2f2;
}

.a {
  display: inline-block;
  margin-top: 20px;
  text-decoration: none;
  background-color: #6a2c70;
  color: white;
  padding: 10px 20px;
  border-radius: 5px;
}

.a:hover {
  background-color: #4c2053;
}

.tr:hover {
  background-color: #e6e6e6;
}

.tr td:last-child {
  white-space: nowrap;
}

.tr td a {
  display: inline-block;
  margin-left: 5px;
  padding: 5px 10px;
  text-decoration: none;
  color: #6a2c70;
  border: 1px solid #6a2c70;
  border-radius: 3px;
}

.tr td a:hover {
  background-color: #6a2c70;
  color: white;
}
</style>