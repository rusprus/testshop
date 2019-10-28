<?php use yii\helpers\Url;

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = $this->title;
?>
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
<?php else: ?>
    <p>Корзина пуста</p>

<?php endif; ?>

<a href="<?php echo Url::to('view') ?>" ><button type="button" class="btn btn-success">Оформить заказ</button></a>
<a href="<?php echo Url::to('../shop/index') ?>" ><button type="button" class="btn btn-info">Продолжить покупки</button></a>
<a href="<?php echo Url::to('clear') ?>" ><button type="button" class="btn btn-danger">Удалить все</button></a>
