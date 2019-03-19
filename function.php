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
        //csvファイルを開いて中身を読み込み
        $file1 = fopen($csv, 'r');
        $line = fgetcsv($file1, 1024, ",");
        //配列で返ってきたデータから必要なidを取り出す
        $id = $line[0];
        $data[] = $_POST['title'];
        $data[] = $_POST['body'];
        //取り出したidに対して+1カウントアップし先頭に追加
        array_unshift($data, $id+1);
        //ユーザは田中だけなので末尾に'1'を追加
        array_push($data,'1');
        $file2 = @fopen($csv, 'ab') or die('ファイルが開けませんでした。');
        fwrite($file2, implode(",", $data)."\n");
        fclose($file1);
    }
    
    //ログインに関する関数
    function login() {
        //session_start関数でセッション開始
        session_start();
        //csvファイルを開いて中身を読み込み
        $file = fopen('csv/user.csv', 'r+');
        $line = fgetcsv($file, 1024, ",");
        //配列で返ってきたデータから必要なuser_idを取り出す
        $user_id = $line[2];
        //user.csvのuser_idと入力されたユーザーIDとが合致するかの処理       
        if($_POST['user_id'] === $user_id){
            $_SESSION['user_id'] = $_POST['user_id'];
            header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'index.php');
        } //合致しなければログイン画面へリダイレクト
        else {
            header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'login.php');
        }
        //csvファイルを閉じる
        fclose($file);
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