<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Donate_Section;
use App\Model\EmailAddress;
use App\Model\Phone;
use App\Model\Address;
use App\Model\Information;
use App\Model\CoverImage;
use Share;
use Session;
use Carbon\Carbon;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    public function createpaypal()
    {
        $data['email']        = EmailAddress::all();
        $data['phone']        = Phone::all();
        $data['address']      = Address::all();
        $data['info']         = Information::all();
        $data['cover_image']  = CoverImage::where('type','Donation_Page')->limit('1')->get();

        $data['all_links'] = Share::page('http://www.google.com','Mawoud Educational Center')
       ->facebook()
       ->twitter()
       ->whatsapp()
       ->linkedin()
       ->telegram()->getRawLinks();
        return view('website/donate/donate_page', $data);
    }


    public function processPaypal(Request $request)
    {
        $validations = $request->validate([
            'first_name'    => 'required|string',
            'last_name'     => 'required|string',
            'email'         => 'required|string',
            'phone'         => 'required|numeric',
            'country'       => 'required|string', 
            'city'          => 'required|string', 
            'address'       => 'required',
            'zip_code'      => 'required|numeric',
            'donate_section'=> 'required',
            'amount'        => 'required|numeric'
        ]);

            $insert = new Payment();
            $insert->first_name = $request->first_name;
            $insert->last_name  = $request->last_name;
            $insert->email      = $request->email;
            $insert->phone      = $request->phone;
            $insert->country    = $request->country;
            $insert->city       = $request->city;
            $insert->address    = $request->address;
            $insert->zip_code   = $request->zip_code;
            $insert->amount     = $request->amount;
            $donation_date = $donation_date = Carbon::parse($request->startFrom)->setTimezone('Asia/Kabul')->format('Y-m-d H:i:s');
            $insert->payment_date       = $donation_date;
            $insert->save();
            $last_id = $insert->payment_id;

            $donate_sections = $request->input('donate_section');
            if($donate_sections != ''){
                foreach($donate_sections as $section_name){
                    $insert_donate_section = new Donate_Section();
                    $insert_donate_section->section_name = $section_name;
                    $insert_donate_section->payment_id = $last_id;
                    $insert_donate_section->save();
                }
            }
              
        session(["payment_id"=>$last_id]);

        $price = $request->input('amount');

        // Init PayPal
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        
        $response = $provider->createOrder([
              "intent" => "CAPTURE",
              "application_context" => [
                  "return_url" => route('processSuccess'),
                  "cancel_url" => route('processCancel'),
              ],
              "purchase_units" => [
                  0 => [
                      "amount" => [
                          "currency_code" => "USD",
                          "value" => "$price",
                      ]
                  ]
              ]
        ]);

        if(isset($response['id']) && $response['id'] != null){
            // redirect to approve href
            foreach($response['links'] as $links){
                if($links['rel'] == 'approve'){
                    return redirect()->away($links['href']);
                }
            }
            return redirect()
              ->route('donate')
              ->with('error', 'Something went wrong.');
        }
        else{
            return redirect()
              ->route('donate')
              ->with('error', $response['message'] ?? 'Something went wrong.');
        }

    }


    public function processSuccess(Request $request)
    {
        
        // Init PayPal
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if(isset($response['status']) && $response['status'] == 'COMPLETED'){
           $last_id = session("payment_id");
           $state = Payment::find($last_id);
           $state->state = "1";
           $state->save();

            return redirect()
              ->route('donate')
              ->with('success', 'Transacation Completed,Thank you so much.');
        }
        else{
            return redirect()
              ->route('donate')
              ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function processCancel(Request $request)
    {

        return redirect()
              ->route('donate')
              ->with('error', $response['message'] ?? 'You have canceled the transcation.');
    }
}
