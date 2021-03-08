<?php 
include "koneksi.php";

if(isset($_POST['signaturesubmit'])){ 
   $idu=$_POST["id"];
    $workDir = $_SERVER['HTTP_HOST'];
    $signature = $_POST['signature'];
    $name=$_POST["namaorg"];
    //echo $name;
    $signatureFileName = $name.'.png';
    $signature = str_replace('data:image/png;base64,', '', $signature);
    $signature = str_replace(' ', '+', $signature);
    $data = base64_decode($signature);
    $file = 'signatures/'.$signatureFileName;
    $filesql=$workDir."/signature/signatures/".$signatureFileName;
    file_put_contents($file, $data);
    //$msg = "<div class='alert alert-success'>Signature Uploaded</div>";

    $sql="UPDATE tbl_ttd_bph SET
    nama='$name',
    filettd='$filesql',
    namefile='$signatureFileName'
    WHERE id='$idu'";
    $query = mysqli_query($db1, $sql) or die (mysqli_error($db1));

    if($query){
        //echo "Data berhasil di insert!";
        header("location:bphtabel.php");
     } else {
        echo "Error :".$sql."<br>".mysqli_error($db1);
     }
     mysqli_close($db1);
} 
?>