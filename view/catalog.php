<link rel="stylesheet" href="/view/res/css/new_auto.css">

<div class="container">
    <section id="brands">
        <h2 class="section-title">Каталог брендов</h2>
        <div class="content">
            <div class="list">
                <div class="item">
                    <img src="/view/res/img/brands/hyundai.png" alt="" class="brand-image">
                    <p class="brand-name">Hyundai</p>
                </div>
                <div class="item">
                    <img src="/view/res/img/brands/kia.png" alt="" class="brand-image">
                    <p class="brand-name">Kia</p>
                </div>
                <div class="item">
                    <img src="/view/res/img/brands/lada.png" alt="" class="brand-image">
                    <p class="brand-name">Lada</p>
                </div>
                <div class="item">
                    <img src="/view/res/img/brands/nissan.png" alt="" class="brand-image">
                    <p class="brand-name">Nissan</p>
                </div>
                <div class="item">
                    <img src="/view/res/img/brands/renault.png" alt="" class="brand-image">
                    <p class="brand-name">Renault</p>
                </div>
                <div class="item">
                    <img src="/view/res/img/brands/volks.png" alt="" class="brand-image">
                    <p class="brand-name">Volkswagen</p>
                </div>
            </div>
        </div>
    </section>

    <section id="selected-brand">
        <h2 class="section-title">Модельный ряд автомобилей Kia</h2>
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
                                    <span class="price-new">от <?=$car['price']?></span>
                                    <span class="price-base">от 1 367 000Р</span>
                                </div>
                            </div>

                            <div class="actions">
                                <button class="discond-button">Выгода до 390 000Р</button>
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