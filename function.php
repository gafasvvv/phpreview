<?php

    function readCsv(){
        $file = fopen('board.csv', 'r+');
        while ($line = fgetcsv($file, 1024, "\t")){
                print  '<tr>';
            foreach ($line as $value){
                print '<td>'.$value.'</td>';
            }
        print '</tr><br />';
        }
        fclose($file);
    }

    function writeCsv(){
        $data[] = $_POST['title'];
        $data[] = $_POST['body'];
        $file = @fopen('board.csv', 'ab') or die('ファイルが開けませんでした。');
        fwrite($file, implode(",", $data)."\n");
        fclose($file);
    }
?>