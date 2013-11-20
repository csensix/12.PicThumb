<?php
define('ROOT', dirname(__FILE__));

require(ROOT."/PicThumb.class.php");

$logfile = ROOT.'/PicThumb.log';
$source1 = ROOT.'/pic/source.jpg';
$dest1 = ROOT.'/pic/1.jpg';
$dest2 = ROOT.'/pic/2.gif';
$dest3 = ROOT.'/pic/3.png';

$source2 = ROOT.'/pic/source_cmyk.jpg';
$dest4 = ROOT.'/pic/4.jpg';
$dest5 = ROOT.'/pic/5.gif';
$dest6 = ROOT.'/pic/6.png';

$watermark = ROOT.'/pic/watermark.png';

// 按比例生成缩略图
$param = array(
    'type' => 'fit',
    'width' => 100,
    'height' => 100,
);

$obj = new PicThumb($logfile);
$obj->set_config($param);
$flag = $obj->create_thumb($source1, $dest1);

if($flag){
    echo '<img src="pic/'.basename($dest1).'">';
}else{
    echo 'create thumb fail';
}


// 按比例生成缩略图,不足部分用#FF0000填充
$param = array(
    'type' => 'fit',
    'width' => 100,
    'height' => 100,
    'bgcolor' => '#FFFF00'
);

$obj = new PicThumb($logfile);
$obj->set_config($param);
$flag = $obj->create_thumb($source1, $dest2);

if($flag){
    echo '<img src="pic/'.basename($dest2).'">';
}else{
    echo 'create thumb fail';
}


// 裁剪250x250的缩略图,裁剪位置是底部中间,水印位置西南,透明度50
$param = array(
    'type' => 'crop',
    'croppos' => 'BM',
    'width' => 250,
    'height' => 250,
    'watermark' => $watermark,
    'opacity' => 50,
    'gravity' => 'SouthWest'
);

$obj = new PicThumb($logfile);
$obj->set_config($param);
$flag = $obj->create_thumb($source1, $dest3);

if($flag){
    echo '<img src="pic/'.basename($dest3).'">';
}else{
    echo 'create thumb fail';
}


// 按比例生成缩略图 CMYK格式
$param = array(
    'type' => 'fit',
    'width' => 100,
    'height' => 100,
);

$obj = new PicThumb($logfile);
$obj->set_config($param);
$flag = $obj->create_thumb($source2, $dest4);

if($flag){
    echo '<img src="pic/'.basename($dest4).'">';
}else{
    echo 'create thumb fail';
}


// 按比例生成缩略图,不足部分用#FF0000填充 CMYK格式
$param = array(
    'type' => 'fit',
    'width' => 100,
    'height' => 100,
    'bgcolor' => '#FFFF00'
);

$obj = new PicThumb($logfile);
$obj->set_config($param);
$flag = $obj->create_thumb($source2, $dest5);

if($flag){
    echo '<img src="pic/'.basename($dest5).'">';
}else{
    echo 'create thumb fail';
}


// 裁剪250x250的缩略图,裁剪位置是底部中间,水印位置西南,透明度50 CMYK格式
$param = array(
    'type' => 'crop',
    'croppos' => 'BM',
    'width' => 250,
    'height' => 250,
    'watermark' => $watermark,
    'opacity' => 50,
    'gravity' => 'SouthWest'
);

$obj = new PicThumb($logfile);
$obj->set_config($param);
$flag = $obj->create_thumb($source2, $dest6);

if($flag){
    echo '<img src="pic/'.basename($dest6).'">';
}else{
    echo 'create thumb fail';
}
?>