<?php


namespace app\models;

use yii\db\ActiveRecord;
use Yii;
use app\models\OrderItems;




class Cart extends ActiveRecord
{
    public function addToCart($product, $qty = 1){
        if(isset($_SESSION['cart'][$product->id])){
            $_SESSION['cart'][$product->id]['qty'] += $qty;
            $_SESSION['cart'][$product->id]['sum'] = $_SESSION['cart'][$product->id]['qty'] * $product->price;

        } else {
            $_SESSION['cart'][$product->id] =[
                'qty' => $qty,
                'name'=> $product->name,
                'price'=> $product->price,
                'sum' => $product->price,
            ];
        }

        if(isset($_SESSION['cart.sum'])){
            $_SESSION['cart.sum'] += $_SESSION['cart'][$product->id]['price'];
        }else {
            $_SESSION['cart.sum'] = $_SESSION['cart'][$product->id]['sum'];
        }
    }

    public function clearToCart(){
        if(!empty($_SESSION['cart'])){
            Yii::$app->session->remove('cart');
        }
        if(!empty($_SESSION['cart.sum'])){
            Yii::$app->session->remove('cart.sum');

        }
    }

    public function recalc($id){

        if(isset($_SESSION['cart'][$id])) {
//            $qtyMinus = $_SESSION['cart'][$id]['qty'];
            $sumMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
//            $_SESSION['cart.qty'] -= $qtyMinus;
            $_SESSION['cart.sum'] -= $sumMinus;
            unset($_SESSION['cart'][$id]);
        }
    }


}