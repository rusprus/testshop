<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'sum',
            'status',
            'name',
            'phone',
        ],
    ]) ?>

    <table class="table table-striped">
        <thead>
        <tr>

            <th>Номер заказа</th>
            <th>id продукта</th>
            <th>Название продукта</th>
            <th>Цена</th>
            <th>Кол-во</th>
            <th>Сумма</th>
        </tr>
        </thead>
        <tbody class="">
        <?php foreach ($orderItems as $orderItem): ?>
            <tr>

                <td><?php echo $orderItem['order_id'] ?></td>
                <td><?php echo $orderItem['product_id'] ?></td>
                <td><?php echo $orderItem['name'] ?></td>
                <td><?php echo $orderItem['price'] ?></td>
                <td><?php echo $orderItem['qty_item'] ?></td>
                <td><?php echo $orderItem['sum_item'] ?></td>

            </tr>
        <?php endforeach; ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>
    <!--    --><?php //var_dump($orderItems);die(); ?>

</div>
