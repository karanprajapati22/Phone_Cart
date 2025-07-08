<?php

    $file= 'images/blog/cookbook.pdf';

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'pages/head.php'; ?>
    <title>Blog</title>
</head>
<body>
<button type="button" class="btn-close" onclick="history.back()" aria-label="Close">Close</button>
    <object width="1690" height="790" data="<?php echo $file; ?>" type="application/pdf"></object>
</body>
</html>