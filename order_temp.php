<?php include("base.php"); ?>

<div class="container my-2">
    <h3 class="border-bottom py-2">주문하기</h3>

    <?php foreach($prods as $prod):?>
        <?php if ($prod['no'] % 3 == 1) { ?>
            <div class="row mb-2"><div class="col-sm-4"> 
        <?php } else { ?>
                <div class="col-sm-4 mb-2">            
        <?php } ?>
        <div class="card text-center">
            <div class="card-body text-center">
                <h5 class="card-title"><?= $prod['name'] ?></h5>
                <p class="card-text"><?= number_format($prod['price']) ?></p>
            </div>
        </div>
        <form action="crt_order.php" method="post">
            <div class="input-group input-group-sm justify-content-end">
                <span class="input-group-text">수량</span>
                <input type="hidden" name="product_id" id="product_id" value="<?= $prod['id'] ?>">
                <input type="number" class="form-control" name="qty" id="qty" value="1">
                <button type="submit" class="btn btn-outline-secondary">담기</button>
            </div>
        </form>
        <?php if ($prod['no'] % 3 > 0) { ?>
            </div>
            <?php if($prod['no'] == count($prods)) { ?>
                </div>
            <?php } ?>           
        <?php } else { ?>
            </div></div> 
        <?php } ?>
    <?php endforeach; ?>

    <?php if ($message) : ?>
    <div class="alert alert-danger" role="alert">
    <?= $message ?>
    </div>
    <?php endif; ?>    
    
    <div class="my-2">
        <table class="table">
            <thead class="text-center table-dark">
                <tr>
                    <td>NO</td>
                    <td>품명</td>
                    <td>수량</td>  
                    <td>금액</td>
                    <td></td> 
                </tr>
            </thead>
            <tbody>
                <?php foreach($orders as $order): ?>
                <tr class="text-center">
                    <td><?= $order['rn'] ?></td>
                    <td class="text-start"><?= $order['name'] ?></td>
                    <td><?= $order['order_quantity'] ?></td>
                    <td><?= $order['amt'] ?></td>
                    <td class="text-end">
                        <a href="#" class="delete btn btn-sm btn-outline-secondary" data-uri="delete_order.php?id=<?= $order['id'] ?>">삭제</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <tr class="text-center">
                    <td>계</td>
                    <td></td>
                    <td></td>
                    <td><?= $sum ?></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
    <?php if($sum > 0) { ?>                        
    <div class="btn-toolbar justify-content-end mb-2">
        <div class="btn-group btn-group-sm">
            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#collap1">주문하기</button>
        </div>
    </div>
    <?php } ?>
    <div id="collap1" class="collapse">
        <div class="input-group mb-1">
            <span class="input-group-text">매장</span>
            <select name="" id="" class="form-select">
                <option value="1">삼성점</option>
                <option value="2">강남점</option>
            </select>
        </div>
        <div class="input-group mb-1">
            <span class="input-group-text">장소</span>
            <select name="" id="" class="form-select">
                <option value="1">매장</option>
                <option value="2">테이크아웃</option>
            </select>
        </div>
        <div class="input-group mb-1">
            <span class="input-group-text">결제</span>
            <select name="" id="" class="form-select">
                <option value="1">VISA 1234-1234-XXXX-1234</option>
            </select>
        </div>
        <div class="btn-toolbar justify-content-end mb-2">
            <div class="btn-group btn-group-sm">
                <a href="order_complete.php?id=<?= $order_id ?>&total=<?= $sum ?>" class="btn btn-outline-secondary">결제하기</a>
            </div>
        </div>
    </div>
</div>

<?php include("bottom.php"); ?>
