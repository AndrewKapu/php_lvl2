<h3>Корзина</h3>
<?php if(empty($basket)): ?>
    <div>Корзина пуста</div>
<?php else: ?>
    <?php foreach ($basket as $product): ?>
        <div><?=$product['product']->name?> x <?=$product['count']?>
            <a id="del-btn" data-id="<?=$product['product']->id?>" href="#">Удалить товар</a>
        </div>
    <?php endforeach;?>
<?php endif;?>
<a href="/order/orderForm">Оформить заказ</a>
<script>
    $(document).ready(() => {
        let delBtn = $('#del-btn');
        delBtn.on('click', () => {
            let productId = delBtn.data('id');
            $.ajax({
                url: '/basket/del',
                type: 'POST',
                data:{
                    id: productId,
                },
                success: (data) => {
                    data = JSON.parse(data);
                    if (data.success === 'ok') {
                        alert(data.message);
                    }
                }
            })
        })
    })
</script>
