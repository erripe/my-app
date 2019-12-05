<?php
session_start();
session_destroy();
header("Location: /my-app/index.php");
