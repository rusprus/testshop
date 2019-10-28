<?php


namespace app\controllers;

use app\models\OrderItems;
use app\models\Product;
use app\models\Cart;
use yii\web\Controller;
use Yii;
use app\models\Order;



class CartController extends Controller
{


    public function actionClear(){

        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->clearToCart();


        return $this->render('cart-modal', ['session'=> $session]);
    }

    public function actionDelItem(){
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        return $this->render('cart-modal', ['session'=> $session]);
    }



    public function actionAdd(){

        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        if (!empty($product)) {

            $session = Yii::$app->session;
            $session->open();
            $cart = new Cart();
            $cart->addToCart($product);

        }else{
            $session = Yii::$app->session;
            $session->open();
        }
//        return var_dump($session['cart']); die();

        return $this->render('cart-modal', ['session'=> $session]);
    }

    protected function saveOrderItem($session, $order_id){
        foreach ($session as $id => $item){
            $order_item = new OrderItems();
            $order_item->order_id = $order_id;
            $order_item->product_id = $id;
            $order_item->name = $item['name'];
            $order_item->price = $item['price'];
            $order_item->qty_item = $item['qty'];
            $order_item->sum_item = $item['qty'] * $item['price'];
            $order_item->save();
        }
    }
}