<?php

// ファイルパスは固定
const IMAGE_PATH = __DIR__ . '/images/1500x1800.jpeg';
const RESIZE_WIDTH = 1500;
const RESIZE_HEIGHT = 2000;
const RESIZE_FILE_NAME = "1500x2000";

list($width, $height) = getimagesize(IMAGE_PATH); // 元の画像名を指定してサイズを取得

//画像オブジェクトを返却
$baseImage = @imagecreatefromjpeg(IMAGE_PATH);

// サイズを指定して余白画像を作成
$backgroundImg = imagecreatetruecolor(RESIZE_WIDTH, RESIZE_HEIGHT);
$backgroundColor = imagecolorallocate($backgroundImg, 255, 255, 255);
// 白の背景を作成
imagefilledrectangle(
    $backgroundImg,
    0,
    0,
    RESIZE_WIDTH,
    RESIZE_HEIGHT,
    $backgroundColor
);

imagecopy(
    $backgroundImg,
    $baseImage,
    10,
    100,
    0,
    0,
    $width - 20,
    $height
);

// コピーした画像を出力する
imagejpeg($backgroundImg , RESIZE_FILE_NAME . '.jpg');
