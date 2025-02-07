<?php



namespace App\Http\Controllers;



use Stripe;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class StripeController extends Controller

{

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripe($totalprice)

    {
                  
        return view('home.stripe', compact('totalprice'));
    }



    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripePost(Request $request, $totalprice)

    {


        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));



        Stripe\Charge::create([

            "amount" => $totalprice * 100,

            "currency" => "usd",

            "source" => $request->stripeToken,

            "description" => "Test payment from itsolutionstuff.com."

        ]);



        Session::flash('success', 'Payment successful!');



        return back();
    }
}
