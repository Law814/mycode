<?php
    function createFilename($source, $index){
        date_default_timezone_set('Asia/Taipei');
        $data = explode('.',$source);
        if (count($data)>=2){
            $sname = '.' . $data[count($data)-1] ;
        }else{
            $sname = '';
        }
        $filename = date('Ymd_His') . $index  . $sname;
        return $filename;
    }

    $upload = $_FILES['upload'];
    //var_dump($upload);

    foreach($upload as $key => $value){
        echo $key . '<br />';
        foreach($value as $i => $data){
            echo "{$i} => {$data}<br />";
        }
        echo '<hr />';
    }

    $index = 0;
    foreach($upload['error'] as $i => $errCode){
        if ($errCode == 0){
            // $i
            move_uploaded_file($upload['tmp_name'][$i],
                './dir1/' . createFilename($upload['name'][$i], $index));
            $index++;
        }
    }

?>