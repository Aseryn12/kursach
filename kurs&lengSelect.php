<?php
    $tbql = "SELECT leng, lenginfo FROM leng";
    $resultLeng = $pdo->query($tbql);
    $rowsL = $resultLeng->fetchALL();
    $countL = count($rowsL);
    $countLM = count($rowsL[0])/2;

    $tbqk = "SELECT id, name, descrip, price FROM kurs";
    $resultKurs = $pdo->query($tbqk);
    $rowsK = $resultKurs->fetchALL();
    $countK = count($rowsK);
    $countKM = count($rowsK[0])/2;

    $tbqt = "SELECT surn, name, patr, leng, educ 
    FROM teach INNER JOIN leng ON leng.id = teach.id_leng";
    $resultTeach = $pdo->query($tbqt);
    $rowsT = $resultTeach->fetchALL();
    $countTE = count($rowsT);
    $countTEM = count($rowsT[0])/2;
?>