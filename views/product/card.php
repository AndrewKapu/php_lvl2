<?php /** @var \app\models\Product $product */ ?>
<h1><?=$product->name?></h1>
<p><?=$product->description?></p>
<div>
    <input id="qty_input" type="text" name="qty">
    <button id="buy-btn" data-id="<?=$product->id?>">Купить</button>
</div>
<script>
    $(document).ready(() => {
        let buyBtn = $('#buy-btn');
        $('#buy-btn').on('click', () => {
            let productQty = $('#qty_input').val();
            let productId = buyBtn.data('id');
            $.ajax({
                url: '/basket/add',
                type: 'POST',
                data:{
                    id: productId,
                    qty: productQty
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