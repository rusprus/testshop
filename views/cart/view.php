<?php use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<?php if(Yii::$app->session->hasFlash('success') ): ?>
    <?php echo Yii::$app->session->getFlash('success'); ?>
<?php endif; ?>
<?php if(Yii::$app->session->hasFlash('error') ): ?>
    <?php echo Yii::$app->session->getFlash('error'); ?>
<?php endif; ?>

<?php   if(isset($_SESSION['cart'])): ?>

    <div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Наименование</th>
                <th>Количество</th>
                <th>Цена</th>
                <th>Сумма</th>
            </tr>
            </thead>
            <tbody class="">
            <?php foreach ($session['cart'] as $id => $item): ?>
                <tr>
                    <td><?php echo $item['name'] ?></td>
                    <td><?php echo $item['qty'] ?></td>
                    <td><?php echo $item['price'] ?></td>
                    <td><?php echo $item['sum'] ?></td>
                    <td><a href="<?php echo Url::to(['del-item', 'id'=>$id])
                        ?>" class="btn btn-default add-to-cart" data-id="'.$product->id.'">удалить</a></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><?php echo $session['cart.sum'] ?></td>
                <td></td>
            </tr>
            </tbody>
        </table>

    </div>
    <?php $form = ActiveForm::begin() ?>
    <?php echo $form->field($order, 'name') ?>
    <?php echo $form->field($order, 'phone') ?>
    <?php echo Html::submitButton('Заказать', ['class'=>'btn btn-success']) ?>
    <?php ActiveForm::end() ?>
<?php else: ?>
    <p>Корзина пуста</p>

<?php endif; ?>

