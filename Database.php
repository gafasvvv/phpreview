<?php

    class Database{

        public static function getDb(){
            //データベースに接続
            $dsn = 'mysql:host=localhost;dbname=bbs;charset=utf8;unix_socket=/tmp/mysql.sock';
            $user = 'root';
            $password = 'password';

            //データベース接続(PDO)
            try{
                $db = new PDO($dsn, $user, $password);
                return $db;
            } catch (PDOException $e){
                print '接続できません'.$e->getMessage();
            }
        }

        public function selectData(){
            $dsn = 'mysql:host=localhost;dbname=bbs;charset=utf8;unix_socket=/tmp/mysql.sock';
            $user = 'root';
            $password = 'password';
            $db = new PDO($dsn, $user, $password);
            $sql = "SELECT * FROM board INNER JOIN user ON board.user_id = user.id";
            $stt = $db->prepare($sql);
            $stt->execute();
            while($row = $stt->fetch(PDO::FETCH_ASSOC)){
            print  '<tr>';
                print '<td>'.$row['user_name'].'</td>';
                print '<td>'.$row['title'].'</td>';
                print '<td>'.$row['body'].'</td>';
            print '<br />';
            }
        }

        public function insertData(){
            $dsn = 'mysql:host=localhost;dbname=bbs;charset=utf8;unix_socket=/tmp/mysql.sock';
            $user = 'root';
            $password = 'password';
            $db = new PDO($dsn, $user, $password);
            $stt = $db->prepare("INSERT INTO board(id, title, body, user_id)
            VALUES (:id, :title, :body, :user_id)");
            $stt->bindValue(':id', '');
            $stt->bindValue(':title', $_POST['title']);
            $stt->bindValue(':body', $_POST['body']);
            $stt->bindValue(':user_id', $_SESSION['user']['id']);
            $stt->execute();
        }
    }