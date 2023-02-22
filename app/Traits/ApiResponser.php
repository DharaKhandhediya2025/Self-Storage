<?php

namespace App\Traits;
use Twilio\Rest\Client;

trait ApiResponser {
	
	protected function success($data, $message = null, $code = 200,$extra='') {

		if($extra != '') {

			return response()->json([
				'status'=> 'Success', 
				'message' => $message,
				'code' => $code,
				'extra' => $extra,
				'data' => $data,
			], $code);
		}
		else {

			return response()->json([
				'status'=> 'Success', 
				'message' => $message,
				'code' => $code,
				'data' => $data
			], $code);
		}
	}

	protected function error($message = null, $code,$type=null) {

		return response()->json([
			'status'=>'Error',
			'message' => $message,
            'code' => $code,
			'data' => ($type != '') ? json_decode('{}') : json_decode('[]')
		], $code);
	}


	public function sendSms($receiverNumber,$message) {
		
        try {

            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");
  
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number, 
                'body' => $message
            ]);
  
            return true;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
	}
}