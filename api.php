<?php

// 允许所有来源
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

// 设置响应的 Content-Type
header("Content-Type: application/json");

// 获取 URL 中的 alias_name 参数
$alias_name = isset($_GET['alias_name']) ? $_GET['alias_name'] : '';

// 如果 alias_name 参数为空，则返回错误信息
if (empty($alias_name)) {
    echo json_encode(array('error' => 'Alias name is missing.'));
    exit;
}

// 构建请求的 URL
$request_url = 'https://kol-fanqiekol-zshfzuziop.cn-hangzhou.fcapp.run/?&sessionid=1f8167245dce35ffa842614a15792e11&request_type=getRealInfo&alias_name=' . urlencode($alias_name);

// 发起请求
$response = file_get_contents($request_url);

// 如果请求失败，则返回错误信息
if ($response === FALSE) {
    echo json_encode(array('error' => 'Failed to fetch data.'));
    exit;
}

// 返回响应内容
echo $response;
