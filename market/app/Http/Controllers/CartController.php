<?php

namespace App\Http\Controllers;

use App\Mail\NewOrder;
use App\Mail\NewOrderClient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use Mail;

class CartController extends Controller
{
    public function update()
    {
        $client = auth()->user();
        $cart = $client->cart;
        $cart->status = 'Pending';
        $cart->order_date = Carbon::now();
        $cart->save(); 


        $admins = User::where('admin', true)->get();
        Mail::to($admins)->send(new NewOrder($client, $cart));
        Mail::to($client)->send(new NewOrderClient($client, $cart));

        $notification = 'Pedido realizado con exito. Te contactaremos vía mail';
        return back()->with(compact('notification'));
    }
}
