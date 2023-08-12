<?php

namespace App\Http\Controllers\Site\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(){  //để hiển thị tất cả sản phẩm trong giỏ hàng
      return view("frontend/cart/cart");
      }
      public function addToCart(){ //để thêm sản phẩm vào giỏ hàng

        return "adTodetail";
      }
      public function updateCart(){  //để cập nhật lại thông tin giỏ hàng

        return view("frontend/cart/cart");
      }
      public function deleteCart(){  //để xóa sản phẩm trong giỏ hàng

        return view("frontend/cart/cart");
      }
      public function checkout(){  //để bắt đầu thanh toán

        return view("frontend/cart/checkout");
      }
      public function payment(){  //để thực hiện bước cuối cùng trong thanh toán

        return "checkout";
      }
      public function complete(){  //để thông báo hoàn tất quá trình mua hàng

        return view("frontend/cart/complete");
      }

}
