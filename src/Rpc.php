<?php
namespace gaterpc;
use Hprose\Client;
class Rpc{
	protected $client;
	protected $baseurl;
	protected $guid;
	public function __construct($guid,$baseurl="http://127.0.0.1:6062"){
		$this->baseurl = $baseurl;
		$this->guid = $guid;
		$this->client = Client::create($this->baseurl,false);
	}

	protected function DoRequest($url,$data){
		$curl = curl_init();
		$header=['Content-type:application/octet-stream','User-Agent:MicroMessenger Client','Accept:*/*', 'Cache-Control:no-cache','Upgrade:mmtls'];
		curl_setopt($curl, CURLOPT_URL, $url);
        	curl_setopt($curl, CURLOPT_TIMEOUT,5);
        	curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        	curl_setopt($curl, CURLOPT_POST, true);
        	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		$res = curl_exec($curl);
		if($err = curl_error($curl)){
			exit($err);
		}
		curl_close($curl);
		return $res;
	}

	protected function Request($encoder){
		$encoder->response->data  = $this->DoRequest($encoder->url,$encoder->response->data);
		return $encoder;
	}
	
	public function GetQrcode(){
		$encoder = $this->client->GetQrcode($this->guid);
		if($encoder->code<0) return $encoder;
		return $this->client->GetQrcode($this->guid,$this->Request($encoder)->response);
	}

	public function CheckQrcode(){
		$encoder = $this->client->CheckQrcode($this->guid);
		if($encoder->code<0 || $encoder->code==1) return $encoder;
		$decoder = $this->client->CheckQrcode($this->guid,$this->Request($encoder)->response);
		return $decoder->flag==2 ? $this->client->ManualAuth($this->guid,$this->Request($decoder)->response):$decoder;
	}
	
	public function LogOut(){
		$encoder = $this->client->LogOut($this->guid);
                if($encoder->code<0) return $encoder;
                return $this->client->LogOut($this->guid,$this->Request($encoder)->response);
	}
}
