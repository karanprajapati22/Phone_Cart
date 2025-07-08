<?php
session_start();
if(!isset($_SESSION['admin_email'])){?>
<script>
     $(document).ready(function(){
    window.location='login.php?error=Access Denied !';
    });
</script>    
<?php }
?>