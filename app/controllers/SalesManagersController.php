<?php
Use \Stripe\Stripe;
Use \Stripe\Charge;
Use \Stripe\Error;

class SalesManagersController extends \BaseController {

	/**
	 * Display a listing of salesmanagers
	 *
	 * @return Response
	 */
	public function index()
	{
		$salesmanagers = Salesmanager::all();

		return View::make('salesmanagers.index', compact('salesmanagers'));
	}

	public function doPayment()
	{
				// Set your secret key: remember to change this to your live secret key in production
				// See your keys here https://dashboard.stripe.com/account/apikeys
				Stripe::setApiKey("sk_test_6Xjx7CIZfR3MqgsQKNsVF1vf");

				// Get the credit card details submitted by the form
				$token = Input::get('stripeToken');

		// Create the charge on Stripe's servers - this will charge the user's card
		try {
		$charge = Stripe_Charge::create(array(
		  "amount" => Input::get('data-description'), // amount in cents, again
		  "currency" => "usd",
		  "source" => $token,
		  "description" => "payinguser@example.com")
		);
	} catch(\Stripe\Error\Card $e) {
	  // The card has been declined
	}

		return View::make('shoppers.createPaymentForm');
	}

	/**
	 * Show the form for creating a new salesmanager
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('salesmanagers.create');
	}

	/**
	 * Store a newly created salesmanager in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Salesmanager::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Salesmanager::create($data);

		return Redirect::route('salesmanagers.index');
	}

	/**
	 * Display the specified salesmanager.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$salesmanager = Salesmanager::findOrFail($id);

		return View::make('salesmanagers.show', compact('salesmanager'));
	}

	/**
	 * Show the form for editing the specified salesmanager.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$salesmanager = Salesmanager::find($id);

		return View::make('salesmanagers.edit', compact('salesmanager'));
	}

	/**
	 * Update the specified salesmanager in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$salesmanager = Salesmanager::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Salesmanager::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$salesmanager->update($data);

		return Redirect::route('salesmanagers.index');
	}

	/**
	 * Remove the specified salesmanager from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Salesmanager::destroy($id);

		return Redirect::route('salesmanagers.index');
	}

	public function commerceDirector(){
		switch (Input::get('commerceType')){
			case 'addCart':
				return $this->injectCart();
			break;
		}
	}

	public function injectCart()
	{	
		// Session::forget('cart_id');
		if(Session::get('cart_id')){
			$customer_id = Session::get('cart_id');
		}else{
			$customer_id = Str::random(50);
			Session::put('cart_id', $customer_id);
		}
		// $item = Input::get('product_id');
		$size = Input::get('size');
		$item = Input::get('product');

		if(Cart::where('customer_id', $customer_id)
			->where('item', $item)
			->where('size', $size)
			->pluck('quantity')){
			$quantit = Cart::where('customer_id', $customer_id)
						->where('item', $item)
						->where('size', $size)
						->pluck('quantity');

			$cart = Cart::where('customer_id', $customer_id)
					->where('item', $item)
					->where('size', $size)
					->first();

			$cart->customer_id = $customer_id;
			$cart->item = $item;
			$cart->size = $size;
			$cart->quantity = $quantit+1;

			$cart->save();
		}else{
			$cart = new Cart;
			$cart->customer_id = $customer_id;
			$cart->size = $size;
			$cart->item = $item;
			$cart->quantity = 1;

			$cart->save();
		return('sucksess');
		}
	}

	public function removeFromCart()
	{
		$item = Input::get('remID');
		$customer_id = Session::get('cart_id');
			Cart::destroy($item);

		return Redirect::route('cart.index');
	}
	
	public function emptyCart()
	{
		Session::forget('checkoutAmt');
		Session::forget('cart_id');
		return Redirect::route('PublicIndex');
	}

	public function processPayment()
	{
		// Set your secret key: remember to change this to your live secret key in production
		// See your keys here https://dashboard.stripe.com/account/apikeys
			Stripe::setApiKey("sk_live_NharL7KTJBPcvdVrbQIXr3MS");

			// Get the credit card details submitted by the form
			$token = Input::get('stripeToken');

		// Create the charge on Stripe's servers - this will charge the user's card
		try {
			// if(Shipping::where('cart_id', Session::get('cart_id'))->pluck('payment_status') == 'Paid'){
			// 	return Redirect::route('alreadyPaid');
			// }
		$charge = Charge::create(array(
		  "amount" => Input::get('data-description'), // amount in cents, again
		  "currency" => "usd",
		  "source" => $token,
		  "description" => Session::get('cart_id'))
		);
	} catch(\Stripe\Error\Card $e) {
	  // The card has been declined
	}
			// $cart_id = Session::get('cart_id');
			// $markPaid = Shipping::where('cart_id', Session::get('cart_id'))->first();
			// $markPaid->payment_status = 'Paid';
			// $markPaid->shipped_status = 'Not Shipped';
			// $markPaid->save();

			//inventorytime
			// foreach(Cart::where('customer_id', $cart_id)->get() as $purgeCarts)
			// {	
			// 	$inventory = Inventory::where('product_id', $purgeCarts->item)->pluck($purgeCarts->size);
			// 	$newsize = $inventory - $purgeCarts->quantity;
			// 	DB::table('inventories')->where('product_id', $purgeCarts->item)->update(array($purgeCarts->size => $newsize));
			// }

			
			// Mail::send('emails.Newsale', array('cart' => $cart_id, 'customer' => Shipping::where('cart_id', $cart_id)->first()), function($message){
			// 	$checkoutAmt = Session::get('checkoutAmt');
			// 	$message->to(Shipping::where('cart_id', Session::get('cart_id'))->pluck('email'))->subject("Your Eternally Nocturnal Order");
			// });
			// Mail::send('emails.Newsaleadmin', array('cart' => $cart_id, 'customer' => Shipping::where('cart_id', $cart_id)->first()), function($message){
			// 	$checkoutAmt = Session::get('checkoutAmt');
			// 	$message->to('billing@eternallynocturnal.com')->subject("NEW SALE $".substr($checkoutAmt,0,-2).".".substr($checkoutAmt,-2));
			// });

			// Sale::create(array('customer_id' => $markPaid->email, 'cart_id' => Session::get('cart_id')));

			// Session::forget('cart_id');
			// Session::forget('checkoutAmt');
			// return Redirect::route('transSuccess');
		}
	
}


