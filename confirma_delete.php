<?php

    $mysqli->query("
        DELETE FROM data WHERE id=$id
    ") or die($mysqli->error);

    echo "Registo eliminado!";
