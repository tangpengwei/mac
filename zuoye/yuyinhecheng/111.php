<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/7
 * Time: 上午11:45
 */


require_once './aip-speech/AipSpeech.php';
$client = new AipSpeech('16189982', 'oYrUfskOH1HVgVbUdc3Tzxer','4zu9WFrejn95ctBHIbAUjjAa9wpKolyQ');

$result = $client->synthesis('哥哥弟弟坡前坐，坡上卧着一只鹅，坡下流着一条河，哥哥说：宽宽的河，弟弟说：白白的鹅。鹅要过河，河要渡鹅。不知是鹅过河，还是河渡鹅', 'zh', 1, array(
    'vol' => 5,
));

// 识别正确返回语音二进制 错误则返回json 参照下面错误码
if(!is_array($result)){
    file_put_contents('audio2.mp3', $result);
}







