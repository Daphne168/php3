<?php

//這種寫法比較不嚴謹
// $h = $_POST['height'];
// $w = $_POST['weight'];

// 比較嚴謹寫法isset
// 先寫好isset的結構
// isset () ? : '' ;
// isset (塞 $_POST['變數']) ? 塞 $_POST['變數'] : '塞預設值' ;

$h = isset($_POST['height']) ?$_POST['height'] : '' ;
$w = isset($_POST['weight']) ?$_POST['weight'] : '' ;

// bmi公式 = 體重/身高(公尺)的平方
// 所以公分要先換算成公尺
$bmi = ($w) / (($h/100)*($h/100));

// 取整數
// $bmi = round($bmi,0);

// 取小數點後2位
$bmi = round($bmi,2);

// 二者之間的比較
if($bmi >=24)
{
    $msg = '肥胖';
    $pic = 's1.jpg';
    $adv = 'page1.html';
}
elseif( ($bmi<24)&&($bmi>=22)     )
{
    $msg = '過重';
    $pic = 's2.jpg';
    $adv = 'page2.html';
}
elseif(  ($bmi<22)&& ($bmi>=17.5))
{
    $msg ='正常';
    $pic = 's3.jpg';
    $adv = 'page3.html';
}
elseif($bmi<17.5)
{
    $msg = '太輕';
    $pic = 's4.jpg';
    $adv = 'page4.html';
}
$html = <<< HEREDOC
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
您的身高：{$h}
您的體重：{$w} 
您的BMI：{$bmi}
您的狀態：{$msg}
您的狀態：<img src="images/{$pic}">
<a href="{$adv}">給您的建議</a>
<iframe src="{$adv}" width="600" height="300"></iframe>
</body>
</html>
HEREDOC;

echo $html;

?>
