 <?php
 include 'koneksi.php';
 ?>
 <html>
    <head>
    </head>
    <body>
    <table border="1" style="">
   <?php
   
   $kolom = 3; 
   $i=0;    
   $query=mysqli_query($db1,"SELECT * FROM tbl_ttd_sdi");
   while ($data=mysqli_fetch_array($query)) {
    if(($i) % $kolom== 1) {    
    echo'<tr>';   
    }  
    echo '<td align="center" width="300px"><img src="signatures/'.$data['namefile'].'" width="50%" /><br><b>'.$data['nama'].'</b><a href="test.php"> halo</a></td>';
    if(($i) % $kolom== 0) {    
    echo'</tr>';    
    }
   $i++;
   }
   ?>
  </table>
    </body>
</html>