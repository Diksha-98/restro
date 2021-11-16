<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\OrderItem;
use Auth;
use DB;

class HomeController extends Controller
{
    public function home(){
        $data['categories'] = Category::where("parent_id",NULL)->get();
        $data['products'] = Product::all();
        return view("core.home",$data);
    }
    public function search(Request $req){
        $data['categories'] = Category::where("parent_id",NULL)->get();

        if ($req->method() == "GET" && $req->search != ""){
            $search = $req->search;
            $data['categories'] = Category::where("cat_title","LIKE","%$search%")->get();

            return view("core.home",$data);
        }
        else{
            return redirect()->back();
        }
    }
    public function view(Request $req,$id){
        $category = Category::where('id',$id)->first();
        $product = Product::where('category_id',$id)->get();
        return view('core.view',['product'=>$product]);
        }
        public function searchpro(Request $req){
            $data['categories'] = Category::where("parent_id",NULL)->get();
    
            if ($req->method() == "GET" && $req->search != ""){
                $search = $req->search;
                $data['product'] = Product::where("title","LIKE","%$search%")->get();
    
                return view("core.view",$data);
            }
            else{
                return redirect()->back();
            }
        }
        
      public function productview($id){
          $product = Product::where('id',$id)->first();
         $d = Product::where("id","!=",$product->id)->where('category_id',$product->category_id)->get();
       
        
         return view('core.productview',["product"=>$product,"d"=>$d]);
      } 
    public function checkCode($code){
        $c = Coupon::where('code', $code)->first();
        return $c;
    }

    public function cart(){
        $data['order'] = Order::where([['user_id',Auth::id()],["ordered",false]])->first();
        return view("core.order_summary",$data);
    }
    public function addCoupon(Request $req){
        $user = Auth::user();
        if($req->method() == 'POST'){
            $code = $req->code;

            $check = $this->checkCode($code);

            if($check){
                $order = Order::where([["ordered",false],["user_id",$user->id]])->first();
                if($order){
                        $order->coupon_id = $check->id;
                        $order->save();
                }
                else{
                    echo "order not found";
                }
            }
            else{
                echo "invalid or expired coupon code try again";
            }

        }
        return redirect()->route('cart');
    }
    
    public function add_to_cart(Request $req,$id){
        $product = Product::find($id);
        $user = Auth::user();
        if($product){
            $order = Order::where([["ordered",false],["user_id",$user->id]])->first();
            if($order){
                // if order exist
                $orderItem = OrderItem::where("ordered",false)->where("user_id",$user->id)->where("product_id",$id)->first();
                if($orderItem){
                    // if orderItem exist
                    $orderItem->qty += 1;
                    $orderItem->save();
                }
                else{
                    //creating new orderItem
                    $oi = new orderItem();
                    $oi->ordered = false;
                    $oi->user_id = $user->id;
                    $oi->product_id  = $id;
                    $oi->ordered_id = $ordered->id;
                    $oi->save();
                }
            }
            else{
                //if not order exist
                $o = new Order();
                $o->user_id = $user->id;
                $o->ordered = false;
                $o->save();

                // creating oderItem after order
                $oi = new orderItem();
                $oi->ordered = false;
                $oi->user_id = $user->id;
                $oi->product_id  = $id;
                $oi->ordered_id = $o->id;
                $oi->save();

            }
            return redirect()->route('cart');

        }
        else{
            $req->session->flash("error","Product not found");
            return redirect()->back();
        }

    }
    public function removeItemFromCart(Request $req, $id){
        $product = Product::find($id);
        $user = Auth::user();
        if($product){
            $order = Order::where([["ordered",false],["user_id",$user->id]])->first();
            if($order){
                // if order exist
                $orderItem = OrderItem::where("ordered",false)->where("user_id",$user->id)->where("product_id",$id)->first();
                if($orderItem){
                        $orderItem->delete();
                        $req->session()->flash("error","Product removed from cart");
                    }
                }
                else{
                    $req->session()->flash("error","Sorry no active order exist in your cart");
                }
        }
        else{
            $req->session()->flash("error","Sorry product not found ");
        }
        return redirect()->route('cart');
    }
    public function remove_from_cart(Request $req,$id){
        $product = Product::find($id);
        $user = Auth::user();
        if($product){
            $order = Order::where([["ordered",false],["user_id",$user->id]])->first();
            if($order){
                // if order exist
                $orderItem = OrderItem::where("ordered",false)->where("user_id",$user->id)->where("product_id",$id)->first();
                if($orderItem){
                    // if orderItem exist
                    if($orderItem->qty > 1){
                        $orderItem->qty -= 1;
                        $orderItem->save();
                    }
                    else{
                        $orderItem->delete();
                        $req->session()->flash("error","Product removed from cart");
                        return redirect()->route('cart');
                    }
                }
                else{
                    //creating new orderItem
                   return redirect()->route('cart');
                }
            }

            return redirect()->route('cart');

        }
        else{
            $req->session()->flash("error","Product not found");
            return redirect()->back();
        }

    }


   
}
