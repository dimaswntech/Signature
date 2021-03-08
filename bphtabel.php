<?php
    include "koneksi.php"
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="icon" href="https://pbs.twimg.com/profile_images/601620744439631872/2l8SUfq-_400x400.png">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <header class="w3-container w3-teal w3-center">
        <h1>TABEL PAKTA INTEGRITAS BPH</h1>
    </header>

    <div class="w3-container w3-half w3-margin-top" style="overflow-x:auto;">
        <table class="w3-table-all w3-card-4">
        <tr>
                <th>No.</th>
                <th>Nama/Ttd</th>
                <th>EDIT</th>
                
            </tr>
            <?php
                $no=1;
                $query="SELECT * FROM tbl_ttd_bph";
                $arsip1 = $db1->prepare($query);
                $arsip1->execute();
                $res1 = $arsip1->get_result();
                while ($row = $res1->fetch_assoc()) {
                    $nama=$row['namefile'];
                    
            ?>
            
            <tr>
                <td><?php echo $no++; ?></td>
                <td>
                    <img src="signatures/<?php echo $row['nama']; ?>.png" width="100px">
                    </br>
                    <b><?php echo $row['nama']; ?></b>
                    </br>
                    <b><?php echo $row['nim']; ?></b>
                </td>
                <td><a href="bphsign.php?id=<?php echo $row['id']; ?>">Isi Tanda Tangan</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <a href="bphcetak.php"><div class="w3-panel w3-card"><p class="w3-center">VIEW PDF</p></div></a>
    <a href="index.php"><div class="w3-panel w3-card"><p class="w3-center">Kembali</p></div></a>
    <div class="w3-container w3-teal w3-center">
    <h5><a href="https://www.instagram.com/prof_dimas_wn/?hl=id">@prof_dimas_wn</a></h5>
    <p>17/02/2021</p>
    </div>
</body>

</html>
