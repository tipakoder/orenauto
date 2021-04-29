<link rel="stylesheet" href="/view/res/css/new_auto.css">

<div class="container">
    <section id="brands">
        <h2 class="section-title">Каталог брендов</h2>
        <div class="content">
            <div class="list">
                <?php foreach($MARKS as $mark): ?>
                <div class="item link" href="/catalog/?mark=<?=$mark['id']?>/">
                    <img src="<?=$mark['icon']?>" alt="" class="brand-image">
                    <p class="brand-name"><?=$mark['name']?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="selected-brand" <?if($_GET["mark"] == null){echo "style='display: none;'";}?>>
        <h2 class="section-title">Модельный ряд автомобилей <?php if(count($CARS) > 0){ echo $CARS[0]['mark']; } ?></h2>
        <div class="content">
            <div class="list">
                <?php if(count($CARS) > 0){
                        foreach($CARS as $car): ?>
                    <div class="item">
                        <div class="item-image">
                            <img src="<?=$car['image']?>" alt="">
                        </div>

                        <div class="item-body">
                            <div class="information">
                                <h4 class="information-title"><?=$car['mark']. ' ' . $car['name']?></h4>
                                <div class="information-price">
                                    <span class="price-new">от <?=$car['price']?>Р</span>
                                    <span class="price-base">от <?=$car['price_shop']?>Р</span>
                                </div>
                            </div>

                            <div class="actions">
                                <button class="discond-button">Выгода до <?=$car['price_shop']-$car['price']?>Р</button>
                            </div>
                        </div>
                    </div>

                <?php 
                    endforeach; 
                }
                ?>
            </div>
        </div>
    </section>
</div>