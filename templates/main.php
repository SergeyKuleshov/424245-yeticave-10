        <section class="promo">
            <h2 class="promo__title">Нужен стафф для катки?</h2>
            <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
            <ul class="promo__list">

                <?php foreach ($categories as $val): ?>

                    <li class="promo__item promo__<?= $val["char_code"] ?>">
                        <a class="promo__link" href="pages/all-lots.html"><?= htmlspecialchars($val["title"]) ?></a>
                    </li>

                <?php endforeach; ?>

            </ul>
        </section>
        <section class="lots">
            <div class="lots__header">
                <h2>Открытые лоты</h2>
            </div>
            <ul class="lots__list">

                <?php foreach ($advertisement as $key => $value): ?>

                    <?php $expiration_date = get_dt_range($value["expiration_date"]); ?>

                    <li class="lots__item lot">
                        <div class="lot__image">
                            <img src="<?= htmlspecialchars($value["url_picture"]); ?>" width="350" height="260" alt="">
                        </div>
                        <div class="lot__info">
                            <span class="lot__category"><?= htmlspecialchars($value["category"]); ?></span>
                            <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?= htmlspecialchars($value["title"]); ?></a></h3>
                            <div class="lot__state">
                                <div class="lot__rate">
                                    <span class="lot__amount">Стартовая цена</span>
                                    <span class="lot__cost"><?php if ($value["price"]): ?> <?= formatting_price($value["price"]); ?> <?php else: ?> <?= formatting_price($value["start_price"]); ?> <?php endif; ?></span>
                                </div>
                                <div class="lot__timer timer <?php if ($expiration_date["hours"] < 1): ?>timer--finishing<?php endif?>">
                                    <?= $expiration_date["hours"]; ?>
                                    <?= $expiration_date["colon"]; ?>
                                    <?= $expiration_date["minutes"]; ?>
                                </div>
                            </div>
                        </div>
                    </li>

                <?php endforeach; ?>

            </ul>
        </section>
