<?php

    //HTMLエスケープ処理をしないとクロスサイトスクリプティング(XSS)と呼ばれる脆弱性の原因になる
    function e(string $str, string $charset = 'UTF-8'): string {
        return htmlspecialchars($str, ENT_QUOTES | ENT_HTML5, $charset);
    }

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
    function writeCsv($csv){
        session_start();
        //csvファイルを開いて中身を読み込み
        $file = fopen($csv, 'r');
        $data[0] = $_POST['title'];
        $data[1] = $_POST['body'];
        //user_idを先頭に追加
        array_unshift($data,$_SESSION['user']['user_id']);
        $file = @fopen($csv, 'ab') or die('ファイルが開けませんでした。');
        fwrite($file, implode(",", $data)."\n");
        fclose($file);
    }
    
    //ログインに関する関数
    function login() {
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

    //セッション削除に関する関数
    function sessionDestroy(){
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

?>