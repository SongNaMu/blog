<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExtentionController extends Controller
{
    //
    public function test(Request $req){
      $word = $req->word;
      $ch = curl_init();
      return "" . $word . "!";
    }

    public function dictest(){
			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://systran-systran-platform-for-language-processing-v1.p.rapidapi.com/translation/text/translate?source=%7Bsource%7D&target=%7Btarget%7D&input=%7Binput%7D",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => array(
		"x-rapidapi-host: systran-systran-platform-for-language-processing-v1.p.rapidapi.com",
		"x-rapidapi-key: d546aa477dmsh7c4f6ff911c28e5p179209jsn5310b2d7ae4b"
				),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
	
		curl_close($curl);
	
		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			echo $response;
		}
  }
}
