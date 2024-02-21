<?php
//https://www.yangshipin.cn/#/tv/home
$id = isset($_GET['id'])?$_GET['id']:'bqkj';
$n = [
    //央视
    'cctv4k' => 2000266303,//cccv-4k
    'cctv8k' => 2020603401,//cccv-8k
    'cctv1' => 2000210103,//cccv1
    'cctv2' => 2000203603,//cccv2
    'cctv3' => 2000203803,//cccv3(vip)
    'cctv4' => 2000204803,//cccv4
    'cctv5' => 2000205103,//cccv5
    'cctv5p' => 2000204503,//cccv5+
    'cctv6' => 2000203303,//cccv6(vip)
    'cctv7' => 2000510003,//cccv7
    'cctv8' => 2000203903,//cccv8(vip)
    'cctv9' => 2000499403,//cccv9
    'cctv10' => 2000203503,//CCTV10
    'cctv11' => 2000204103,//CCTV11
    'cctv12' => 2000202603,//CCTV12
    'cctv13' => 2000204603,//CCTV13
    'cctv14' => 2000204403,//CCTV14
    'cctv15' => 2000205003,//CCTV15
    'cctv16' => 2012375003,//CCTV16
    'cctv16-4k' => 2012492303,//CCTV16-4k(vip)
    'cctv17' => 2000204203,//CCTV17
    //央视数字
    'bqkj' => 2012513403,//CCTV兵器科技(vip)
    'dyjc' => 2012514403,//CCTV第一剧场(vip)
    'hjjc' => 2012511203,//CCTV怀旧剧场(vip)
    'fyjc' => 2012513603,//CCTV风云剧场(vip)
    'fyyy' => 2012514103,//CCTV风云音乐(vip)
    'fyzq' => 2012514203,//CCTV风云足球(vip)
    'dszn' => 2012514003,//CCTV电视指南(vip)
    'nxss' => 2012513903,//CCTV女性时尚(vip)
    'whjp' => 2012513803,//CCTV央视文化精品(vip)
    'sjdl' => 2012513303,//CCTV世界地理(vip)
    'gefwq' => 2012512503,//CCTV高尔夫网球(vip)
    'ystq' => 2012513703,//CCTV央视台球(vip)
    'wsjk' => 2012513503,//CCTV卫生健康(vip)
    //央视国际
    'cgtn' => 2001656803,//CGTN
    'cgtnjl' => 2010155403,//CGTN纪录
    'cgtne' => 2010152503,//CGTN西语
    'cgtnf' => 2010153503,//CGTN法语
    'cgtna' => 2010155203,//CGTN阿语
    'cgtnr' => 2010152603,//CGTN俄语
    //卫视
    'bjws' => 2000272103,//北京卫视
    'dfws' => 2000292403,//东方卫视
    'tjws' => 2019927003, //天津卫视
    'cqws' => 2000297803,//重庆卫视
    'hljws' => 2000293903,//黑龙江卫视
    'lnws' => 2000281303,//辽宁卫视
    'hbws' => 2000293403,//河北卫视
    'sdws' => 2000294803,//山东卫视
    'ahws' => 2000298003,//安徽卫视
    'hnws' => 2000296103,//河南卫视
    'hubws' => 2000294503,//湖北卫视
    'hunws' => 2000296203,//湖南卫视
    'jxws' => 2000294103,//江西卫视
    'jsws' => 2000295603,//江苏卫视
    'zjws' => 2000295503,//浙江卫视
    'dnws' => 2000292503,//东南卫视
    'gdws' => 2000292703,//广东卫视
    'szws' => 2000292203,//深圳卫视
    'gxws' => 2000294203,//广西卫视
    'gzws' => 2000293303,//贵州卫视
    'scws' => 2000295003,//四川卫视
    'xjws' => 2019927403, //新疆卫视
    'hinws' => 2000291503,//海南卫视
    ];
$cnlid = $n[$id];
$guid = "joidfjdaiofjsfjsdofdio";//随意字符或字符串
$salt = '0f$IVHi9Qno?G';
$platform = "5910204";
$key = hex2bin("48e5918a74ae21c972b90cce8af6c8be");
$iv = hex2bin("9a7e7d23610266b1d9fbf98581384d92");
$ts = time();
$el = "|{$cnlid}|{$ts}|mg3c3b04ba|V1.0.0|{$guid}|{$platform}|https://www.yangshipin.c|mozilla/5.0 (windows nt ||Mozilla|Netscape|Win32|";
$len = strlen($el);
$xl = 0;
for($i=0;$i<$len;$i++){
    $xl = ($xl << 5) - $xl + ord($el[$i]);
    $xl &= $xl & 0xFFFFFFFF;
    }

$xl = ($xl > 2147483648) ? $xl - 4294967296 : $xl;
$el = '|'.$xl.$el;
$ckey = "--01".strtoupper(bin2hex(openssl_encrypt($el,"AES-128-CBC",$key,1,$iv)));
$params = [
        "adjust"=>1,
        "appVer"=>"V1.0.0",
        "app_version"=>"V1.0.0",
        "cKey"=>$ckey,
        "channel"=>"ysp_tx",
        "cmd"=>"2",
        "cnlid"=>"{$cnlid}",
        "defn"=>"fhd",
        "devid"=>"devid",
        "dtype"=>"1",
        "encryptVer"=>"8.1",
        "guid"=>$guid,
        "otype"=>"ojson",
        "platform"=>$platform,
        "rand_str"=>"{$ts}",
        "sphttps"=>"1",
        "stream"=>"2"
        ];
$sign = md5(http_build_query($params).$salt);
$params["signature"] = $sign;
$bstrURL = "https://player-api.yangshipin.cn/v1/player/get_live_info";
$headers = [
        "Content-Type: application/json",
        "Referer: https://www.yangshipin.cn/",
        "Cookie: guid={$guid};vplatform=109",
        "Yspappid: 519748109",
];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $bstrURL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT,30);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
$data = curl_exec($ch);
curl_close($ch);
$json = json_decode($data);
if($json->code != 0){
	die($data);
}
$live = $json->data->playurl;
$burl = explode("{$n[$id]}.m3u8",$live)[0];
$d = file_get_contents($live);
$str = preg_replace("/(.*?.ts)/", $burl."$1",$d);
header("Content-Type: application/vnd.apple.mpegurl");
header("Content-Disposition: inline; filename=index.m3u8");
echo $str;
?>
