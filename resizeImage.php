<?php

// ファイルパスは固定
const IMAGE_PATH = __DIR__ . '/images/target.jpeg';
const RESIZE_WIDTH = 20;
const RESIZE_HEIGHT = 20;
const RESIZE_FILE_NAME = "after";

// 元の画像名を指定してサイズを取得
list($width, $height) = getimagesize(IMAGE_PATH);
// リサイズ後の画像の幅、高さを計算
$afterWidth = $width + (RESIZE_WIDTH * 2);
$afterHeight = $height + (RESIZE_HEIGHT * 2);

// サイズを指定して余白画像を作成
$backgroundImg = imagecreatetruecolor($afterWidth, $afterHeight);
$backgroundColor = imagecolorallocate($backgroundImg, 255, 255, 255);
// 白の背景を作成
imagefilledrectangle(
    $backgroundImg,
    0,
    0,
    $afterWidth,
    $afterHeight,
    $backgroundColor
);

//画像オブジェクトを返却
$baseImage = @imagecreatefromjpeg(IMAGE_PATH);

// 余白画像と元画像を合成
imagecopy(
    $backgroundImg,
    $baseImage,
    RESIZE_WIDTH,
    RESIZE_HEIGHT,
    0,
    0,
    $width,
    $height
);

// コピーした画像を出力する
imagejpeg($backgroundImg , RESIZE_FILE_NAME . '.jpg');
