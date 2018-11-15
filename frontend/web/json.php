<?php

$data=[];
foreach (range(2,10) as $item) {
    $objs= new StdClass();
    $objs->id=rand();
    $p_colect=[];
    foreach (range(5,10) as $item) {
        $p_colect[]='path/to/images/o.jpg';
    }
    $objs->photo=$p_colect;
    $data[]=$objs;
}

header('Content-Type: application/json');
echo json_encode($data);

