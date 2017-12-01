<?php
/**
 * KindEditor PHP
 * 
 * 本PHP程序是演示程序，建议不要直接在实际项目中使用。
 * 如果您确定直接使用本程序，使用之前请仔细确认相关安全设置。
 * 
 */
session_start();
require_once 'JSON.php';

$php_path = dirname(__FILE__) . '/';
$php_url = dirname($_SERVER['PHP_SELF']) . '/';

if(isset($_GET['save_path']) && !empty($_GET['save_path'])){
$uploadpath = $_GET['save_path'];
// 文件保存目录路径
$save_path = $php_path . '../../../../'.$uploadpath;
$save_url = './static/'.$uploadpath;
}else{
	$save_path = $php_path . '../../../../../uploads/';
	$save_url = './uploads/';
}

// 文件保存目录URL

// 定义允许上传的文件扩展名
$ext_arr = array(
        'image' => array(
                'gif',
                'jpg',
                'jpeg',
                'png',
                'bmp'
        ),
        'flash' => array(
                'swf',
                'flv'
        ),
        'media' => array(
                'swf',
                'flv',
                'mp3',
                'wav',
                'wma',
                'wmv',
                'mid',
                'avi',
                'mpg',
                'asf',
                'rm',
                'rmvb'
        ),
        'file' => array(
                'gif',
                'jpg',
                'jpeg',
                'png',
                'bmp',
                'doc',
                'docx',
                'xls',
                'xlsx',
                'ppt',
                'htm',
                'html',
                'txt',
                'zip',
                'rar',
                'gz','acc','amr','wmv','mp3','wma','bz2','3gp','plist','rmvb','mp4','flv','avi','pdf'
        )
);
// 最大文件大小 200M
$max_size = 1000 * 1000 * 200;

if (! file_exists($save_path)) {
        mkdir($save_path);
}

$save_path = realpath($save_path) . '/';
 
// PHP上传失败
if (! empty($_FILES['imgFile']['error'])) {
    switch ($_FILES['imgFile']['error']) {
        case '1':
            $error = '超过php.ini允许的大小。';
            break;
        case '2':
            $error = '超过表单允许的大小。';
            break;
        case '3':
            $error = '图片只有部分被上传。';
            break;
        case '4':
            $error = '请选择图片。';
            break;
        case '6':
            $error = '找不到临时目录。';
            break;
        case '7':
            $error = '写文件到硬盘出错。';
            break;
        case '8':
            $error = 'File upload stopped by extension。';
            break;
        case '999':
        default:
            $error = '未知错误。';
    }
    alert($error);
}

// 有上传文件时
if (empty($_FILES) === false) {
    // 原文件名
    $file_name = $_FILES['imgFile']['name'];
    // 服务器上临时文件名
    $tmp_name = $_FILES['imgFile']['tmp_name'];
    // 文件大小
    $file_size = $_FILES['imgFile']['size'];
    // 检查文件名
    if (! $file_name) {
        alert("请选择文件。");
    }
    // 检查目录
    if (@is_dir($save_path) === false) {
        alert("上传目录不存在。");
    }
    // 检查目录写权限
    if (@is_writable($save_path) === false) {
        alert("上传目录没有写权限。");
    }
    // 检查是否已上传
    if (@is_uploaded_file($tmp_name) === false) {
        alert("上传失败。");
    }
    // 检查文件大小
    if ($file_size > $max_size) {
        alert("上传文件大小超过限制。");
    }
    // 检查目录名
    $dir_name = 'file';empty($_GET['dir']) ? 'image' : trim($_GET['dir']);
    if (empty($ext_arr[$dir_name])) {
        alert("目录名不正确。");
    }
    // 获得文件扩展名
    $temp_arr = explode(".", $file_name);
    $file_ext = array_pop($temp_arr);
    $file_ext = trim($file_ext);
    $file_ext = strtolower($file_ext);
    // 检查扩展名
    if (in_array($file_ext, $ext_arr[$dir_name]) === false) {
        alert(
                "上传文件扩展名是不允许的扩展名。\n只允许" . implode(",", $ext_arr[$dir_name]) .
                         "格式。");
    }
    // 创建文件夹
    if ($dir_name !== '') {
       // $save_path .= $dir_name . "/";
       // $save_url .= $dir_name . "/";
	  
        if (! file_exists($save_path)) {			
            mkdir($save_path);
        }
    }

    $folder = 'attachment';
    $save_path .= $folder . "/";
    $save_url .= $folder . "/";

    if (! file_exists($save_path)) {
        mkdir($save_path);
    }

    $ymd =  date("Ymd");// date("Ymd");
    $save_path .= $ymd . "/";
    $save_url .= $ymd . "/";
    if (! file_exists($save_path)) {
        mkdir($save_path);
    }
    // 新文件名
    $new_file_name = date("YmdHis") . '_' . rand(10000, 99999) . '.' . $file_ext;
    // 移动文件
    $file_path = $save_path . $new_file_name;
    if (move_uploaded_file($tmp_name, $file_path) === false) {
        alert("上传文件失败。". $file_path.$php_path);
    }
    @chmod($file_path, 0644);
    $file_url = $save_url . $new_file_name;
    

	//$ip = isset($_SERVER['HTTP_X_FORWARDED_HOST']) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '');



    //插入数据库等待同步
    define('BASEPATH',true);


    include("../../../../application/config/database.php");
    $conn= mysql_connect($db['default']['hostname'],$db['default']['username'],$db['default']['password'])or die("连接失败：".mysql_error());
    mysql_select_db($db['default']['database'],$conn);
    mysql_query("set names 'utf8' ");

    $file_size = formatBytes($file_size);
    $time = time();
    $ip = ip ();
    $uid = $_GET['uid']? $_GET['uid'] : 0;
    $new_file_url = str_replace('./', '' ,$file_url);
    $insert_sql = "INSERT INTO `attachment` (`file_name`,`file_size`,`filepath`,`ip`, `add_time`, `uid`)VALUES('{$file_name}','{$file_size}','{$new_file_url}','{$ip}',{$time},{$uid})";
    mysql_query($insert_sql,$conn);



	
    header('Content-type: text/html; charset=UTF-8');
    $json = new Services_JSON();
    echo $json->encode(array(
            'error' => 0,
            'url' => $file_url
    ));
    exit();
}

//文件大小B,KB,MB单位转换
function formatBytes($size) {
    $units = array(' B', ' KB', ' MB', ' GB', ' TB');
    for ($i = 0; $size >= 1024 && $i < 4; $i++) $size /= 1024;
    return round($size, 2).$units[$i];
}

/**
 * 获取请求ip
 *
 * @return ip地址
 */
function ip ()
{
    if (getenv('HTTP_CLIENT_IP') &&
        strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
        $ip = getenv('HTTP_CLIENT_IP');
    } elseif (getenv('HTTP_X_FORWARDED_FOR') &&
        strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
        $ip = getenv('HTTP_X_FORWARDED_FOR');
    } elseif (getenv('REMOTE_ADDR') &&
        strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
        $ip = getenv('REMOTE_ADDR');
    } elseif (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] &&
        strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return preg_match('/[\d\.]{7,15}/', $ip, $matches) ? $matches[0] : '';
}

function alert ($msg)
{
    header('Content-type: text/html; charset=UTF-8');
    $json = new Services_JSON();
    echo $json->encode(array(
            'error' => 1,
            'message' => $msg
    ));
    exit();
}
?>