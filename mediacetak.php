<?php
include 'koneksi.php';
//library mpdf
define('_MPDF_PATH','mpdf/');
include(_MPDF_PATH . "mpdf.php");

//setting dan nama file pdf
$nama_dokumen='Data User';
$mpdf=new mPDF('utf-8', 'A4', 11, 'Georgia');
ob_start();
?>
 <html>
    <head></head>
    <body>
    <header>
      <h1 style="text-align:center">PAKTA INTEGRITAS MEDIA</h1>
    </header>
    <table border="1" >
   <?php
   $kolom = 3; 
   $i=1;    
   $query=mysqli_query($db1,"SELECT * FROM tbl_ttd_media");
   while ($data=mysqli_fetch_array($query)) {
    if(($i) % $kolom== 1) {    
    echo'<tr>';   
    }  
    echo '<td align="center" width="300px"><img src="signatures/'.$data['namefile'].'" width="50%" /><br><b>'.$data['nama'].'</b><br><b>'.$data['nim'].'</b>/td>';
    if(($i) % $kolom== 0) {    
    echo'</tr>';    
    }
   $i++;
   }
   ?>
  </table>
    </body>
</html>
<?php
mysqli_close($db1);
$html = ob_get_contents();
ob_end_clean();

$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output("".$nama_dokumen.".pdf" ,'D');
?>