<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\product;
use App\Models\ShippingInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
}
    public function CategoryPage($id){
        $category = Category::findOrFail($id);
        $products = product::where('product_category_id', $id)->latest()->get();
        return view('user_template.category', compact('category', 'products'));
    }

    public function SingleProduct($id){
        $product = product::findOrFail($id);
        $subcat_id = Product::where('id', $id)->value('product_subcategory_id');
        $related_products = product::where('product_subcategory_id', $subcat_id)->latest()->get();
        return view('user_template.product', compact('product', 'related_products'));
    }

    public function AddToCart(){
        $userid = Auth::id();
        $cart_item = Cart::where('user_id', $userid)->get();
        return view('user_template.addtocart', compact('cart_item'));
    }

    public function AddProductToCart(Request $request){
        $product_price = $request->price;
        $quantity = $request->quantity;
        $price = $product_price * $quantity;
        // $color = $request->color;
        // $size = $request->size;
        Cart::insert([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'quantity' => $request->quantity,
            'price' => $price,
            'color' => $request->color,
            'size' => $request->size,
        ]);
        return redirect()->route('addtocart')->with('message', "Your item added to cart successfully.");
    }

    public function RemoveCartItem($id){
        Cart::findOrFail($id)->delete();

        return redirect()->route('addtocart')->with('message', 'Your item removed form cart successfully!');
    }

    public function GetShippingAddress(){
        return view('user_template.shippingaddress');
    }

    public function AddShippingAddress(Request $request){
        $request->validate([
            'name' => 'required',
            'street_address' => 'required',
            'postcode' => 'required',
            'city' => 'required',
            'phone_number' => 'required',
            'email_address' => 'required',
        ]);
        ShippingInfo::insert([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'street_address' => $request->street_address,
            'postcode' => $request->postcode,
            'city' => $request->city,
            'phone_number' => $request->phone_number,
            'email_address' => $request->email_address,
        ]);

        return redirect()->route('checkout');
    }

    public function Checkout(){
        $userid = Auth::id();
        $cart_items = Cart::where('user_id', $userid)->get();
        $shipping_address = ShippingInfo::where('user_id', $userid)->first();
        return view('user_template.checkout', compact('cart_items', 'shipping_address'));
    }

    public function PlaceOrder(){
        $userid = Auth::id();
        $shipping_address = ShippingInfo::where('user_id', $userid)->first();
        $cart_items = Cart::where('user_id', $userid)->get();

        foreach($cart_items as $item){
            Order::insert([
                'userid' => $userid,
                'shipping_name' => $shipping_address->name,
                'shipping_address' => $shipping_address->street_address,
                'shipping_postCode' => $shipping_address->postcode,
                'shipping_city' => $shipping_address->city,
                'shipping_phoneNumber' => $shipping_address->phone_number,
                'shipping_emailAddress' => $shipping_address->email_address,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'total_price' => $item->price,
            ]);

            $id = $item->id;
            Cart::findOrFail($id)->delete();
        }

        ShippingInfo::where('user_id', $userid)->first()->delete();

        return redirect()->route('pendingorders')->with('message', 'Your Order Has Been Placed Successfully!');
    }

    public function UserProfile(){
        // $order = Order::findOrFail($id);
        return view('user_template.userprofile',);
    }

    public function PendingOrders(){
        $pending_orders = Order::where('status', 'pending')->latest()->get();
        return view('user_template.pendingorders', compact('pending_orders'));
    }

    public function History(){
        return view('user_template.history');
    }

    public function NewRelease(){
        return view('user_template.newrelease');
    }

    public function TodaysDeal(){
        return view('user_template.todaysdeal');
    }

    public function CustomerService(){
        return view('user_template.customerservice');
    }


}
