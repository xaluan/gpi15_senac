<?php

    session_start();

    $BASE_URL = "http://localhost:9000" . dirname($_SERVER["REQUEST_URI"] ."?") . "/";