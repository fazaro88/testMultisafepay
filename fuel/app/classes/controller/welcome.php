<?php
/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Welcome extends Controller
{
	public function action_index()
	{
        $transactionId = Input::get('transactionId');
        if (isset($transactionId)) {
            $responseXML = $this->callAPI($transactionId);
            $dataToView = $this->parseXML($responseXML);
            return Response::forge(View::forge('welcome/index', $dataToView));
        } else {
            return Response::forge(View::forge('welcome/index'));
        }
    }
    
    public function action_404()
	{
		return Response::forge(Presenter::forge('welcome/404'), 404);
    }

    private function callAPI($transaction) {
        $curl = curl_init();
        
        curl_setopt_array($curl, 
            array(
                CURLOPT_URL => 'https://devapi.multisafepay.com/ewx/',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '<?xml version="1.0" encoding="UTF-8"?><status ua="custom-1.1"><merchant><account>11018887</account><site_id>393</site_id><site_secure_code>970443</site_secure_code></merchant><transaction><id>' . $transaction .'</id></transaction></status>',
                CURLOPT_HTTPHEADER => array(
                    'cache-control: no-cache',
                    'content-type: application/xml',
                )
            )
        );
       
        $response = curl_exec($curl);
    
        curl_close($curl);

        return $response;
    }

    private function parseXML($responseXML) {
        $oXML = new SimpleXMLElement($responseXML);
        $result = [];

        if (isset($oXML->error)) {
            // ERROR
            $result['error'] = [];
            $result['error']['code'] = $oXML->error->code;
            $result['error']['description'] = $oXML->error->description;
        } else {
            // EWALLET
            $result['ewallet'] = [];
            $result['ewallet']['id'] = $oXML->ewallet->id;
            $result['ewallet']['status'] = $oXML->ewallet->status;
            $result['ewallet']['financialstatus'] = $oXML->ewallet->financialstatus;
            $result['ewallet']['fastcheckout'] = $oXML->ewallet->fastcheckout;
            $created = $oXML->ewallet->created;
            $date = mktime(substr($created,-6,2), substr($created,-4,2), substr($created,-2,2), 
                        substr($created,4,2), substr($created,6,2), substr($created,0,4));
            $result['ewallet']['created'] = date("d-m-Y G:i:s", $date);
            $modified = $oXML->ewallet->modified;
            $date = mktime(substr($modified,-6,2), substr($modified,-4,2), substr($modified,-2,2), 
                        substr($modified,4,2), substr($modified,6,2), substr($modified,0,4));
            $result['ewallet']['modified'] = date("d-m-Y G:i:s", $date);
            $result['ewallet']['reasoncode'] = $oXML->ewallet->reasoncode;
            $result['ewallet']['reason'] = $oXML->ewallet->reason;

            // CUSTOMER
            $result['customer'] = [];
            $result['customer']['amount'] = $oXML->customer->amount;
            $result['customer']['currency'] = $oXML->customer->currency;
            $result['customer']['locale'] = $oXML->customer->locale;
            $result['customer']['firstname'] = $oXML->customer->firstname;
            $result['customer']['lastname'] = $oXML->customer->lastname;
            $result['customer']['address1'] = $oXML->customer->address1;
            $result['customer']['housenumber'] = $oXML->customer->housenumber;
            $result['customer']['zipcode'] = $oXML->customer->zipcode;
            $result['customer']['city'] = $oXML->customer->city;
            $result['customer']['country'] = $oXML->customer->country;
            $result['customer']['email'] = $oXML->customer->email;
            $result['customer']['phone1'] = $oXML->customer->phone1;
            $result['customer']['phone2'] = $oXML->customer->phone2;

            // PAYMENT
            $result['payment'] = [];
            $result['payment']['type'] = $oXML->paymentdetails->type;
            $result['payment']['accountid'] = $oXML->paymentdetails->accountid;
            $result['payment']['accountholdername'] = $oXML->paymentdetails->accountholdername;
            $result['payment']['cardexpirydate'] = $oXML->paymentdetails->cardexpirydate;

            // SHOPPING CART
            $result['cart'] = [];
            if (isset($oXML->checkoutdata->{'shopping-cart'}->items)) {
                foreach($oXML->checkoutdata->{'shopping-cart'}->items as $item) {
                    foreach($item as $props) {
                        $res = [];
                        foreach($props as $prop){
                            $res[] = $prop; 
                        }
                        $result['cart'][] = $res;
                    }
                }
            }

            // TRANSACTION
            $result['transaction'] = [];
            $result['transaction']['id'] = $oXML->transaction->id;
            $result['transaction']['currency'] = $oXML->transaction->currency;
            $result['transaction']['amount'] = $oXML->transaction->amount;
            $result['transaction']['cost'] = $oXML->transaction->cost;
            $result['transaction']['description'] = $oXML->transaction->description;
            $result['transaction']['amountrefunded'] = $oXML->transaction->amountrefunded;
        }

        return $result;
    }
    
}
