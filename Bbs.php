<?php

    class Bbs {

        //プロパティの設定
        public $csv;

        //コンストラクタによるプロパティの初期化
        public function __construct(string $csv){
            $this->csv = $csv;
        }

        //csv読み込み関数
        public function readCsv(){
            $file = fopen($this->csv, 'r+');
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
        public function writeCsv(){
            session_start();
            //csvファイルを開いて中身を読み込み
            $file = fopen($this->csv, 'r');
            $data[0] = $_POST['title'];
            $data[1] = $_POST['body'];
            //user_idを先頭に追加
            array_unshift($data,$_SESSION['user']['name']);
            $file = @fopen($this->csv, 'ab') or die('ファイルが開けませんでした。');
            fwrite($file, implode(",", $data)."\n");
            fclose($file);
        }
        
    }
