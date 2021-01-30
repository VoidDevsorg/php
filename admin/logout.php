<?php
session_start();
$_SESSION['login']=="";

session_unset();
$_SESSION['action1']='<script> swal("Başarılı","Başarıyla çıkış yaptın!","success"); </script>';
?>
<script language="javascript">
document.location="index.php";
</script>
