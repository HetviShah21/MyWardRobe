<?php
session_start();
session_unset();
session_destroy();
echo"<script>window.open('../homenavbar.php','_self')</script>"
?>