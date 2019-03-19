<?php
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
    sessionDestroy();