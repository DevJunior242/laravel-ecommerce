<?php

namespace App\Http\Controllers;

use App\Models\Cinet;
use App\Models\Order;

use CinetPay\CinetPay;
 
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function pay()
    {
         $pay = Cinet::where('user_id', auth()->user()->id)->first();
        return view('cinet.pay', compact('pay'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                
                'site_id' => 'required',
                'api_key' => 'required',
                'secret_key' => 'required',
            ]
            );

            $Cinet = new Cinet();
            
           $Cinet->user_id = auth()->user()->id;
            $Cinet->site_id = $request->site_id;
            
            $Cinet->api_key = $request->api_key;
            
            $Cinet->secret_key = $request->secret_key;
            
            $Cinet->save();
            return back();
            
    }

    public function payment($id)
    {
        $paymentproduct = Order::find($id);
       
        
        $formData = array(
            "transaction_id"=> Str::random(40),
            "amount"=> $paymentproduct->price,
            "currency"=> 'X0F',
            "customer_surname"=>'devjunior',
            "customer_name"=> 'junior',
            "description"=> $paymentproduct->product_title,
            "notify_url" => 'http://127.0.0.1:8000/pay/orders/60',
            "return_url" =>'http://127.0.0.1:8000/pay/orders/60',
            "channels" =>  'web',
            "metadata" => "", // utiliser cette variable pour recevoir des informations personnalisés.
            "alternative_currency" => "",//Valeur de la transaction dans une devise alternative
            //pour afficher le paiement par carte de credit
            "customer_email" => "", //l'email du client
            "customer_phone_number" => "", //Le numéro de téléphone du client
            "customer_address" => "", //l'adresse du client
            "customer_city" => "", // ville du client
            "customer_country" => "",//Le pays du client, la valeur à envoyer est le code ISO du pays (code à deux chiffre) ex : CI, BF, US, CA, FR
            "customer_state" => "", //L’état dans de la quel se trouve le client. Cette valeur est obligatoire si le client se trouve au États Unis d’Amérique (US) ou au Canada (CA)
            "customer_zip_code" => "" //Le code postal du client
        );
        // enregistrer la transaction dans votre base de donnée
        /*  $commande->create(); */
      $apiInfos = Cinet::all();
     
        $CinetPay = new CinetPay($apiInfos->site_id, $apiInfos->api_key);
        $result = $CinetPay->generatePaymentLink($formData);
    dd($result);
        if ($result["code"] == '201')
        {
            $url = $result["data"]["payment_url"];
    
            // ajouter le token à la transaction enregistré
            /* $commande->update(); */
            //redirection vers l'url de paiement
            header('Location:'.$url);
        }     
    
}
}