<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Meal;

class historyController extends Controller
{

    public function getOrders($user_id)
    {
        // Passing post id into find()
        return view('History',[
            'orders' => User::find($user_id)->orders
        ]);
    }


    public function feedback(Request $request,$id,User $user){
        $order = Order::where('id',$id)->firstOrFail();
        $attributes = request()->validate([
            'comment'=> ['string', 'required'],
            'rate' =>['numeric', 'required', 'max:5'],
        ]);
        $order -> update($attributes);
        $meal = Meal::where('title',$order->title)->firstOrFail();
        $meal->numOfReviews = $meal->numOfReviews +1; 
        $meal->rate = ($meal->rate + request('rate')) / $meal->numOfReviews ;
        $meal->save();

        return redirect('menu/'.strval($meal-> id));
    }

}
