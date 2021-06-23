<?php
    session_start();
    session_destroy();
    echo '<script>window.location = "../../html/index.html";</script>';
?>