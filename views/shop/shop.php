<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Магазин';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <a href="<?php echo Url::to('../cart/add') ?>" ><button type="button" class="btn btn-success">Корзина</button></a>
    <p></p>
    <table  class="table table-striped">
        <tr>
            <thead>
            <td>Номер</td>
            <td>Название</td>
            <td>Описание</td>
            <td>Цена</td>
            <td></td>

            </thead>
        </tr>

        <?php
        foreach ($products as $product){
            echo '<tr>
                                   <td>'. $product->id .'</td>
                                   <td>'. $product->name .'</td>
                                   <td>'. $product->content .'</td>
                                   <td>'. $product->price .'</td>
                                   <td><a href="'. Url::to(['cart/add', 'id'=>$product->id])
                .'" class="btn btn-default add-to-cart" data-id="'.$product->id.'">добавить</a></td>
                                                                      
                              </tr>';
        }
        ?>


    </table>


    <code><?= __FILE__ ?></code>
</div>
