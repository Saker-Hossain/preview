<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
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
        $cart_item = Cart::where('user_id', $userid)->get();
        $shipping_address = ShippingInfo::where('user_id', $userid)->first();
        return view('user_template.checkout', compact('cart_item', 'shipping_address'));
    }

    public function UserProfile(){
        return view('user_template.userprofile');
    }

    public function PendingOrders(){
        return view('user_template.pendingorders');
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
