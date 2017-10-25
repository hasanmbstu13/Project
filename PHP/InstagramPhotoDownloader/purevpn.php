<?php  

class PureVPN{
	private $package_type = 'STANDARD';
	private $period = '#365';
	private $method = 'create';
	private $api = 'true';
	// Set your username here
	private $api_user = '';
	// set your password here
	private $api_password = '';
	// set your url here
	private $url = 'https://reseller.purevpn.com/partner/api.php';

	public function create_account()
	{
	    $params = array(
	        'package_type'  =>  $this->package_type,
	        'period'        =>  $this->period,
	        'method'        =>  $this->method,
	    );
	    $result = $this->_request($params);
	    return $result;
	}


	protected function _request(array $params)
	{
	    $params['API']          = $this->api;
	    $params['api_user']     = $this->api_user;
	    $params['api_password'] = $this->api_password;

	    //period param is always required for some strange reason
	    if(!isset($params['period'])) {
	        $params['period'] = $this->period;
	    }
	    $url = $this->url;
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL,               $url);
	    curl_setopt($ch, CURLOPT_REFERER,           $url);
	    curl_setopt($ch, CURLOPT_POST,              true);
	    curl_setopt($ch, CURLOPT_POSTFIELDS,        http_build_query($params));
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER,    true);
	    $result = curl_exec($ch);
	    if($result === false) {
	       sprintf('Curl Error: "%s"', curl_error($ch));
	        curl_close($ch);
	    }
	    curl_close($ch);
	    return $this->parse_response($result);
	}


	protected function parse_response($string)
	{
	    $xml = @simplexml_load_string($string);
	    if(!$xml) {
	        var_dump($string); exit;
	    }
	    $array = array();
	    foreach($xml as $k => $v) {
	        $array[$k] = (string)$v;
	    }
	    return $array;
	}
}

$purevpn = new PureVPN;
$purevpn->create_account();

