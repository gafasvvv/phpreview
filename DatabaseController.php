<?php

    require_once 'Database.php';

    class DatabaseController {

        //一覧表示
        public function index(){
            $bbs = new Database();
            $bbs -> selectData();
        }

        //新規投稿
        public function create(){
            $bbs = new Database();
            $bbs -> insertData();
            //index.phpへリダイレクト
            header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'index.php');
        }

        //ログインに関する関数
        public static function login() {
            //session_start関数でセッション開始
            session_start();
            //csvファイルを開いて中身を読み込み
            $file = fopen('csv/user.csv', 'r+');
            //user.csvのlogin_idを検索し、一致したらログインする
            while($array = fgetcsv($file, 1024, ",")){
                if(isset($_POST['login_id']) == $array[2]){
                    $_SESSION['user']['id'] = $array[0];
                    $_SESSION['user']['name'] = $array[1];
                    $_SESSION['user']['login_id'] = $array[2];
                    //csvファイルを閉じる
                    fclose($file);
                    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'index.php');
                    } 
            }  
        }

        //セッション削除に関する関数
        public static function sessionDestroy(){
            //セッションを明示的に破棄する処理
            session_start();
            //セッション変数を空にする
            $_SESSION = [];
            //セッションクッキーが存在する場合は破棄する
            if(isset($_COOKIE[session_name()])){
                $cparam = session_get_cookie_params();
                setcookie(session_name(), '', time() - 3600,
                $cparam['path'], $cparam['domain'], $cparam['secure'], $cparam['httponly']
                );
            }
            //セッションを破棄
            session_destroy();
        }

        //リダイレクトに関する関数
        public static function redirect(){
            //session_start関数でセッション開始
            session_start();
            if(empty($_SESSION['user']['login_id'])){
                //login.phpへリダイレクト
                header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'login.php');
            }
        }

    }