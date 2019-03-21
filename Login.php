<?php

    class Login {
        
        //プロパティの設定
        public $login;

        //ログインに関する関数
        public function login() {
            //session_start関数でセッション開始
            session_start();
            //csvファイルを開いて中身を読み込み
            $file = fopen('csv/user.csv', 'r+');
            //user.csvのuser_idを検索し、一致したらログインする
            while($array = fgetcsv($file, 1024, ",")){
                if($_POST['user_id'] == $array[2]){
                    $_SESSION['user']['id'] = $array[0];
                    $_SESSION['user']['name'] = $array[1];
                    $_SESSION['user']['user_id'] = $array[2];
                    //csvファイルを閉じる
                    fclose($file);
                    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'index.php');
                    } 
            }  
        }
    }