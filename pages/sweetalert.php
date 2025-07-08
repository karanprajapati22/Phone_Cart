<?php 
if(isset($_GET['alert'])){
?>
                <script>
                    $(document).ready(function(){
                        swal("Sorry !", "<?php echo $_GET['alert']?>", "error");
                    });
                </script>
<?php
}
if(isset($_GET['success'])){
?>
				<script>
                    $(document).ready(function(){
                        swal("Good job!", "<?php echo $_GET['success']?>", "success");
                    });
                </script>
<?php
}
if(isset($_GET['message'])){
?>
				<script>
                    $(document).ready(function(){
                        swal("Sorry !", "<?php echo $_GET['message']?>", "warning");
                    });
                </script>
<?php
}
if(isset($_GET['info'])){
?>
				<script>
                    $(document).ready(function(){
                        swal("Sorry !", "<?php echo $_GET['info']?>", "info");
                    });
                </script>	
<?php
}
?>