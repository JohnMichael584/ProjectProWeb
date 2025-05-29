<?php
session_start();
session_unset();
session_destroy();
header('Location: index.php');
exit;
//                    <i class="bi bi-box-arrow-right"></i> Logout>