<?php

    //csv読み込み関数
    function readCsv($csv){
        $file = fopen($csv, 'r+');
        while ($line = fgetcsv($file, 1024, "\t")){
                print  '<tr>';
            foreach ($line as $value){
                print '<td>'.$value.'</td>';
            }
        print '</tr><br />';
        }
        fclose($file);
    }

    //csv書き込み関数
    function writeCsv(){
        //csvファイルを開いて中身を読み込み
        $file1 = fopen('board.csv', 'r');
        $line = fgetcsv($file1, 1024, ",");
        //配列で返ってきたデータから必要なidを取り出す
        $id = $line[0];
        $data[] = $_POST['title'];
        $data[] = $_POST['body'];
        //取り出したidに対して+1カウントアップし先頭に追加
        array_unshift($data, $id+1);
        //ユーザは田中だけなので末尾に'1'を追加
        array_push($data,'1');
        $file2 = @fopen('board.csv', 'ab') or die('ファイルが開けませんでした。');
        fwrite($file2, implode(",", $data)."\n");
        fclose($file1);
    }

?>