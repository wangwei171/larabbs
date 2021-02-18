<?php
namespace App\Handlers;

use GuzzleHttp\Client;
use Overtrue\Pinyin\Pinyin;

class SlugTranslateHandler{
	public function translate($text){
		$http=new Client;

		//初始化配置信息
		$api='http://api.fanyi.baidu.com/api/trans/vip/translate?';
		$appid=config('services.baidu_translate.appid');
		$key=config('services.baidu_translate.key');
		$salt=time();

		//如果没有使用百度翻译，则使用拼音
		if(empty($appid)||empty($key)){
			return $this->pinyin($text);
		}

		//根据百度翻译文档,生成sign签名
		$sign=md5($appid . $text . $salt . $key);

		//构建请求参数
		$query=http_build_query([
			"q" => $text,
			"from" => "zh",
			"to" => "en",
			"appid" => $appid,
			"salt" => $salt,
			"sign" => $sign,
		]);

		//发送http请求
		$response = $http->get($api.$query);

		$result = json_decode($response->getBody(),true);

		
		if(isset($result['trans_result'][0]['dst'])){
			return \Str::slug($result['trans_result'][0]['dst']);
		}else{
			return $this->pinyin($text);
		}
	}

	public function pinyin($text)
	{
		return \Str::slug(app(Pinyin::class)->permalink($text));
	}
}
