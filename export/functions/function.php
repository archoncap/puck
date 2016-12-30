<?php

function HY_0ba53c5574cdf0e656($HY_132d45c7edac376dd2)
{
    $HY_132d45c7edac376dd2 = base64_encode(gzcompress($HY_132d45c7edac376dd2));
    $HY_132d45c7edac376dd2 = strtr($HY_132d45c7edac376dd2, '+/=', '|_!');
    return $HY_132d45c7edac376dd2;
}

function HY_e65d63d2e7f247e7f3($HY_132d45c7edac376dd2)
{
    $HY_132d45c7edac376dd2 = strtr($HY_132d45c7edac376dd2, '|_!', '+/=');
    $HY_132d45c7edac376dd2 = gzuncompress(base64_decode($HY_132d45c7edac376dd2));
    return $HY_132d45c7edac376dd2;
}

//配匹某文件夹下的所有某种类型文件
function HY_e035c2690ec77d519b($HY_0e325b528787360045, $HY_5e72f1e293e2a883e4)
{
    if (ini_get('safe_mode')) {
        $HY_f3cdd85e330c9972b3 = dir($HY_0e325b528787360045);
        $HY_210e47d7650650eadb = array();
        while ($HY_71a9b4aa64681cc220 = $HY_f3cdd85e330c9972b3->read()) {
            if (is_file($HY_0e325b528787360045 . $HY_71a9b4aa64681cc220) && pathinfo($HY_71a9b4aa64681cc220, PATHINFO_EXTENSION) == $HY_5e72f1e293e2a883e4)
                $HY_210e47d7650650eadb[] = $HY_0e325b528787360045 . $HY_71a9b4aa64681cc220;
        }
        $HY_f3cdd85e330c9972b3->/* nothy */
        close();
        return $HY_210e47d7650650eadb;
    } else {
        return glob($HY_0e325b528787360045 . '*.' . $HY_5e72f1e293e2a883e4);
    }
}


function HY_64fa4a6b0beaf2effb()
{
    $HY_e8bb8401bff83e3881 = ADMINFOLDER;
    if (!is_file(KSSROOTDIR . $HY_e8bb8401bff83e3881 . DIRECTORY_SEPARATOR . 'z_datawin.php')) {
        $HY_78d6ca8df77fe307f1 = substr(KSSROOTDIR, 0, strlen(KSSROOTDIR) - 1);
        $HY_c021443f1400673a3f = @opendir($HY_78d6ca8df77fe307f1);
        if ($HY_c021443f1400673a3f !== false) {
            while ($HY_71a9b4aa64681cc220 = readdir($HY_c021443f1400673a3f)) {
                if ($HY_71a9b4aa64681cc220 == "." || $HY_71a9b4aa64681cc220 == "..")
                    continue;
                if (is_dir($HY_78d6ca8df77fe307f1 . DIRECTORY_SEPARATOR . $HY_71a9b4aa64681cc220) && is_file($HY_78d6ca8df77fe307f1 . DIRECTORY_SEPARATOR . $HY_71a9b4aa64681cc220 . DIRECTORY_SEPARATOR . 'z_datawin.php')) {
                    $HY_e8bb8401bff83e3881 = $HY_71a9b4aa64681cc220;
                    $HY_cf5e00773185720f33 = @file_get_contents(KSSINCDIR . 'config.php');
                    $HY_cf5e00773185720f33 = preg_replace('/define\(\'ADMINFOLDER\',\'[^\']*\'\)/i', 'define(\'ADMINFOLDER\',\'' . $HY_e8bb8401bff83e3881 . '\')', $HY_cf5e00773185720f33);
                    @file_put_contents(KSSINCDIR . 'config.php', $HY_cf5e00773185720f33);
                    break;
                }
            }
            closedir($HY_c021443f1400673a3f);
        }
    }
    return $HY_e8bb8401bff83e3881;
}



function get_domain()
{
    $domain = 'http://' . $_SERVER['SERVER_NAME'];
    if ($_SERVER['SERVER_PORT'] != 80)
        $domain .= ':' . $_SERVER['SERVER_PORT'];
    return $domain;
}


function HY_96900e7ec460c119a8()
{
    $HY_afcd9053b82d0c298c = (!function_exists('memory_get_usage')) ? '0' : round(memory_get_usage() / 1024 / 1024, 2) . 'MB';
    return $HY_afcd9053b82d0c298c;
}

function HY_fd9f3b1ac3fb59f79c()
{
    return intval(time() / 86400 - 15000);
}


function IsMainServer()
{
    if (SVRID != 1)
        show_error('备服禁止此操作！');
}



function HY_3ccc4a940ab232edba($HY_f1b6bbe6bd49ea469a)
{
    if (HY_dfb1615822521bedae('usleep') == true) {
        usleep($HY_f1b6bbe6bd49ea469a * 1000);
    } else {
        $HY_ee1fc6e2c5429b1b7a = HY_341abc6b88ca9493b6();
        while ((HY_341abc6b88ca9493b6() - $HY_ee1fc6e2c5429b1b7a) * 1000 < $HY_f1b6bbe6bd49ea469a) {
            get_random_str(100);
        }
    }
}


function HY_dfb1615822521bedae($HY_1cfbcc076011800470)
{
    if (!function_exists($HY_1cfbcc076011800470))
        return false;
    $HY_1872b7b6f7a8c8c8b1 = ini_get("safe_mode");
    $HY_26df63d59cfdb47cd3 = array('set_time_limit');
    $HY_0837e8c6f127527d18 = ini_get("disable_functions");
    $HY_0837e8c6f127527d18 = str_replace(' ', '', $HY_0837e8c6f127527d18);
    if (!empty($HY_0837e8c6f127527d18)) {
        $HY_24f93da8c7490a8acd = explode(',', $HY_0837e8c6f127527d18);
        if (in_array($HY_1cfbcc076011800470, $HY_24f93da8c7490a8acd))
            return false;
    }
    if (!empty($HY_1872b7b6f7a8c8c8b1)) {
        if (in_array($HY_1cfbcc076011800470, $HY_26df63d59cfdb47cd3))
            return false;
    }

    return true;
}




function HY_341abc6b88ca9493b6()
{
    list($HY_aa91e2583c856ea9c3, $HY_a7ca7649b76f5a88f3) = explode(' ', microtime());
    return ((float)$HY_aa91e2583c856ea9c3 + (float)$HY_a7ca7649b76f5a88f3);
}
function HY_b0520f9d50096e17e3($HY_da6c0c5b359287b3ca)
{
    $HY_7b2c6850a0abc72a32 = count($HY_da6c0c5b359287b3ca);

    $HY_0ead9de451e9eee315 = 0;
    for ($HY_ca813622bba21699ac = 0; $HY_ca813622bba21699ac < $HY_7b2c6850a0abc72a32; $HY_ca813622bba21699ac = $HY_ca813622bba21699ac + 2) {
        $HY_0ead9de451e9eee315 = $HY_0ead9de451e9eee315 + $HY_da6c0c5b359287b3ca[$HY_ca813622bba21699ac + 1] - $HY_da6c0c5b359287b3ca[$HY_ca813622bba21699ac];
    }
    return round($HY_0ead9de451e9eee315 * 1000, 3);
}



function HY_4137039967b85c29c4($HY_1d7de239d366c618e5, $HY_38b81d2e5ef38c0a9f, $HY_341abc6b88ca9493b6 = 3600)
{
    $HY_38b81d2e5ef38c0a9f = HY_38e9124b6db77c4227($HY_38b81d2e5ef38c0a9f, COOKKEY2);
    if ($HY_341abc6b88ca9493b6 != 0) {
        setcookie($HY_1d7de239d366c618e5, $HY_38b81d2e5ef38c0a9f, time() + 86400, '/');
        setcookie($HY_1d7de239d366c618e5 . '_ver', HY_c91798f75082c66397($HY_38b81d2e5ef38c0a9f), time() + 86400, '/');
    } else {
        setcookie($HY_1d7de239d366c618e5, $HY_38b81d2e5ef38c0a9f, 0, '/');
        setcookie($HY_1d7de239d366c618e5 . '_ver', HY_c91798f75082c66397($HY_38b81d2e5ef38c0a9f), 0, '/');
    }
}




function HY_dedea2d7b14603b966($HY_1d7de239d366c618e5)
{
    $HY_38b81d2e5ef38c0a9f = var_get($HY_1d7de239d366c618e5, 'c', 'sql', '');

    if ($HY_38b81d2e5ef38c0a9f == '')
        return $HY_38b81d2e5ef38c0a9f;

    $HY_96702b8e026a6b28cb = var_get($HY_1d7de239d366c618e5 . '_ver', 'c', 'sql', '');

    if ($HY_38b81d2e5ef38c0a9f == '')
        return $HY_38b81d2e5ef38c0a9f;
    if (HY_c91798f75082c66397($HY_38b81d2e5ef38c0a9f) != $HY_96702b8e026a6b28cb) {
        setcookie($HY_1d7de239d366c618e5, '');
        setcookie($HY_1d7de239d366c618e5 . '_ver', '');
        return false;
    } else {
        return HY_1669f24ec493e84c88($HY_38b81d2e5ef38c0a9f, COOKKEY2);
    }

}



function HY_38e9124b6db77c4227($HY_068a154433bfa66642, $HY_5cdc69344c198380c8)
{
    $HY_5c39676c5edd472f95 = md5(time() . mt_rand(0, 32000));
    $HY_a212b3dbe2207b0e60 = 0;
    $HY_f2d4d297909142e663 = '';
    for ($HY_ca813622bba21699ac = 0; $HY_ca813622bba21699ac < strlen($HY_068a154433bfa66642); $HY_ca813622bba21699ac++) {
        $HY_a212b3dbe2207b0e60 = $HY_a212b3dbe2207b0e60 == strlen($HY_5c39676c5edd472f95) ? 0 : $HY_a212b3dbe2207b0e60;
        $HY_f2d4d297909142e663 .= $HY_5c39676c5edd472f95[$HY_a212b3dbe2207b0e60] . ($HY_068a154433bfa66642[$HY_ca813622bba21699ac] ^ $HY_5c39676c5edd472f95[$HY_a212b3dbe2207b0e60++]);
    }
    return base64_encode(HY_866b45d17a78968fb1($HY_f2d4d297909142e663, $HY_5cdc69344c198380c8));
}



function HY_1669f24ec493e84c88($HY_068a154433bfa66642, $HY_5cdc69344c198380c8)
{
    $HY_068a154433bfa66642 = HY_866b45d17a78968fb1(base64_decode($HY_068a154433bfa66642), $HY_5cdc69344c198380c8);
    $HY_f2d4d297909142e663 = '';
    for ($HY_ca813622bba21699ac = 0; $HY_ca813622bba21699ac < strlen($HY_068a154433bfa66642); $HY_ca813622bba21699ac++) {
        $HY_811d04e9b8529aeb34 = $HY_068a154433bfa66642[$HY_ca813622bba21699ac];
        $HY_f2d4d297909142e663 .= $HY_068a154433bfa66642[++$HY_ca813622bba21699ac] ^ $HY_811d04e9b8529aeb34;
    }
    return $HY_f2d4d297909142e663;
}

function HY_866b45d17a78968fb1($HY_068a154433bfa66642, $HY_5c39676c5edd472f95)
{
    $HY_5c39676c5edd472f95 = md5($HY_5c39676c5edd472f95);
    $HY_a212b3dbe2207b0e60 = 0;
    $HY_f2d4d297909142e663 = '';
    for ($HY_ca813622bba21699ac = 0; $HY_ca813622bba21699ac < strlen($HY_068a154433bfa66642); $HY_ca813622bba21699ac++) {
        $HY_a212b3dbe2207b0e60 = $HY_a212b3dbe2207b0e60 == strlen($HY_5c39676c5edd472f95) ? 0 : $HY_a212b3dbe2207b0e60;
        $HY_f2d4d297909142e663 .= $HY_068a154433bfa66642[$HY_ca813622bba21699ac] ^ $HY_5c39676c5edd472f95[$HY_a212b3dbe2207b0e60++];
    }
    return $HY_f2d4d297909142e663;
}



function HY_c91798f75082c66397($HY_25c1341af8eb0bea07, $HY_1df12e9f0ffd72883a = 32)
{
    if ($HY_25c1341af8eb0bea07 == '')
        return '';
    $HY_04d91acf2cdb91d393 = md5(COOKKEY . get_client_ip(1) . $HY_25c1341af8eb0bea07);
    $HY_04d91acf2cdb91d393 = substr($HY_04d91acf2cdb91d393, 0, $HY_1df12e9f0ffd72883a);
    return $HY_04d91acf2cdb91d393;
}



function dmd5($str, $length = 32)
{
    $tmp = md5(MD5KEY . chr(102) . chr(104) . chr(117) . chr(111) . chr(121) . chr(117) . chr(110) . $str);
    $tmp = substr($tmp, 0, $length);
    return $tmp;
}



function HY_061291218ddafe5dd5($HY_2df80c02af12ffaf45 = 'K')
{
    list($HY_d4f21ff871e7ccb2cb, $HY_63283b0215201b17de) = explode(' ', microtime());
    return $HY_2df80c02af12ffaf45 . substr(date('ymdHis'), 1) . substr($HY_d4f21ff871e7ccb2cb, 2, 6) . get_random_str(6);
}






function HY_0fb81282e37132d087($HY_da8fd81f9c7a80b996, $HY_b086da9585a8db37fc = 1)
{
    $HY_f07bd945505238dc09 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $HY_7e58ab2d9b278a271f = '';
    do {
        $HY_7e58ab2d9b278a271f = $HY_f07bd945505238dc09[$HY_da8fd81f9c7a80b996 % 52] . $HY_7e58ab2d9b278a271f;
        $HY_da8fd81f9c7a80b996 = intval($HY_da8fd81f9c7a80b996 / 52);
    } while ($HY_da8fd81f9c7a80b996 != 0);
    $HY_7e58ab2d9b278a271f = get_random_str(5 - strlen($HY_7e58ab2d9b278a271f), 1) . $HY_7e58ab2d9b278a271f;
    if ($HY_b086da9585a8db37fc == 1) {
        $HY_42e9c1fdf6a17edab9 = chr(mt_rand(65, 90));
    } else {
        $HY_42e9c1fdf6a17edab9 = chr(mt_rand(97, 122));
    }

    $HY_688fba6e5519ed4537 = array();
    $HY_688fba6e5519ed4537[] = $HY_42e9c1fdf6a17edab9 . $HY_7e58ab2d9b278a271f;
    $HY_688fba6e5519ed4537[] = get_random_str(22);
    return $HY_688fba6e5519ed4537;
}






function get_random_str($count_max, $type = 0)
{
    $result = '';
    for ($i = 0; $i < $count_max; $i++) {
        if ($type == 1) {
            $result .= mt_rand(0, 9);
        } else {
            $subType = mt_rand(0, 2);
            if ($subType == 0) {
                $result .= mt_rand(0, 9);
            } elseif ($subType == 1) {
                $result .= chr(mt_rand(65, 90));
            } else {
                $result .= chr(mt_rand(97, 122));
            }
        }
    }
    $result = strtr($result, "eEoO0", "iIpP8");
    $result = str_ireplace('char', 'Dhar', $result);
    return $result;
}


function HY_3a4af7ba1f927306de($HY_38b81d2e5ef38c0a9f)
{
    if (preg_match('/^(\d{4,4})-(\d{2,2})-(\d{2,2}) (\d{2,2}):(\d{2,2}):(\d{2,2})$/', $HY_38b81d2e5ef38c0a9f) && strlen($HY_38b81d2e5ef38c0a9f) == 19) {
        return true;
    } else {
        return false;
    }
}


function date_time_format($time = 0, $format = 'Y-m-d H:i:s')
{
    if ($time == 0) {
        return date($format);
    } else {
        return date($format, $time);
    }

}


function HY_68ab96309091d168ea($HY_38b81d2e5ef38c0a9f)
{
    $HY_e2dfdfcfa80cb810cf = unpack("C*", $HY_38b81d2e5ef38c0a9f);
    foreach ($HY_e2dfdfcfa80cb810cf as $HY_699d13d5140d1ddb02) {
        if ($HY_699d13d5140d1ddb02 < 48 || $HY_699d13d5140d1ddb02 > 57)
            return false;
    }
    return true;
}


//获取处理过的值
function var_get($par, $type, $var_type = 'sql', $default = '0')
{
    $ret = '';
    Switch (strtoupper($type)) {
        Case "GP":
            if (isset($_GET[$par])) {
                $ret = $_GET[$par];
            } else {
                if (isset($_POST[$par])) {
                    $ret = $_POST[$par];
                } else {
                    $ret = $default;
                }
            }
            break;
        Case "PG":
            if (isset($_POST[$par])) {
                $ret = $_POST[$par];
            } else {
                if (isset($_GET[$par])) {
                    $ret = $_GET[$par];
                } else {
                    $ret = $default;
                }
            }
            break;
        Case "G":
            if (isset($_GET[$par])) {
                $ret = $_GET[$par];
            } else {
                $ret = $default;
            }
            break;
        Case "P":
            if (isset($_POST[$par])) {
                $ret = $_POST[$par];
            } else {
                $ret = $default;
            }
            break;
        Case "C":
            if (isset($_COOKIE[$par])) {
                $ret = $_COOKIE[$par];
            } else {
                $ret = $default;
            }
            break;
        default:
            return '0';
    }
    if (is_array($ret)) {
        $ret = implode(',', $ret);
    }
    if (get_magic_quotes_gpc())
        $ret = stripslashes($ret);
    Switch (strtolower($var_type)) {
        Case "sql":
            if (preg_match('/select|insert|update|delete|union|into|load_file|outfile|char|0x[0-9a-f]{6}|\.\/|\*|\'/i', $ret)) {
                ob_clean();
                $ret = preg_replace('/(select|insert|update|delete|union|into|load_file|outfile|char|0x[0-9a-f]{6}|\.\/|\*|\')/i', '<font color=red>$1</font>', $ret);
                exit('<p>MySQL injection:' . $type . ',' . $par . ',' . $ret . '</p>');
            }
            break;
        Case "int":
            if (!HY_68ab96309091d168ea($ret))
                $ret = $default;
            break;
        Case "num":
            if (!is_numeric($ret))
                $ret = $default;
            break;
        Case "time":
            if (!HY_3a4af7ba1f927306de($ret))
                $ret = $default;
            if ($ret == '0')
                $ret = '2000-01-01 00:00:00';
            break;
        default:

    }
    return $ret;
}
/**
 * 获取客户端IP地址
 * @param integer $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
 * @param boolean $adv 是否进行高级模式获取（有可能被伪装）
 * @return mixed
 */
function get_client_ip($type = 0, $adv = true)
{
    $type = $type ? 1 : 0;
    static $ip = null;
    if (null !== $ip) {
        return $ip[$type];
    }
    if ($adv) {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $pos = array_search('unknown', $arr);
            if (false !== $pos) {
                unset($arr[$pos]);
            }
            $ip = trim($arr[0]);
        } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
    } elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    // IP地址合法验证
    $long = sprintf("%u", ip2long($ip));
    $ip = $long ? array($ip, $long) : array('0.0.0.0', 0);
    return $ip[$type];
}

function HY_c86cecb5dd1322eb5f($HY_e33ee115894afb37ac, $HY_ca813622bba21699ac)
{
    preg_match_all("/./us", $HY_e33ee115894afb37ac, $HY_508c11b0718f5e0f71);
    $HY_e8bb8401bff83e3881 = '';
    foreach ($HY_508c11b0718f5e0f71[0] as $HY_5cdc69344c198380c8 => $HY_80beaf4b172a958c3d) {
        if ($HY_5cdc69344c198380c8 < $HY_ca813622bba21699ac) {
            $HY_e8bb8401bff83e3881 .= $HY_80beaf4b172a958c3d;
        } else {
            break;
        }
    }
    if (count($HY_508c11b0718f5e0f71[0]) > $HY_ca813622bba21699ac)
        $HY_e8bb8401bff83e3881 .= '…';
    return $HY_e8bb8401bff83e3881;
}

function HY_57fa93367dadd07e11($HY_e33ee115894afb37ac = null)
{
    preg_match_all("/./us", $HY_e33ee115894afb37ac, $HY_508c11b0718f5e0f71);
    return count($HY_508c11b0718f5e0f71[0]);
}


function HY_592a454c50b15a089d($HY_c0f6b034f31c78e434, $HY_016045f458bbbf4eb2 = "GBK", $HY_609b2bd33b58a59469 = "utf-8")
{
    $HY_04ccbb3aeb8d5b165e = "";
    if (function_exists("mb_convert_encoding")) {
        $HY_0dc9685ac7fed47d29 = mb_convert_encoding($HY_c0f6b034f31c78e434, $HY_609b2bd33b58a59469, $HY_016045f458bbbf4eb2);
    } elseif (function_exists("iconv")) {
        $HY_0dc9685ac7fed47d29 = iconv($HY_016045f458bbbf4eb2, $HY_609b2bd33b58a59469, $HY_c0f6b034f31c78e434);
    } else die("sorry, you have no libs support for charset change.");
    return $HY_0dc9685ac7fed47d29;
}


function show_error($HY_aec22a17d9808a8307, $HY_dd3340f112a2aeeef0 = 0, $HY_ceeedc59e1d17400a8 = ''){
global $HY_10eabf7bbb517a5c1a;
if (empty($HY_10eabf7bbb517a5c1a))
    ob_clean();
$HY_5bf1eb26d5fa7beefd = var_get('isajax', 'pg', 'int', 0);
if($HY_5bf1eb26d5fa7beefd == 0){
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>MsgBox</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="<?php echo INSTALLPATH ?>kss_inc/style/admin_style.css">
</head>
<body>
<div id="errbox">&nbsp;<?php
    echo $HY_aec22a17d9808a8307 . '<br><br>';
    if ($HY_dd3340f112a2aeeef0 == 1) {
        echo '<p align=center><input type=\'button\' class=\'submitbtn\' value=\'返回\' onclick=\'history.go(-1)\'></p>';
    }
    ?></div>
</body>
</html><?php
exit();
}
else {
    exit($HY_aec22a17d9808a8307);
}
}


function HY_0f81fb70aee00cd7e9($HY_98f4d0bcdedf5c561d, $HY_9d2379772aaccf2dfe, $HY_0aaf36e09eed98523e = 25)
{
    if (!HY_dfb1615822521bedae('curl_init') || !HY_dfb1615822521bedae('curl_exec'))
        return 'curlerr:php not curl';
    if (!HY_dfb1615822521bedae('curl_exec'))
        return 'curlerr:curl_exec disable';
    $HY_9915192b02df4e692f = curl_init();
    curl_setopt($HY_9915192b02df4e692f, CURLOPT_URL, $HY_98f4d0bcdedf5c561d);
    curl_setopt($HY_9915192b02df4e692f, CURLOPT_RETURNTRANSFER, 1);
    if (!empty($HY_9d2379772aaccf2dfe)) {
        $HY_132d45c7edac376dd2 = '';
        foreach ($HY_9d2379772aaccf2dfe as $HY_5cdc69344c198380c8 => $HY_80beaf4b172a958c3d) {
            $HY_132d45c7edac376dd2 .= $HY_5cdc69344c198380c8 . '=' . $HY_80beaf4b172a958c3d . '&';
        }
        $HY_132d45c7edac376dd2 .= 'nowtime=' . time();
        curl_setopt($HY_9915192b02df4e692f, CURLOPT_POST, 1);
        curl_setopt($HY_9915192b02df4e692f, CURLOPT_POSTFIELDS, $HY_132d45c7edac376dd2);
    }
    curl_setopt($HY_9915192b02df4e692f, CURLOPT_TIMEOUT, $HY_0aaf36e09eed98523e);
    curl_setopt($HY_9915192b02df4e692f, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)");
    curl_setopt($HY_9915192b02df4e692f, CURLOPT_HTTPHEADER, array('Accept-Language: zh-cn', 'Connection: Keep-Alive', 'Cache-Control: no-cache'));
    $HY_d67db4dabcd449fae1 = curl_exec($HY_9915192b02df4e692f);
    if (curl_errno($HY_9915192b02df4e692f)) {
        $HY_89e50a75e8aac13ede = curl_error($HY_9915192b02df4e692f);
        curl_close($HY_9915192b02df4e692f);
        if ($HY_0aaf36e09eed98523e == 1 && stripos($HY_89e50a75e8aac13ede, 'peration timed out after') != false) {
            return 'sendok';
        }
        $HY_d67db4dabcd449fae1 = 'curlerr:' . $HY_89e50a75e8aac13ede;
    } else {
        curl_close($HY_9915192b02df4e692f);
    }
    return $HY_d67db4dabcd449fae1;
}


function HY_420151363d56a4cbc7($HY_d9fa912b131274e0c5, $HY_95f1cff5f1ea4da515, $HY_150c59c98a1086f215, $HY_69630ae39cb75946c5)
{
    $HY_e9f5445c6b51b785fc = KSSLOGDIR . 'query_errlog.php';
    if (!is_file($HY_e9f5445c6b51b785fc) || filesize($HY_e9f5445c6b51b785fc) > 1024 * 256) {
        $HY_99a386bb1ff8ff0231 = '?';
        $HY_2883f1fee73f58351d = '<' . $HY_99a386bb1ff8ff0231 . 'php exit(\'Access denied to view this page!\');' . $HY_99a386bb1ff8ff0231 . ">\r\n";
        @file_put_contents($HY_e9f5445c6b51b785fc, $HY_2883f1fee73f58351d . $HY_d9fa912b131274e0c5 . "\r\n file:" . basename($HY_150c59c98a1086f215) . '	line:' . $HY_69630ae39cb75946c5 . '	err:' . $HY_95f1cff5f1ea4da515 . "\r\n\r\n");
    } else {
        @file_put_contents($HY_e9f5445c6b51b785fc, $HY_d9fa912b131274e0c5 . "\r\n file:" . basename($HY_150c59c98a1086f215) . '	line:' . $HY_69630ae39cb75946c5 . '	err:' . $HY_95f1cff5f1ea4da515 . "\r\n\r\n", FILE_APPEND);
    }
}

//2为直接输出数组
function show_json($arr,$type=2)
{
    if(isset($arr['status']) && $type==2){
        $ret=$arr;
    }
    else{
        $ret['status'] = $type;
        $ret['data'] = $arr;
    }

    $obj = json_encode($ret);
    header('Content-Type: application/json');
    echo $obj;
    exit();
}

function success($arr)
{
    show_json($arr,1);
}

function error($arr)
{
/*    $db=\MysqliDb::getInstance();
    $db->_transaction_status_check();*/
    show_json($arr,0);
}
function not_found($str='page not found,that is all we know!'){
    header('HTTP/1.1 404 Not Found');
    header("status: 404 Not Found");
    exit($str);
}


/**

 * 数据签名认证

 * @param  array  $data 被认证的数据

 * @return string       签名

 * @author 麦当苗儿 <zuojiazi@vip.qq.com>

 */
function data_auth_sign($data) {
    //数据类型检测

    if(!is_array($data)){

        $data = (array)$data;
    }
    ksort($data); //排序
    $code = http_build_query($data); //url编码并生成query字符串
    $sign = sha1($code); //生成签名
    return $sign;
}
/**
 * session管理函数
 * @param string|array $name session名称 如果为数组则表示进行session设置
 * @param mixed $value session值
 * @return mixed
 */
function session($name = '', $value = '') {
    if (is_array($name)) {

        if (isset($name['id'])) {
            session_id($name['id']);
        }

        if (isset($name['name'])) {
            session_name($name['name']);
        }

        if (isset($name['path'])) {
            session_save_path($name['path']);
        }

        if (isset($name['domain'])) {
            ini_set('session.cookie_domain', $name['domain']);
        }

        if (isset($name['expire'])) {
            ini_set('session.gc_maxlifetime', $name['expire']);
            ini_set('session.cookie_lifetime', $name['expire']);
        }
        if (isset($name['use_trans_sid'])) {
            ini_set('session.use_trans_sid', $name['use_trans_sid'] ? 1 : 0);
        }

        if (isset($name['use_cookies'])) {
            ini_set('session.use_cookies', $name['use_cookies'] ? 1 : 0);
        }

        if (isset($name['cache_limiter'])) {
            session_cache_limiter($name['cache_limiter']);
        }

        if (isset($name['cache_expire'])) {
            session_cache_expire($name['cache_expire']);
        }
        session_start();
    } elseif ('' === $value) {
        if ('' === $name) {
            // 获取全部的session
            return $_SESSION;
        } elseif (0 === strpos($name, '[')) {
            // session 操作
            if ('[pause]' == $name) {// 暂停session
                session_write_close();
            } elseif ('[start]' == $name) {
                // 启动session
                session_start();
            } elseif ('[destroy]' == $name) {
                // 销毁session
                $_SESSION = array();
                session_unset();
                session_destroy();
            } elseif ('[regenerate]' == $name) {
                // 重新生成id
                session_regenerate_id();
            }
        }else {
            if (strpos($name, '.')) {
                list($name1, $name2) = explode('.', $name);
                return isset($_SESSION[$name1][$name2]) ? $_SESSION[$name1][$name2] : null;
            } else {
                return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
            }
        }
    } elseif (is_null($value)) {
        // 删除session
        if (strpos($name, '.')) {
            list($name1, $name2) = explode('.', $name);
            unset($_SESSION[$name1][$name2]);
        } else {
            unset($_SESSION[$name]);
        }
    } else {
        // 设置session
        if (strpos($name, '.')) {
            list($name1, $name2) = explode('.', $name);
            $_SESSION[$name1][$name2] = $value;
        } else {
            $_SESSION[$name] = $value;
        }
    }
    return null;
}


function admin_is_login(){
    $user = session('admin_user_auth');
    if (empty($user)) {
        return 0;
    } else {
        $auth_sign=session('admin_user_auth_sign');
        if(data_auth_sign($user)!=$auth_sign){
            return 0;
        }
        return $user['uid'];
    }
}

/**
 * 获取输入参数 支持过滤和默认值
 * 使用方法:
 * <code>
 * I('id',0); 获取id参数 自动判断get或者post
 * I('post.name','','htmlspecialchars'); 获取$_POST['name']
 * I('get.'); 获取$_GET
 * </code>
 * @param string $name 变量的名称 支持指定类型
 * @param mixed $default 不存在的时候默认值
 * @param mixed $filter 参数过滤方法
 * @param mixed $datas 要获取的额外数据源
 * @return mixed
 */
function I($name, $default = '', $filter = null, $datas = null)
{
    static $_PUT = null;
    if (strpos($name, '/')) {
        // 指定修饰符
        list($name, $type) = explode('/', $name, 2);
    } else{
        // 默认强制转换为字符串
        $type = 's';
    }
    if (strpos($name, '.')) {
        // 指定参数来源
        list($method, $name) = explode('.', $name, 2);
    } else {
        // 默认为自动判断
        $method = 'param';
    }
    switch (strtolower($method)) {
        case 'get':
            $input = &$_GET;
            break;
        case 'post':
            $input = &$_POST;
            break;
        case 'put':
            if (is_null($_PUT)) {
                parse_str(file_get_contents('php://input'), $_PUT);
            }
            $input = $_PUT;
            break;
        case 'param':
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'POST':
                    $input = $_POST;
                    break;
                case 'PUT':
                    if (is_null($_PUT)) {
                        parse_str(file_get_contents('php://input'), $_PUT);
                    }
                    $input = $_PUT;
                    break;
                default:
                    $input = $_GET;
            }
            break;
        case 'path':
            $input = array();
            if (!empty($_SERVER['PATH_INFO'])) {
                $depr  = C('URL_PATHINFO_DEPR');
                $input = explode($depr, trim($_SERVER['PATH_INFO'], $depr));
            }
            break;
        case 'request':
            $input = &$_REQUEST;
            break;
        case 'session':
            $input = &$_SESSION;
            break;
        case 'cookie':
            $input = &$_COOKIE;
            break;
        case 'server':
            $input = &$_SERVER;
            break;
        case 'globals':
            $input = &$GLOBALS;
            break;
        case 'data':
            $input = &$datas;
            break;
        default:
            return null;
    }
    if ('' == $name) {
        // 获取全部变量
        $data    = $input;
        $filters = isset($filter) ? $filter : 'htmlspecialchars';
        if ($filters) {
            if (is_string($filters)) {
                $filters = explode(',', $filters);
            }
            foreach ($filters as $filter) {
                $data = array_map_recursive($filter, $data); // 参数过滤
            }
        }
    } elseif (isset($input[$name])) {
        // 取值操作
        $data    = $input[$name];
        $filters = isset($filter) ? $filter : 'htmlspecialchars';
        if ($filters) {
            if (is_string($filters)) {
                if (0 === strpos($filters, '/')) {
                    if (1 !== preg_match($filters, (string) $data)) {
                        // 支持正则验证
                        return isset($default) ? $default : null;
                    }
                } else {
                    $filters = explode(',', $filters);
                }
            } elseif (is_int($filters)) {
                $filters = array($filters);
            }

            if (is_array($filters)) {
                foreach ($filters as $filter) {
                    $filter = trim($filter);
                    if (function_exists($filter)) {
                        $data = is_array($data) ? array_map_recursive($filter, $data) : $filter($data); // 参数过滤
                    } else {
                        $data = filter_var($data, is_int($filter) ? $filter : filter_id($filter));
                        if (false === $data) {
                            return isset($default) ? $default : null;
                        }
                    }
                }
            }
        }
        if (!empty($type)) {
            switch (strtolower($type)) {
                case 'a':    // 数组
                    $data = (array) $data;
                    break;
                case 'd':    // 数字
                    $data = (int) $data;
                    break;
                case 'f':    // 浮点
                    $data = (float) $data;
                    break;
                case 'b':    // 布尔
                    $data = (boolean) $data;
                    break;
                case 's':// 字符串
                default:
                    $data = (string) $data;
            }
        }
    } else {
        // 变量默认值
        $data = isset($default) ? $default : null;
    }
    is_array($data) && array_walk_recursive($data, 'think_filter');
    return $data;
}
function array_map_recursive($filter, $data)
{
    $result = array();
    foreach ($data as $key => $val) {
        $result[$key] = is_array($val)
            ? array_map_recursive($filter, $val)
            : call_user_func($filter, $val);
    }
    return $result;
}
function think_filter(&$value)
{
    // TODO 其他安全过滤

    // 过滤查询特殊字符
    if (preg_match('/^(EXP|NEQ|GT|EGT|LT|ELT|OR|XOR|LIKE|NOTLIKE|NOT BETWEEN|NOTBETWEEN|BETWEEN|NOTIN|NOT IN|IN)$/i', $value)) {
        $value .= ' ';
    }
}