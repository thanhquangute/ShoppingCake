<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\Type_Product;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class PageController extends Controller
{
    public function getIndex(){
    	$slide = Slide::All();
    	$count_product_new = Product::where('new',1)->get();
    	$product_new = Product::where('new',1)->paginate(4);
    	$count_product_promotion = Product::where('promotion_price','<>',0)->get();
    	$product_promotion = Product::where('promotion_price','<>',0)->paginate(8);
    	return view('page.index',['slide'=>$slide,'product_new'=>$product_new,'count_product_new'=>$count_product_new,'count_product_promotion'=>$count_product_promotion,'product_promotion'=>$product_promotion]);
    	// or 
    	//return view('page.index',compacts(slide));
    }
    public function getProductType($id){
    	$product_type = Type_Product::All();
    	$type = Type_Product::find($id);
    	$count_productById = Product::where('id_type',$id)->get();
    	$productById = Product::where('id_type',$id)->paginate(6);
    	$count_productOtherId = Product::where('id_type','<>',$id)->get();
    	$productOtherId = Product::where('id_type','<>',$id)->paginate(9);
    	return view('page.product_type',['product_type'=>$product_type,'type'=>$type,'count_productById'=>$count_productById,'productById'=>$productById,'count_productOtherId'=>$count_productOtherId,'productOtherId'=>$productOtherId]);
    }
    public function getProductDetail($id){
    	$productDetail = Product::find($id);
    	$product_related = Product::where('id_type',$productDetail->id_type)->take(3)->get();
    	$product_promotion = Product::where('promotion_price','<>',0)->take(4)->get();
    	$product_new = Product::where('new',1)->take(4)->get();
    	return view('page.product_detail',['productDetail'=>$productDetail,'product_related'=>$product_related,'product_promotion'=>$product_promotion,'product_new'=>$product_new]);

    }
    public function getAddToCart(Request $req,$id){
    	$product = Product::find($id);
    	$oldCart = Session('cart')?Session::get('cart'):null;
    	$cart = new Cart($oldCart);
    	$cart -> add($product, $id);
    	$req -> session()->put('cart', $cart);
    	return redirect()->back();

    }
    public function getDelItemCart($id){
    	$oldCart = Session::has('cart')?Session::get('cart'):null;
    	$cart = new Cart($oldCart);
    	$cart->removeItem($id);
    	if(count($cart->items>0)){
    		Session::put('cart',$cart);
    	}
    	else{
    		Session::forget('cart');
    	}
    	return redirect()->back();
    }
    public function getShoppingCart(){
        //$cart = Session::get('cart');
        //print_r($cart);
    	return view('page.shopping_cart');
    }
    public function postShoppingCart(Request $req){
    	$cart = Session::get('cart');
    	$customer = new Customer;
    	$customer->name = $req->name;
    	$customer->gender= $req->gender;
    	$customer->email = $req->email;
    	$customer->address = $req->address;
    	$customer->phone_number= $req->phone_number;
    	$customer->note = $req->note;
    	$customer->save();

    	$bill = new Bill;
    	$bill->id_customer = $customer->id;
    	$bill->date_order = date('Y-m-d');
    	$bill->total = $cart->totalPrice;
    	$bill->payment = $req->payment;
    	$bill->save();

    	foreach($cart->items as $key =>$value){

	    	$bill_detail = new BillDetail;
	    	$bill_detail->id_bill = $bill->id;
	    	$bill_detail->id_product = $key;
	    	$bill_detail->quantity = $value['qty'];
	    	$bill_detail->unit_price = ($value['price'] / $value['qty']);
	    	$bill_detail->save();
	    }
	    Session::forget('cart');
    	return redirect()->back()->with('thongbao','Dat hang thanh cong');
    }
    public function getContacts(){
    	return view('page.contacts');
    }
    public function getIntroduction(){
    	return view('page.introduction');
    }
    public function getLogin(){
        return view('page.login');
    }
    public function postLogin(Request $req){
        $this->validate($req,
            ['email'=>'required|email',
            'password'=>'required|min:6|max:20'
            ],
            ['email.required'=>'Vui lòng nhập Email',
            'email.email'=>'Email không đúng định dạng',
            'password.required'=>'Mật khẩu không được để trống',
            'password.min'=>'Mật khẩu không được ngắn hơn 6 kí tự',
            'password.max'=>'Mật khẩu không được vượt quá 20 ký tự'
            ]); 
        $credentials = ['email'=>($req->email),'password'=>($req->password)];
        if(Auth::attempt($credentials))
        {
            return redirect()->intended('index')->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
        }
        else{
           return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);}
       }
    public function getDangXuat(){
        Auth::logout();
        return redirect()->intended('index');

    }
    public function postSignup(Request $req){
        $this->validate($req,
            ['email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:20',
            'fullname'=>'required',
            're_password'=>'required|same:password'
            ],
            ['email.required'=>'Vui lòng nhập Email',
            'email.email'=>'Email không đúng định dạng',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Mật khẩu không được để trống',
            'password.min'=>'Mật khẩu không được ngắn hơn 6 kí tự',
            'password.max'=>'Mật khẩu không được vượt quá 20 ký tự',
            'fullname.required'=>'Tên không được để trống',
            're_password.required'=>'Bạn phải nhập lại mật khẩu',
            're_password.same'=>'Mật khẩu nhập lại không khớp'
            ]);
        $user = new User;
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('thongbaoss','Đăng ký tài khoản thành công');
    }
    public function getSignup(){
        return view('page.signup');
    }

    public function getSearch(Request $req){
        $product = Product::where('name','like','%'.$req->key.'%')->orWhere('unit_price', $req->key)->get();
        $count_product = Product::where('name','like','%'.$req->key.'%')->orWhere('unit_price', $req->key)->get();
        return view('page.search',['count_product'=>$count_product, 'product'=>$product]);
    }
}
