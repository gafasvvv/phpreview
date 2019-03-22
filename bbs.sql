/* データベース作成*/
CREATE DATABASE bbs;

/* userテーブル作成*/
CREATE TABLE user (
    id INT PRIMARY KEY NOT NULL,
    user_name VARCHAR(30) NOT NULL,
    login_id VARCHAR(11) NOT NULL
);

/* boardテーブル作成*/
CREATE TABLE board (
    id INT PRIMARY KEY,
    title TEXT,
    body TEXT,
    user_id INT NOT NULL
);

/* userテーブルにデータ挿入*/
INSERT INTO user (id, user_name, login_id)
VALUES (1, '田中', 'tanaka');
INSERT INTO user (id, user_name, login_id)
VALUES (2, '中村', 'nakamura');

/* boardテーブルにデータ挿入*/
INSERT INTO board (id, title, body, user_id)
VALUES (1, '旅行', '楽しかった', 1);
INSERT INTO board (id, title, body, user_id)
VALUES (2, '観光', '色々行った！', 2);