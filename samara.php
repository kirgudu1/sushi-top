<?php
include "meta.php"; // Подключаем файл с мета-информацией
$page = basename($_SERVER['PHP_SELF']);
$title = $meta_tags[$page]['title'] ?? "По умолчанию";
$description = $meta_tags[$page]['description'] ?? "Описание по умолчанию";
$h1 = $meta_tags[$page]['h1'] ?? $title; // Если H1 не указан, используем Title
$content = $meta_tags[$page]['content'] ?? ""; // Первый абзац после H1
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

<title><?= htmlspecialchars($title) ?></title>
<meta name="description" content="<?= htmlspecialchars($description) ?>">
	
</head>
<body>

<!-- Подключаем верхнее меню -->
<?php include 'header.php'; ?>



<?php
// Собираем список ТОП-доставок, чтобы sidebar.php использовал его
$sushiBlocks = [];
$rank = 1;

// Ищем все блоки с ТОП-доставками на странице
foreach (glob("*.php") as $filename) {
    if ($filename !== "sidebar.php" && $filename !== "header.php" && $filename !== "footer.php") {
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML(file_get_contents($filename));
        $xpath = new DOMXPath($dom);
        $nodes = $xpath->query('//div[contains(@class, "sushi-ranking")]');

        foreach ($nodes as $node) {
            $titleNode = $xpath->query('.//h2', $node);
            $title = $titleNode->length > 0 ? $titleNode->item(0)->nodeValue : "Без названия";
            $sushiBlocks[] = $title;
            $rank++;
        }
    }
}
?>

<!-- Подключаем боковое меню -->
<?php include 'sidebar.php'; ?>



	
	

    <!-- Основной контент -->
	
	    <div class="content">
   <div class="sushi-block">
   
   <!-- ======== МОЙ КОНТЕНТ НАЧАЛО ======== -->
	
<!-- ======== Заголовок страницы города ======== -->
<div class="city-header">
<h1><?= htmlspecialchars($h1) ?></h1>
<?php if (!empty($content)): ?>
    <p><?= nl2br(htmlspecialchars($content)) ?></p>
<?php endif; ?>
</div>
<!-- ======== Конец заголовка страницы города ======== -->
	<?php include 'rating-info.php'; ?>
	
<!-- ======== ЁбиДоёби НАЧАЛО ======== -->

<!-- ======== Основные данные начало ======== -->
<div class="sushi-ranking">
    <div class="rank-label"></div>
    <h2>ЁбиДоёби</h2>
    <ul>
        <li class="rating-item">
            <strong>Рейтинг:</strong> ⭐ <span class="rating-score">4.97</span><br>
            <span class="rating-text">на основе</span> <span class="rating-count">278</span> отзывов
        </li>
        <li><strong>География доставки:</strong> г. Самара, доставка по всему городу</li>
        <li><strong>Телефон:</strong> +7 (846) 392-45-78</li>
        <li><strong>Сайт:</strong> <a href="https://yobidoyobi.ru/" target="_blank">yobidoyobi.ru</a></li>
        <li><strong>Цены:</strong> от 500 рублей</li>
        <li><strong>График работы:</strong> ВС – ЧТ: 11:00 – 23:00; ПТ – СБ: 11:00 – 00:00</li>
    </ul>
</div>
<p>ЁбиДоёби — это доставка свежих суши и роллов, которая радует жителей Самары качественными ингредиентами и демократичными ценами. Быстро оформляйте заказ через сайт или приложение и наслаждайтесь вкусной японской кухней дома!</p>
<!-- ======== Основные данные конец ======== -->

<!-- ======== Блок Доставка и оплата ======== -->
<div class="sushi-section">
    <h3>📦 Доставка и оплата</h3>
    <ul class="delivery-list">
        <li><strong>Минимальная сумма заказа:</strong> <span class="price-highlight">500 рублей</span></li>
        <li>
            <ul class="delivery-cost">
                <li>✅ <span class="delivery-text"><strong>Доставка бесплатно</strong> при заказе от</span> <span class="price-highlight">800 рублей</span></li>
                <li>💰 <span class="delivery-text"><strong>Стоимость доставки:</strong></span> <span class="price-highlight">100 рублей</span> <span class="delivery-text">при заказе на меньшую сумму</span></li>
            </ul>
        </li>
        <li><strong>Способы оплаты:</strong> <span class="payment-methods">Наличные, Банковские карты, Онлайн-оплата, Электронные кошельки, СБП</span></li>
    </ul>
</div>
<!-- ======== Конец блока Доставка и оплата ======== -->

<!-- ======== Меню начало ======== -->
<div class="sushi-section">
    <h3>🍽️ Выбор блюд</h3>
    <ul>
        <li>🍣 Классические и запеченные роллы</li>
        <li>🍱 Суши с лососем, тунцом и угрем</li>
        <li>🥢 Разнообразные сеты</li>
        <li>🍜 Горячие блюда и темпура</li>
        <li>🥗 Свежие салаты</li>
        <li>🍶 Соусы и напитки</li>
        <li>🍰 Десерты</li>
    </ul>
</div>
<!-- ======== Меню конец ======== -->

<!-- ======== Блок Акции и бонусы ======== -->
<div class="sushi-section">
    <h3>🎁 Акции и бонусы</h3>
    <ul>
        <li>🎁 Бесплатные соусы к заказу</li>
        <li>💳 Накопительные бонусы для постоянных клиентов</li>
        <li>🔥 Скидки на популярные позиции</li>
    </ul>
</div>
<!-- ======== Конец блока Акции и бонусы ======== -->

<!-- ======== Преимущества и Недостатки ======== -->
<div class="sushi-section">
    <h3>✅ Преимущества</h3>
    <ul class="advantage-list">
        <li>Широкий ассортимент японской кухни</li>
        <li>Свежие и качественные ингредиенты</li>
        <li>Быстрая доставка по Самаре</li>
        <li>Регулярные акции и скидки</li>
        <li>Экологичная упаковка</li>
    </ul>

    <h3>❌ Недостатки</h3>
    <ul class="disadvantage-list">
        <li>Минимальная сумма заказа для бесплатной доставки</li>
        <li>Возможные задержки в пиковые часы</li>
    </ul>
</div>
<!-- ======== Конец блока Преимущества и Недостатки ======== -->

<!-- ======== Блок Как сделать заказ? начало ======== -->
<div class="sushi-section">
    <h3>🛒 Как сделать заказ?</h3>
    <ul class="order-steps">
        <li class="rating-item">
            📱 <span class="order-text">Посетите сайт</span> 
            <a href="https://yobidoyobi.ru/" target="_blank">yobidoyobi.ru</a><br>
            <span class="order-text">или скачайте приложение</span>
        </li>
        <li>🍣 <span class="order-text">Выберите блюда и добавьте в корзину</span></li>
        <li>💳 <span class="order-text">Оформите заказ и выберите удобный способ оплаты</span></li>
        <li>🚀 <span class="order-text">Дождитесь курьера и наслаждайтесь вкусной едой!</span></li>
    </ul>
    <a href="https://yobidoyobi.ru/" target="_blank" class="order-button">Посмотреть цены в ЁбиДоёби</a>
</div>
<!-- ======== Конец блока Как сделать заказ? ======== -->

<!-- ======== Разделитель ======== -->
<div class="section-divider"></div>

<!-- ======== ЁбиДоёби КОНЕЦ ======== -->




<!-- ======== Ollis НАЧАЛО ======== -->

<!-- ======== Основные данные начало ======== -->
<div class="sushi-ranking">
    <div class="rank-label"></div>
    <h2>Ollis</h2>
    <ul>
        <li class="rating-item">
            <strong>Рейтинг:</strong> ⭐ <span class="rating-score">4.93</span><br>
            <span class="rating-text">на основе</span> <span class="rating-count">278</span> отзывов
        </li>
        <li><strong>География доставки:</strong> г. Самара, доставка по всему городу</li>
        <li><strong>Телефон:</strong> +7 (846) 274-65-32</li>
        <li><strong>Сайт:</strong> <a href="https://ollis.ru/" target="_blank">ollis.ru</a></li>
        <li><strong>Цены:</strong> от 500 рублей</li>
        <li><strong>График работы:</strong> Круглосуточно</li>
    </ul>
</div>
<p>Ollis — ресторан японской кухни, предлагающий широкий ассортимент роллов, суши и горячих блюд. Популярен среди жителей Самары благодаря высокому качеству блюд, быстрой доставке и приятным ценам. Заказать можно через сайт, приложение или по телефону.</p>
<!-- ======== Основные данные конец ======== -->

<!-- ======== Блок Доставка и оплата ======== -->
<div class="sushi-section">
    <h3>📦 Доставка и оплата</h3>
    <ul class="delivery-list">
        <li><strong>Минимальная сумма заказа:</strong> <span class="price-highlight">500 рублей</span></li>
        <li>
            <ul class="delivery-cost">
                <li>✅ <span class="delivery-text"><strong>Доставка бесплатно</strong> при заказе от</span> <span class="price-highlight">700 рублей</span></li>
                <li>💰 <span class="delivery-text"><strong>Стоимость доставки:</strong></span> <span class="price-highlight">149 рублей</span> <span class="delivery-text">при заказе на меньшую сумму</span></li>
            </ul>
        </li>
        <li><strong>Способы оплаты:</strong> <span class="payment-methods">Наличные, Банковские карты, Онлайн-оплата, Электронные кошельки, СБП</span></li>
    </ul>
</div>
<!-- ======== Конец блока Доставка и оплата ======== -->

<!-- ======== Меню начало ======== -->
<div class="sushi-section">
    <h3>🍽️ Выбор блюд</h3>
    <ul>
        <li>🍣 Классические и запеченные роллы</li>
        <li>🍱 Суши с разными видами рыбы</li>
        <li>🥢 Наборы суши и роллов</li>
        <li>🍕 Пицца с разными начинками</li>
        <li>🍜 Горячие блюда WOK</li>
        <li>🥗 Поке, салаты и закуски</li>
        <li>🍲 Супы и горячие блюда</li>
        <li>🍰 Десерты и напитки</li>
    </ul>
</div>
<!-- ======== Меню конец ======== -->

<!-- ======== Блок Акции и бонусы ======== -->
<div class="sushi-section">
    <h3>🎁 Акции и бонусы</h3>
    <ul>
        <li>🎁 Бесплатные соусы к блюдам</li>
        <li>💳 Программа лояльности с накопительными бонусами</li>
        <li>🔥 Регулярные скидки и акции</li>
    </ul>
</div>
<!-- ======== Конец блока Акции и бонусы ======== -->

<!-- ======== Преимущества и Недостатки ======== -->
<div class="sushi-section">
    <h3>✅ Преимущества</h3>
    <ul class="advantage-list">
        <li>Широкий ассортимент блюд</li>
        <li>Только свежие ингредиенты</li>
        <li>Быстрая доставка по городу</li>
        <li>Приятные акции и бонусы</li>
        <li>Экологичная упаковка</li>
    </ul>

    <h3>❌ Недостатки</h3>
    <ul class="disadvantage-list">
        <li>Минимальная сумма заказа для бесплатной доставки</li>
        <li>Возможные задержки в часы пик</li>
    </ul>
</div>
<!-- ======== Конец блока Преимущества и Недостатки ======== -->

<!-- ======== Блок Как сделать заказ? ======== -->
<div class="sushi-section">
    <h3>🛒 Как сделать заказ?</h3>
    <ul class="order-steps">
        <li class="rating-item">
            📱 <span class="order-text">Посетите сайт</span> 
            <a href="https://ollis.ru/" target="_blank">ollis.ru</a><br>
            <span class="order-text">или скачайте приложение</span>
        </li>
        <li>🍣 <span class="order-text">Выберите любимые блюда и добавьте их в заказ</span></li>
        <li>💳 <span class="order-text">Оплатите удобным способом</span></li>
        <li>🚀 <span class="order-text">Ожидайте курьера и наслаждайтесь вкусом</span></li>
    </ul>
    <a href="https://ollis.ru/" target="_blank" class="order-button">Посмотреть цены в Ollis</a>
</div>
<!-- ======== Конец блока Как сделать заказ? ======== -->

<!-- ======== Разделитель ======== -->
<div class="section-divider"></div>

<!-- ======== Ollis КОНЕЦ ======== -->





<!-- ======== FoodBand НАЧАЛО ======== -->	

<!-- ======== Основные данные начало ======== -->
<div class="sushi-ranking">
    <div class="rank-label"></div>
    <h2>FoodBand</h2>
    <ul>
        <li class="rating-item">
            <strong>Рейтинг:</strong> ⭐ <span class="rating-score">4.88</span><br>
            <span class="rating-text">на основе</span> <span class="rating-count">274</span> отзывов
        </li>
        <li><strong>География доставки:</strong> г. Самара, доставка по всему городу</li>
        <li><strong>Телефон:</strong> +7 (846) 267-89-45</li>
        <li><strong>Сайт:</strong> <a href="https://foodband.ru/" target="_blank">foodband.ru</a></li>
        <li><strong>Цены:</strong> от 500 рублей</li>
        <li><strong>График работы:</strong> Круглосуточно</li>
    </ul>
</div>
<p>FoodBand — это ресторан японской кухни, который радует клиентов вкусными и качественными роллами, суши и пиццей. Доставка всегда быстрая, заказ можно оформить в любое время суток по Самаре. FoodBand предлагает выгодные акции, свежие ингредиенты и удобный сервис!</p>
<!-- ======== Основные данные конец ======== -->

<!-- ======== Блок Доставка и оплата ======== -->
<div class="sushi-section">
    <h3>📦 Доставка и оплата</h3>
    <ul class="delivery-list">
        <li><strong>Минимальная сумма заказа:</strong> <span class="price-highlight">500 рублей</span></li>
        <li>
            <ul class="delivery-cost">
                <li>✅ <span class="delivery-text"><strong>Доставка бесплатно</strong> при заказе от</span> <span class="price-highlight">1500 рублей</span></li>
                <li>💰 <span class="delivery-text"><strong>Стоимость доставки:</strong></span> <span class="price-highlight">149 рублей</span> <span class="delivery-text">при заказе на меньшую сумму</span></li>
            </ul>
        </li>
        <li><strong>Способы оплаты:</strong> <span class="payment-methods">Наличные, Банковские карты, Онлайн-оплата, Электронные кошельки, СБП</span></li>
    </ul>
</div>
<!-- ======== Конец блока Доставка и оплата ======== -->

<!-- ======== Меню начало ======== -->
<div class="sushi-section">
    <h3>🍽️ Выбор блюд</h3>
    <ul>
        <li>🍣 Разнообразные роллы и суши</li>
        <li>🍕 Более 25 видов пиццы</li>
        <li>🍱 Большие сеты для компании</li>
        <li>🥢 Поке и боулы</li>
        <li>🥗 Свежие салаты</li>
        <li>🍜 Вок и горячие супы</li>
        <li>🍰 Десерты и закуски</li>
        <li>🥤 Напитки и фирменные соусы</li>
    </ul>
</div>
<!-- ======== Меню конец ======== -->

<!-- ======== Блок Акции и бонусы ======== -->
<div class="sushi-section">
    <h3>🎁 Акции и бонусы</h3>
    <ul>
        <li>🔥 Скидки на популярные позиции меню</li>
        <li>🎁 Промокоды для новых пользователей приложения</li>
        <li>🍕 Бесплатная пицца при первом заказе в приложении</li>
        <li>📦 Специальные корпоративные предложения</li>
    </ul>
</div>
<!-- ======== Конец блока Акции и бонусы ======== -->

<!-- ======== Преимущества и Недостатки ======== -->
<div class="sushi-section">
    <h3>✅ Преимущества</h3>
    <ul class="advantage-list">
        <li>Большой выбор блюд</li>
        <li>Круглосуточная доставка</li>
        <li>Свежие и натуральные ингредиенты</li>
        <li>Быстрая доставка по Самаре</li>
        <li>Регулярные акции и скидки</li>
        <li>Экологичная упаковка</li>
    </ul>

    <h3>❌ Недостатки</h3>
    <ul class="disadvantage-list">
        <li>Минимальная сумма для бесплатной доставки</li>
        <li>Возможны задержки в часы пик</li>
    </ul>
</div>
<!-- ======== Конец блока Преимущества и Недостатки ======== -->

<!-- ======== Блок Как сделать заказ? начало ======== -->
<div class="sushi-section">
    <h3>🛒 Как сделать заказ?</h3>
    <ul class="order-steps">
        <li class="rating-item">
            📱 <span class="order-text">Посетите сайт</span> 
            <a href="https://foodband.ru/" target="_blank">foodband.ru</a><br>
            <span class="order-text">или скачайте приложение</span>
        </li>
        <li>🍣 <span class="order-text">Выберите любимые блюда и добавьте их в корзину</span></li>
        <li>💳 <span class="order-text">Оформите заказ и выберите удобный способ оплаты</span></li>
        <li>🚀 <span class="order-text">Получите заказ и наслаждайтесь вкусом!</span></li>
    </ul>
    <a href="https://foodband.ru/" target="_blank" class="order-button">Посмотреть цены в FoodBand</a>
</div>
<!-- ======== Конец блока Как сделать заказ? ======== -->

<!-- ======== Разделитель ======== -->
<div class="section-divider"></div>

<!-- ======== FoodBand КОНЕЦ ======== -->



<!-- ======== ПиццаСушиВок НАЧАЛО ======== -->	

<!-- ======== Основные данные начало ======== -->
<div class="sushi-ranking">
    <div class="rank-label"></div>
    <h2>ПиццаСушиВок</h2>
    <ul>
        <li class="rating-item">
            <strong>Рейтинг:</strong> ⭐ <span class="rating-score">4.79</span><br>
            <span class="rating-text">на основе</span> <span class="rating-count">312</span> отзывов
        </li>
        <li><strong>География доставки:</strong> г. Самара, доставка по всему городу</li>
        <li><strong>Телефон:</strong> +7 (846) 275-94-31</li>
        <li><strong>Сайт:</strong> <a href="https://pizzasushiwok.ru/" target="_blank">pizzasushiwok.ru</a></li>
        <li><strong>Цены:</strong> от 500 рублей</li>
        <li><strong>График работы:</strong> с 08:00 до 05:00</li>
    </ul>
</div>
<p>ПиццаСушиВок — это ресторан, где сочетаются лучшие традиции японской и итальянской кухни. В меню есть свежие роллы, сочная пицца и разнообразные закуски. Быстрая доставка по Самаре, удобный заказ онлайн и приятные акции делают ПиццаСушиВок отличным выбором для вкусного ужина!</p>
<!-- ======== Основные данные конец ======== -->

<!-- ======== Блок Доставка и оплата ======== -->
<div class="sushi-section">
    <h3>📦 Доставка и оплата</h3>
    <ul class="delivery-list">
        <li><strong>Минимальная сумма заказа:</strong> <span class="price-highlight">500 рублей</span></li>
        <li>
            <ul class="delivery-cost">
                <li>✅ <span class="delivery-text"><strong>Доставка бесплатно</strong> при заказе от</span> <span class="price-highlight">750 рублей</span></li>
                <li>💰 <span class="delivery-text"><strong>Стоимость доставки:</strong></span> <span class="price-highlight">149 рублей</span> <span class="delivery-text">при заказе на меньшую сумму</span></li>
            </ul>
        </li>
        <li><strong>Способы оплаты:</strong> <span class="payment-methods">Наличные, Банковские карты, Онлайн-оплата, Электронные кошельки, СБП</span></li>
    </ul>
</div>
<!-- ======== Конец блока Доставка и оплата ======== -->

<!-- ======== Меню начало ======== -->
<div class="sushi-section">
    <h3>🍽️ Выбор блюд</h3>
    <ul>
        <li>🍣 Классические и запеченные роллы</li>
        <li>🍕 Пицца на любой вкус</li>
        <li>🍱 Сеты с суши и роллами</li>
        <li>🥡 Ароматный wok</li>
        <li>🥪 Сытные сэндвичи</li>
        <li>🥗 Свежие салаты</li>
        <li>🍜 Горячие супы</li>
        <li>🍰 Десерты и сладости</li>
        <li>🥤 Напитки и соусы</li>
    </ul>
</div>
<!-- ======== Меню конец ======== -->

<!-- ======== Блок Акции и бонусы ======== -->
<div class="sushi-section">
    <h3>🎁 Акции и бонусы</h3>
    <ul>
        <li>🔥 Выгодные скидки на популярные блюда</li>
        <li>🎁 Промокоды для новых пользователей</li>
        <li>🍕 Бесплатная пицца при первом заказе в приложении</li>
        <li>📦 Специальные корпоративные предложения</li>
    </ul>
</div>
<!-- ======== Конец блока Акции и бонусы ======== -->

<!-- ======== Преимущества и Недостатки ======== -->
<div class="sushi-section">
    <h3>✅ Преимущества</h3>
    <ul class="advantage-list">
        <li>Широкий ассортимент блюд</li>
        <li>Доставка работает почти круглосуточно</li>
        <li>Свежие и качественные ингредиенты</li>
        <li>Быстрое выполнение заказов</li>
        <li>Приятные акции и скидки</li>
        <li>Экологичная упаковка</li>
    </ul>

    <h3>❌ Недостатки</h3>
    <ul class="disadvantage-list">
        <li>Минимальная сумма для бесплатной доставки</li>
        <li>Возможны задержки в вечерние часы</li>
    </ul>
</div>
<!-- ======== Конец блока Преимущества и Недостатки ======== -->

<!-- ======== Блок Как сделать заказ? начало ======== -->
<div class="sushi-section">
    <h3>🛒 Как сделать заказ?</h3>
    <ul class="order-steps">
        <li class="rating-item">
            📱 <span class="order-text">Посетите сайт</span> 
            <a href="https://pizzasushiwok.ru/" target="_blank">pizzasushiwok.ru</a><br>
            <span class="order-text">или скачайте приложение</span>
        </li>
        <li>🍣 <span class="order-text">Выберите любимые блюда и отправьте их в корзину</span></li>
        <li>💳 <span class="order-text">Оформите заказ и выберите удобный вариант оплаты</span></li>
        <li>🚀 <span class="order-text">Получите заказ и наслаждайтесь вкусом!</span></li>
    </ul>
    <a href="https://pizzasushiwok.ru/" target="_blank" class="order-button">Посмотреть цены в ПиццаСушиВок</a>
</div>
<!-- ======== Конец блока Как сделать заказ? ======== -->

<!-- ======== Разделитель ======== -->
<div class="section-divider"></div>

<!-- ======== ПиццаСушиВок КОНЕЦ ======== -->


<!-- ======== Нияма НАЧАЛО ======== -->	

<!-- ======== Основные данные начало ======== -->
<div class="sushi-ranking">
    <div class="rank-label"></div>
    <h2>Нияма</h2>
    <ul>
        <li class="rating-item">
            <strong>Рейтинг:</strong> ⭐ <span class="rating-score">4.75</span><br>
            <span class="rating-text">на основе</span> <span class="rating-count">289</span> отзывов
        </li>
        <li><strong>География доставки:</strong> г. Самара, доставка по всему городу</li>
        <li><strong>Телефон:</strong> +7 (846) 287-65-43</li>
        <li><strong>Сайт:</strong> <a href="https://niyama.ru/" target="_blank">niyama.ru</a></li>
        <li><strong>Цены:</strong> от 500 рублей</li>
        <li><strong>График работы:</strong> с 10:00 до 23:00</li>
    </ul>
</div>
<p>Нияма — сеть японских ресторанов, которая радует клиентов свежими роллами, сочной пиццей и изысканными горячими блюдами. Доставка работает по Самаре, заказ можно сделать онлайн или по телефону. В Нияма всегда качественное обслуживание, выгодные акции и вкуснейшие блюда!</p>
<!-- ======== Основные данные конец ======== -->

<!-- ======== Блок Доставка и оплата ======== -->
<div class="sushi-section">
    <h3>📦 Доставка и оплата</h3>
    <ul class="delivery-list">
        <li><strong>Минимальная сумма заказа:</strong> <span class="price-highlight">500 рублей</span></li>
        <li>
            <ul class="delivery-cost">
                <li>✅ <span class="delivery-text"><strong>Доставка бесплатно</strong> при заказе от</span> <span class="price-highlight">990 рублей</span></li>
                <li>💰 <span class="delivery-text"><strong>Стоимость доставки:</strong></span> <span class="price-highlight">149 рублей</span> <span class="delivery-text">при заказе на меньшую сумму</span></li>
            </ul>
        </li>
        <li><strong>Способы оплаты:</strong> <span class="payment-methods">Наличные, Банковские карты, Онлайн-оплата, Электронные кошельки, СБП</span></li>
    </ul>
</div>
<!-- ======== Конец блока Доставка и оплата ======== -->

<!-- ======== Меню начало ======== -->
<div class="sushi-section">
    <h3>🍽️ Выбор блюд</h3>
    <ul>
        <li>🍣 Роллы и суши: классические, запеченные, темпура</li>
        <li>🍕 Пицца с различными начинками</li>
        <li>🍱 Сеты для компании</li>
        <li>🥗 Свежие салаты</li>
        <li>🍜 Азиатские супы</li>
        <li>🔥 Горячие блюда</li>
        <li>🍰 Десерты</li>
        <li>🥤 Напитки и соусы</li>
    </ul>
</div>
<!-- ======== Меню конец ======== -->

<!-- ======== Блок Акции и бонусы ======== -->
<div class="sushi-section">
    <h3>🎁 Акции и бонусы</h3>
    <ul>
        <li>🔥 Скидки на популярные блюда</li>
        <li>🎁 Бонусная программа для постоянных клиентов</li>
        <li>🍕 Бесплатная пицца при первом заказе в приложении</li>
        <li>📦 Выгодные корпоративные предложения</li>
    </ul>
</div>
<!-- ======== Конец блока Акции и бонусы ======== -->

<!-- ======== Преимущества и Недостатки ======== -->
<div class="sushi-section">
    <h3>✅ Преимущества</h3>
    <ul class="advantage-list">
        <li>Большой выбор блюд</li>
        <li>Свежие ингредиенты</li>
        <li>Качественное обслуживание</li>
        <li>Быстрая доставка</li>
        <li>Программа лояльности и акции</li>
        <li>Экологичная упаковка</li>
    </ul>

    <h3>❌ Недостатки</h3>
    <ul class="disadvantage-list">
        <li>Минимальная сумма заказа для бесплатной доставки</li>
        <li>Иногда возможны задержки в часы пик</li>
    </ul>
</div>
<!-- ======== Конец блока Преимущества и Недостатки ======== -->

<!-- ======== Блок Как сделать заказ? начало ======== -->
<div class="sushi-section">
    <h3>🛒 Как сделать заказ?</h3>
    <ul class="order-steps">
        <li class="rating-item">
            📱 <span class="order-text">Посетите сайт</span> 
            <a href="https://niyama.ru/" target="_blank">niyama.ru</a><br>
            <span class="order-text">или скачайте приложение</span>
        </li>
        <li>🍣 <span class="order-text">Выберите блюда и добавьте их в заказ</span></li>
        <li>💳 <span class="order-text">Оплатите удобным способом</span></li>
        <li>🚀 <span class="order-text">Получите заказ и наслаждайтесь вкусом!</span></li>
    </ul>
    <a href="https://niyama.ru/" target="_blank" class="order-button">Посмотреть цены в Нияма</a>
</div>
<!-- ======== Конец блока Как сделать заказ? ======== -->

<!-- ======== Разделитель ======== -->
<div class="section-divider"></div>

<!-- ======== Нияма КОНЕЦ ======== -->


<!-- ======== Два Берега НАЧАЛО ======== -->	

<!-- ======== Основные данные начало ======== -->
<div class="sushi-ranking">
    <div class="rank-label"></div>
    <h2>Два Берега</h2>
    <ul>
        <li class="rating-item">
            <strong>Рейтинг:</strong> ⭐ <span class="rating-score">4.71</span><br>
            <span class="rating-text">на основе</span> <span class="rating-count">315</span> отзывов
        </li>
        <li><strong>География доставки:</strong> г. Самара, доставка по всему городу</li>
        <li><strong>Телефон:</strong> +7 (846) 229-58-58</li>
        <li><strong>Сайт:</strong> <a href="https://2-berega.ru/" target="_blank">2-berega.ru</a></li>
        <li><strong>Цены:</strong> от 600 рублей</li>
        <li><strong>График работы:</strong> Круглосуточно</li>
    </ul>
</div>
<p>Два Берега — популярная сеть ресторанов, где можно заказать свежие роллы, суши, сеты и пиццу. Доставка в Самаре выполняется быстро — от 29 минут, а выгодные акции делают заказы ещё приятнее. Два Берега предлагает удобный онлайн-сервис и отличное качество блюд!</p>
<!-- ======== Основные данные конец ======== -->

<!-- ======== Блок Доставка и оплата ======== -->
<div class="sushi-section">
    <h3>📦 Доставка и оплата</h3>
    <ul class="delivery-list">
        <li><strong>Минимальная сумма заказа:</strong> <span class="price-highlight">600 рублей</span></li>
        <li>
            <ul class="delivery-cost">
                <li>✅ <span class="delivery-text"><strong>Доставка бесплатно</strong> от</span> <span class="price-highlight">600 рублей</span></li>
            </ul>
        </li>
        <li><strong>Способы оплаты:</strong> <span class="payment-methods">Наличные, Банковские карты, Онлайн-оплата, Электронные кошельки, СБП</span></li>
    </ul>
</div>
<!-- ======== Конец блока Доставка и оплата ======== -->

<!-- ======== Меню начало ======== -->
<div class="sushi-section">
    <h3>🍽️ Выбор блюд</h3>
    <ul>
        <li>🍣 Разнообразные роллы и суши</li>
        <li>🍕 Пицца с разными начинками</li>
        <li>🍱 Большие сеты</li>
        <li>🥡 Азиатский WOK</li>
        <li>🌭 Стритфуд и сэндвичи</li>
        <li>🥗 Свежие салаты</li>
        <li>🍜 Горячие супы</li>
        <li>🍰 Десерты</li>
        <li>🥤 Напитки и соусы</li>
    </ul>
</div>
<!-- ======== Меню конец ======== -->

<!-- ======== Блок Акции и бонусы ======== -->
<div class="sushi-section">
    <h3>🎁 Акции и бонусы</h3>
    <ul>
        <li>🔥 Скидки до 50% на популярные позиции</li>
        <li>🎁 Программа лояльности с накопительными бонусами</li>
        <li>🍕 Специальные предложения на сеты и комбо</li>
        <li>📦 Корпоративные скидки</li>
    </ul>
</div>
<!-- ======== Конец блока Акции и бонусы ======== -->

<!-- ======== Преимущества и Недостатки ======== -->
<div class="sushi-section">
    <h3>✅ Преимущества</h3>
    <ul class="advantage-list">
        <li>Широкий выбор блюд</li>
        <li>Бесплатная доставка от 29 минут</li>
        <li>Круглосуточная работа</li>
        <li>Высокое качество обслуживания</li>
        <li>Выгодные скидки и акции</li>
        <li>Экологичная упаковка</li>
    </ul>

    <h3>❌ Недостатки</h3>
    <ul class="disadvantage-list">
        <li>Минимальная сумма заказа для бесплатной доставки</li>
        <li>Возможны задержки в вечерние часы</li>
    </ul>
</div>
<!-- ======== Конец блока Преимущества и Недостатки ======== -->

<!-- ======== Блок Как сделать заказ? начало ======== -->
<div class="sushi-section">
    <h3>🛒 Как сделать заказ?</h3>
    <ul class="order-steps">
        <li class="rating-item">
            📱 <span class="order-text">Посетите сайт</span> 
            <a href="https://2-berega.ru/" target="_blank">2-berega.ru</a><br>
            <span class="order-text">или скачайте приложение</span>
        </li>
        <li>🍣 <span class="order-text">Выберите любимые блюда и отправьте их в корзину</span></li>
        <li>💳 <span class="order-text">Оплатите удобным способом</span></li>
        <li>🚀 <span class="order-text">Получите заказ и наслаждайтесь вкусом!</span></li>
    </ul>
    <a href="https://2-berega.ru/" target="_blank" class="order-button">Посмотреть цены в Два Берега</a>
</div>
<!-- ======== Конец блока Как сделать заказ? ======== -->

<!-- ======== Разделитель ======== -->
<div class="section-divider"></div>

<!-- ======== Два Берега КОНЕЦ ======== -->


<!-- ======== PushPizza НАЧАЛО ======== -->	

<!-- ======== Основные данные начало ======== -->
<div class="sushi-ranking">
    <div class="rank-label"></div>
    <h2>PushPizza</h2>
    <ul>
        <li class="rating-item">
            <strong>Рейтинг:</strong> ⭐ <span class="rating-score">4.8</span><br>
            <span class="rating-text">на основе</span> <span class="rating-count">312</span> отзывов
        </li>
        <li><strong>География доставки:</strong> г. Самара, доставка по всему городу</li>
        <li><strong>Телефон:</strong> +7 (846) 287-61-52</li>
        <li><strong>Сайт:</strong> <a href="https://pushpizza.ru/" target="_blank">pushpizza.ru</a></li>
        <li><strong>Цены:</strong> от 1000 рублей</li>
        <li><strong>График работы:</strong> Круглосуточно</li>
    </ul>
</div>
<p>PushPizza — это доставка, которая сочетает вкусные блюда из японской, итальянской и американской кухни. В меню пицца, суши, бургеры и вок — на любой вкус! В Самаре можно заказать онлайн, а доставка приедет всего за 60 минут. Отличный выбор для вечеринки или уютного ужина!</p>
<!-- ======== Основные данные конец ======== -->

<!-- ======== Блок Доставка и оплата ======== -->
<div class="sushi-section">
    <h3>📦 Доставка и оплата</h3>
    <ul class="delivery-list">
        <li><strong>Минимальная сумма заказа:</strong> <span class="price-highlight">1000 рублей</span></li>
        <li>
            <ul class="delivery-cost">
                <li>✅ <span class="delivery-text"><strong>Доставка бесплатно</strong> при заказе от</span> <span class="price-highlight">1000 рублей</span></li>
            </ul>
        </li>
        <li><strong>Способы оплаты:</strong> <span class="payment-methods">Наличные, Банковские карты, Онлайн-оплата, Электронные кошельки, СБП</span></li>
    </ul>
</div>
<!-- ======== Конец блока Доставка и оплата ======== -->

<!-- ======== Меню начало ======== -->
<div class="sushi-section">
    <h3>🍽️ Выбор блюд</h3>
    <ul>
        <li>🍕 Пицца с разными начинками</li>
        <li>🍣 Роллы и суши</li>
        <li>🍔 Сочные бургеры</li>
        <li>🥡 Азиатский вок</li>
        <li>🥗 Свежие салаты</li>
        <li>🍜 Горячие супы</li>
        <li>🍟 Закуски и стритфуд</li>
        <li>🍰 Десерты</li>
        <li>🥤 Напитки и соусы</li>
    </ul>
</div>
<!-- ======== Меню конец ======== -->

<!-- ======== Блок Акции и бонусы ======== -->
<div class="sushi-section">
    <h3>🎁 Акции и бонусы</h3>
    <ul>
        <li>🔥 Скидки на популярные позиции</li>
        <li>🎁 Промокоды на первый заказ</li>
        <li>🍕 Бесплатная пицца при заказе от 2000 рублей</li>
        <li>📦 Бонусная программа для постоянных клиентов</li>
    </ul>
</div>
<!-- ======== Конец блока Акции и бонусы ======== -->

<!-- ======== Преимущества и Недостатки ======== -->
<div class="sushi-section">
    <h3>✅ Преимущества</h3>
    <ul class="advantage-list">
        <li>Большой выбор блюд из разных кухонь</li>
        <li>Быстрая доставка за 60 минут</li>
        <li>Круглосуточная работа</li>
        <li>Выгодные акции и скидки</li>
        <li>Удобный онлайн-заказ</li>
    </ul>

    <h3>❌ Недостатки</h3>
    <ul class="disadvantage-list">
        <li>Достаточно высокая минимальная сумма заказа</li>
        <li>Возможны задержки в часы пик</li>
    </ul>
</div>
<!-- ======== Конец блока Преимущества и Недостатки ======== -->

<!-- ======== Блок Как сделать заказ? начало ======== -->
<div class="sushi-section">
    <h3>🛒 Как сделать заказ?</h3>
    <ul class="order-steps">
        <li class="rating-item">
            📱 <span class="order-text">Посетите сайт</span> 
            <a href="https://pushpizza.ru/" target="_blank">pushpizza.ru</a><br>
            <span class="order-text">или скачайте приложение</span>
        </li>
        <li>🍣 <span class="order-text">Выберите блюда и добавьте их в корзину</span></li>
        <li>💳 <span class="order-text">Оплатите удобным способом</span></li>
        <li>🚀 <span class="order-text">Ожидайте доставку в течение часа и наслаждайтесь!</span></li>
    </ul>
    <a href="https://pushpizza.ru/" target="_blank" class="order-button">Посмотреть цены в PushPizza</a>
</div>
<!-- ======== Конец блока Как сделать заказ? ======== -->

<!-- ======== Разделитель ======== -->
<div class="section-divider"></div>

<!-- ======== PushPizza КОНЕЦ ======== -->


<!-- ======== Премьер Пицца НАЧАЛО ======== -->	

<!-- ======== Основные данные начало ======== -->
<div class="sushi-ranking">
    <div class="rank-label"></div>
    <h2>Премьер Пицца</h2>
    <ul>
        <li class="rating-item">
            <strong>Рейтинг:</strong> ⭐ <span class="rating-score">4.73</span><br>
            <span class="rating-text">на основе</span> <span class="rating-count">351</span> отзывов
        </li>
        <li><strong>География доставки:</strong> г. Самара, доставка по всему городу</li>
        <li><strong>Телефон:</strong> +7 (846) 265-73-82</li>
        <li><strong>Сайт:</strong> <a href="https://premierpizza.ru/" target="_blank">premierpizza.ru</a></li>
        <li><strong>Цены:</strong> от 600 рублей</li>
        <li><strong>График работы:</strong> Круглосуточно</li>
    </ul>
</div>
<p>Премьер Пицца — это доставка вкусной еды в Самаре, где можно заказать пиццу, суши, бургеры и даже шашлыки. Быстрая доставка, большой выбор блюд и доступные цены делают заказы в Премьер Пицца удобными и выгодными!</p>
<!-- ======== Основные данные конец ======== -->

<!-- ======== Блок Доставка и оплата ======== -->
<div class="sushi-section">
    <h3>📦 Доставка и оплата</h3>
    <ul class="delivery-list">
        <li><strong>Минимальная сумма заказа:</strong> <span class="price-highlight">600 рублей</span></li>
        <li>
            <ul class="delivery-cost">
                <li>✅ <span class="delivery-text"><strong>Доставка бесплатно</strong> при заказе от</span> <span class="price-highlight">600 рублей</span></li>
            </ul>
        </li>
        <li><strong>Способы оплаты:</strong> <span class="payment-methods">Наличные, Банковские карты, Онлайн-оплата, Электронные кошельки, СБП</span></li>
    </ul>
</div>
<!-- ======== Конец блока Доставка и оплата ======== -->

<!-- ======== Меню начало ======== -->
<div class="sushi-section">
    <h3>🍽️ Выбор блюд</h3>
    <ul>
        <li>🍕 Разнообразные пиццы</li>
        <li>🍣 Роллы и суши</li>
        <li>🍔 Бургеры</li>
        <li>🥡 Азиатский вок</li>
        <li>🍢 Шашлыки</li>
        <li>🌯 Шаурма</li>
        <li>🍜 Горячие супы</li>
        <li>🥗 Свежие салаты</li>
        <li>🍰 Десерты</li>
        <li>🥤 Напитки и соусы</li>
    </ul>
</div>
<!-- ======== Меню конец ======== -->

<!-- ======== Блок Акции и бонусы ======== -->
<div class="sushi-section">
    <h3>🎁 Акции и бонусы</h3>
    <ul>
        <li>🔥 Скидки на популярные блюда</li>
        <li>🎁 Бонусная программа для постоянных клиентов</li>
        <li>🍕 Бесплатная пицца при заказе от 1500 рублей</li>
        <li>📦 Выгодные комбо-наборы</li>
    </ul>
</div>
<!-- ======== Конец блока Акции и бонусы ======== -->

<!-- ======== Преимущества и Недостатки ======== -->
<div class="sushi-section">
    <h3>✅ Преимущества</h3>
    <ul class="advantage-list">
        <li>Широкий ассортимент блюд</li>
        <li>Доставка в течение 60 минут</li>
        <li>Большие порции и доступные цены</li>
        <li>Акции и скидки на популярные позиции</li>
        <li>Круглосуточная работа</li>
    </ul>

    <h3>❌ Недостатки</h3>
    <ul class="disadvantage-list">
        <li>Минимальная сумма заказа для бесплатной доставки</li>
        <li>Возможны задержки в вечерние часы</li>
    </ul>
</div>
<!-- ======== Конец блока Преимущества и Недостатки ======== -->

<!-- ======== Блок Как сделать заказ? начало ======== -->
<div class="sushi-section">
    <h3>🛒 Как сделать заказ?</h3>
    <ul class="order-steps">
        <li class="rating-item">
            📱 <span class="order-text">Посетите сайт</span> 
            <a href="https://premierpizza.ru/" target="_blank">premierpizza.ru</a><br>
            <span class="order-text">или скачайте приложение</span>
        </li>
        <li>🍣 <span class="order-text">Выберите блюда и отправьте их в корзину</span></li>
        <li>💳 <span class="order-text">Оплатите удобным способом</span></li>
        <li>🚀 <span class="order-text">Получите заказ и наслаждайтесь вкусом!</span></li>
    </ul>
    <a href="https://premierpizza.ru/" target="_blank" class="order-button">Посмотреть цены в Премьер Пицца</a>
</div>
<!-- ======== Конец блока Как сделать заказ? ======== -->

<!-- ======== Разделитель ======== -->
<div class="section-divider"></div>

<!-- ======== Премьер Пицца КОНЕЦ ======== -->

<!-- ======== Yami Yami НАЧАЛО ======== -->	

<!-- ======== Основные данные начало ======== -->
<div class="sushi-ranking">
    <div class="rank-label"></div>
    <h2>Yami Yami</h2>
    <ul>
        <li class="rating-item">
            <strong>Рейтинг:</strong> ⭐ <span class="rating-score">4.85</span><br>
            <span class="rating-text">на основе</span> <span class="rating-count">275</span> отзывов.
        </li>
        <li><strong>География доставки:</strong> г. Самара, доставка по всему городу</li>
        <li><strong>Телефон:</strong> +7 (846) 214-57-89</li>
        <li><strong>Сайт:</strong> <a href="https://yamiyami.ru/" target="_blank">yamiyami.ru</a></li>
        <li><strong>Цены:</strong> от 500 рублей</li>
        <li><strong>График работы:</strong> 11:00 - 23:14</li>
    </ul>
</div>
<p>Yami Yami — доставка суши в Самаре, известная своим качеством и широким выбором роллов. Клиенты выбирают Yami Yami за удобный онлайн-заказ, оперативную доставку и свежие ингредиенты. Заказать любимые суши стало еще проще!</p>
<!-- ======== Основные данные конец ======== -->

<!-- ======== Блок Доставка и оплата ======== -->
<div class="sushi-section">
    <h3>📦 Доставка и оплата</h3>
    <ul class="delivery-list">
        <li><strong>Минимальная сумма заказа:</strong> <span class="price-highlight">500 рублей</span></li>
        <li>
            <ul class="delivery-cost">
                <li>✅ <span class="delivery-text"><strong>Доставка бесплатно</strong> при заказе от</span> <span class="price-highlight">1000 рублей</span></li>
                <li>💰 <span class="delivery-text"><strong>Стоимость доставки:</strong></span> <span class="price-highlight">150 рублей</span> <span class="delivery-text">при заказе на меньшую сумму</span></li>
            </ul>
        </li>
        <li><strong>Способы оплаты:</strong> <span class="payment-methods">Наличные, Банковские карты, Онлайн-оплата, Электронные кошельки, СБП</span></li>
    </ul>
</div>
<!-- ======== Конец блока Доставка и оплата ======== -->

<!-- ======== Меню начало ======== -->
<div class="sushi-section">
    <h3>🍽️ Выбор блюд</h3>
    <ul>
        <li>🍣 Разнообразные роллы: классические, запеченные, острые</li>
        <li>🍱 Сеты для вечеринок и семейных ужинов</li>
        <li>🥢 Суши с лососем, тунцом и угрем</li>
        <li>🥗 Свежие салаты</li>
        <li>🍰 Десерты для сладкоежек</li>
        <li>🥤 Напитки и соусы</li>
    </ul>
</div>
<!-- ======== Меню конец ======== -->

<!-- ======== Блок Акции и бонусы ======== -->
<div class="sushi-section">
    <h3>🎁 Акции и бонусы</h3>
    <ul>
        <li>🔥 Скидки на популярные блюда каждую неделю</li>
        <li>🎁 Подарочные роллы при заказе от 1500 рублей</li>
        <li>💳 Бонусная программа для постоянных клиентов</li>
    </ul>
</div>
<!-- ======== Конец блока Акции и бонусы ======== -->

<!-- ======== Преимущества и Недостатки ======== -->
<div class="sushi-section">
    <h3>✅ Преимущества</h3>
    <ul class="advantage-list">
        <li>Широкий ассортимент суши и роллов</li>
        <li>Только свежие и качественные ингредиенты</li>
        <li>Быстрая доставка в пределах города</li>
        <li>Регулярные акции и скидки</li>
    </ul>

    <h3>❌ Недостатки</h3>
    <ul class="disadvantage-list">
        <li>Не работает круглосуточно</li>
        <li>Возможны задержки в часы пик</li>
    </ul>
</div>
<!-- ======== Конец блока Преимущества и Недостатки ======== -->

<!-- ======== Блок Как сделать заказ? начало ======== -->
<div class="sushi-section">
    <h3>🛒 Как сделать заказ?</h3>
    <ul class="order-steps">
        <li class="rating-item">
            📱 <span class="order-text">Посетите сайт</span> 
            <a href="https://yamiyami.ru/" target="_blank">yamiyami.ru</a><br>
            <span class="order-text">или скачайте приложение</span>
        </li>
        <li>🍣 <span class="order-text">Выберите блюда и добавьте их в корзину</span></li>
        <li>💳 <span class="order-text">Оформите заказ и выберите удобный способ оплаты</span></li>
        <li>🚀 <span class="order-text">Ожидайте курьера и наслаждайтесь свежими суши!</span></li>
    </ul>
    <a href="https://yamiyami.ru/" target="_blank" class="order-button">Посмотреть цены в Yami Yami</a>
</div>
<!-- ======== Конец блока Как сделать заказ? ======== -->

<!-- ======== Разделитель ======== -->
<div class="section-divider"></div>

<!-- ======== Yami Yami КОНЕЦ ======== -->


<!-- ======== The Bon НАЧАЛО ======== -->

<!-- ======== Основные данные начало ======== -->
<div class="sushi-ranking">
    <div class="rank-label"></div>
    <h2>The Bon</h2>
    <ul>
        <li class="rating-item">
            <strong>Рейтинг:</strong> ⭐ <span class="rating-score">4.85</span><br>
            <span class="rating-text">на основе</span> <span class="rating-count">214</span> отзывов
        </li>
        <li><strong>География доставки:</strong> Доставка по городу</li>
        <li><strong>Телефон:</strong> +7 (495) 321-45-78</li>
        <li><strong>Сайт:</strong> <a href="https://thebon-sushi.ru" target="_blank">thebon-sushi.ru</a></li>
        <li><strong>Цены:</strong> от 300 рублей</li>
        <li><strong>График работы:</strong> 11:30 - 21:30</li>
    </ul>
</div>
<p>The Bon – это уютный сервис доставки, предлагающий японские, корейские и поке блюда. Клиенты ценят высокое качество продуктов, удобный онлайн-заказ и стабильную доставку по городу.</p>
<!-- ======== Основные данные конец ======== -->

<!-- ======== Блок Доставка и оплата ======== -->
<div class="sushi-section">
    <h3>📦 Доставка и оплата</h3>
    <ul class="delivery-list">
        <li><strong>Минимальная сумма заказа:</strong> <span class="price-highlight">0 рублей</span></li>
        <li>
            <ul class="delivery-cost">
                <li>✅ <span class="delivery-text"><strong>Доставка бесплатно</strong> при любой сумме заказа</span></li>
            </ul>
        </li>
        <li><strong>Способы оплаты:</strong> <span class="payment-methods">Наличные, Банковские карты, Онлайн-оплата</span></li>
    </ul>
</div>
<!-- ======== Конец блока Доставка и оплата ======== -->

<!-- ======== Меню начало ======== -->
<div class="sushi-section">
    <h3>🍽️ Выбор блюд</h3>
    <ul>
        <li>🍣 Роллы: классические, запеченные, темпура</li>
        <li>🍲 Поке с тунцом, лососем и овощами</li>
        <li>🍜 Корейские блюда: кимчи, бибимбап</li>
    </ul>
</div>
<!-- ======== Меню конец ======== -->

<!-- ======== Блок Акции и бонусы ======== -->
<div class="sushi-section">
    <h3>🎁 Акции и бонусы</h3>
    <ul>
        <li>🌟 Скидка 10% на первый заказ</li>
        <li>🎉 Бонусная система для постоянных клиентов</li>
    </ul>
</div>
<!-- ======== Конец блока Акции и бонусы ======== -->

<!-- ======== Преимущества и Недостатки ======== -->
<div class="sushi-section">
    <h3>✅ Преимущества</h3>
    <ul class="advantage-list">
        <li>Высокое качество ингредиентов</li>
        <li>Бесплатная доставка без минимального заказа</li>
        <li>Удобный онлайн-заказ</li>
    </ul>

    <h3>❌ Недостатки</h3>
    <ul class="disadvantage-list">
        <li>Не указано время доставки</li>
        <li>Ограниченный график работы</li>
    </ul>
</div>
<!-- ======== Конец блока Преимущества и Недостатки ======== -->

<!-- ======== Блок Как сделать заказ? начало ======== -->
<div class="sushi-section">
    <h3>🛒 Как сделать заказ?</h3>
    <ul class="order-steps">
        <li class="rating-item">
            📱 <span class="order-text">Посетите сайт</span> 
            <a href="https://thebon-sushi.ru" target="_blank">thebon-sushi.ru</a><br>
            <span class="order-text">или скачайте приложение</span>
        </li>
        <li>🍣 <span class="order-text">Выберите блюда и добавьте их в корзину</span></li>
        <li>💳 <span class="order-text">Оформите заказ и выберите удобный способ оплаты</span></li>
        <li>🚀 <span class="order-text">Дождитесь курьера и наслаждайтесь вкусной едой!</span></li>
    </ul>
    <a href="https://thebon-sushi.ru/" target="_blank" class="order-button">Посмотреть цены в The Bon</a>
</div>
<!-- ======== Конец блока Как сделать заказ? ======== -->

<!-- ======== Разделитель ======== -->
<div class="section-divider"></div>

<!-- ======== The Bon КОНЕЦ ======== -->

<!-- ======== Глобус НАЧАЛО ======== -->

<!-- ======== Основные данные начало ======== -->
<div class="sushi-ranking">
    <div class="rank-label"></div>
    <h2>Глобус</h2>
    <ul>
        <li class="rating-item"> 
            <strong>Рейтинг:</strong> ⭐ <span class="rating-score">4.69</span><br>
            <span class="rating-text">на основе</span> <span class="rating-count">275</span> отзывов
        </li>
        <li><strong>География доставки:</strong> г. Самара, доставка по всему городу</li>
        <li><strong>Телефон:</strong> +7 (846) 987-65-43</li>
        <li><strong>Сайт:</strong> <a href="https://online.globus.ru/" target="_blank">online.globus.ru</a></li>
        <li><strong>Цены:</strong> от 500 рублей</li>
        <li><strong>График работы:</strong> с 08:00 до 23:00</li>
    </ul>
</div>
<p>Глобус – гипермаркет, предлагающий свежие и вкусные суши собственного производства. Отличается высоким качеством, удобством заказа и широкой географией доставки в Самаре.</p>
<!-- ======== Основные данные конец ======== -->

<!-- ======== Блок Доставка и оплата ======== -->
<div class="sushi-section">
    <h3>📦 Доставка и оплата</h3>
    <ul class="delivery-list">
        <li><strong>Минимальная сумма заказа:</strong> <span class="price-highlight">500 рублей</span></li>
        <li>
            <ul class="delivery-cost">
                <li>✅ <span class="delivery-text"><strong>Доставка бесплатно</strong> при заказе от</span> <span class="price-highlight">1000 рублей</span></li>
                <li>💰 <span class="delivery-text"><strong>Стоимость доставки:</strong></span> <span class="price-highlight">150 рублей</span> <span class="delivery-text">при заказе на меньшую сумму</span></li>
            </ul>
        </li>
        <li><strong>Способы оплаты:</strong> <span class="payment-methods">Наличные, банковские карты, онлайн-оплата, электронные кошельки, СБП</span></li>
    </ul>
</div>
<!-- ======== Конец блока Доставка и оплата ======== -->

<!-- ======== Меню начало ======== -->
<div class="sushi-section">
    <h3>🍽️ Выбор блюд</h3>
    <ul>
        <li>🍣 Разнообразные роллы</li>
        <li>🍱 Суши с лососем, тунцом и угрем</li>
        <li>🍢 Сет-меню для компаний</li>
        <li>🔥 Горячие блюда</li>
        <li>🥗 Свежие салаты</li>
        <li>🍶 Напитки и соусы</li>
        <li>🍰 Десерты</li>
    </ul>
</div>
<!-- ======== Меню конец ======== -->

<!-- ======== Блок Акции и бонусы ======== -->
<div class="sushi-section">
    <h3>🎁 Акции и бонусы</h3>
    <ul>
        <li>🎁 Бесплатные соусы к каждому заказу</li>
        <li>💳 Накопительные бонусы для постоянных клиентов</li>
        <li>🔥 Регулярные скидки и акции</li>
    </ul>
</div>
<!-- ======== Конец блока Акции и бонусы ======== -->

<!-- ======== Преимущества и Недостатки ======== -->
<div class="sushi-section">
    <h3>✅ Преимущества</h3>
    <ul class="advantage-list">
        <li>Широкий ассортимент блюд</li>
        <li>Свежие ингредиенты</li>
        <li>Качественное обслуживание</li>
        <li>Экологичная упаковка</li>
        <li>Программа лояльности</li>
    </ul>
    
    <h3>❌ Недостатки</h3>
    <ul class="disadvantage-list">
        <li>Минимальная сумма заказа для бесплатной доставки</li>
        <li>Возможные задержки в часы пик</li>
    </ul>
</div>
<!-- ======== Конец блока Преимущества и Недостатки ======== -->

<!-- ======== Блок Как сделать заказ? ======== -->
<div class="sushi-section">
    <h3>🛒 Как сделать заказ?</h3>
    <ul class="order-steps">
        <li class="rating-item"> 📱 <span class="order-text">Посетите сайт</span> <a href="https://online.globus.ru/" target="_blank">online.globus.ru</a><br> <span class="order-text">или скачайте приложение</span> </li>
        <li>🍣 <span class="order-text">Выберите любимые блюда и добавьте их в корзину</span></li>
        <li>💳 <span class="order-text">Оформите заказ и выберите удобный способ оплаты</span></li>
        <li>🚀 <span class="order-text">Ожидайте курьера и наслаждайтесь вкусной едой!</span></li>
    </ul>
    <a href="https://online.globus.ru/" target="_blank" class="order-button">Посмотреть цены в Глобус</a>
</div>
<!-- ======== Конец блока Как сделать заказ? ======== -->

<!-- ======== Разделитель ======== -->
<div class="section-divider"></div>

<!-- ======== Глобус КОНЕЦ ======== -->

<!--startblok-->
<!-- ======== Суши Мастер НАЧАЛО ======== -->

<!-- ======== Основные данные начало ======== -->
<div class="sushi-ranking">
    <div class="rank-label"></div>
    <h2>Суши Мастер</h2>
    <ul>
        <li class="rating-item">
            <strong>Рейтинг:</strong> ⭐ <span class="rating-score">4.65</span><br>
            <span class="rating-text">на основе</span> <span class="rating-count">275</span> отзывов.
        </li>
        <li><strong>География доставки:</strong> г. Самара, доставка по всему городу</li>
        <li><strong>Телефон:</strong> +7 (846) 987-23-45</li>
        <li><strong>Сайт:</strong> <a href="https://sushi-master.ru/" target="_blank">sushi-master.ru</a></li>
        <li><strong>Цены:</strong> от 300 рублей</li>
        <li><strong>График работы:</strong> с 10:00 до 23:00</li>
    </ul>
</div>
<p>Суши Мастер – это популярная сеть японских ресторанов, предлагающая широкий ассортимент блюд. Быстрая доставка по Самаре, удобный заказ через сайт или приложение и доступные цены делают «Суши Мастер» выбором многих ценителей японской кухни.</p>
<!-- ======== Основные данные конец ======== -->

<!-- ======== Блок Доставка и оплата ======== -->
<div class="sushi-section">
    <h3>📦 Доставка и оплата</h3>
    <ul class="delivery-list">
        <li><strong>Минимальная сумма заказа:</strong> <span class="price-highlight">300 рублей</span></li>
        <li>
            <ul class="delivery-cost">
                <li>✅ <span class="delivery-text"><strong>Доставка бесплатно</strong> при заказе от</span> <span class="price-highlight">500 рублей</span></li>
                <li>💰 <span class="delivery-text"><strong>Стоимость доставки:</strong></span> <span class="price-highlight">100 рублей</span> <span class="delivery-text">при заказе на меньшую сумму</span></li>
            </ul>
        </li>
        <li><strong>Способы оплаты:</strong> <span class="payment-methods">Наличные, банковские карты, онлайн-оплата, электронные кошельки, СБП</span></li>
    </ul>
</div>
<!-- ======== Конец блока Доставка и оплата ======== -->

<!-- ======== Меню начало ======== -->
<div class="sushi-section">
    <h3>🍽️ Выбор блюд</h3>
    <ul>
        <li>🍣 Разнообразные роллы и суши</li>
        <li>🍱 Большие сеты на компанию</li>
        <li>🍜 WOK и горячие блюда</li>
        <li>🥗 Свежие салаты</li>
        <li>🍰 Десерты и напитки</li>
    </ul>
</div>
<!-- ======== Меню конец ======== -->

<!-- ======== Блок Акции и бонусы ======== -->
<div class="sushi-section">
    <h3>🎁 Акции и бонусы</h3>
    <ul>
        <li>🎁 Бесплатные соусы в подарок</li>
        <li>💳 Бонусная программа для постоянных клиентов</li>
        <li>🔥 Регулярные скидки и акции</li>
    </ul>
</div>
<!-- ======== Конец блока Акции и бонусы ======== -->

<!-- ======== Преимущества и Недостатки ======== -->
<div class="sushi-section">
    <h3>✅ Преимущества</h3>
    <ul class="advantage-list">
        <li>Широкий выбор блюд</li>
        <li>Свежие ингредиенты</li>
        <li>Быстрая доставка</li>
        <li>Регулярные акции</li>
        <li>Экологичная упаковка</li>
    </ul>
    <h3>❌ Недостатки</h3>
    <ul class="disadvantage-list">
        <li>Минимальная сумма заказа для бесплатной доставки</li>
        <li>Возможные задержки в пиковые часы</li>
    </ul>
</div>
<!-- ======== Конец блока Преимущества и Недостатки ======== -->

<!-- ======== Блок Как сделать заказ? ======== -->
<div class="sushi-section">
    <h3>🛒 Как сделать заказ?</h3>
    <ul class="order-steps">
        <li class="rating-item"> 📱 <span class="order-text">Посетите сайт</span> <a href="https://sushi-master.ru/" target="_blank">sushi-master.ru</a><br> <span class="order-text">или скачайте приложение</span> </li>
        <li>🍣 <span class="order-text">Выберите любимые блюда и добавьте их в корзину</span></li>
        <li>💳 <span class="order-text">Оформите заказ и выберите удобный способ оплаты</span></li>
        <li>🚀 <span class="order-text">Ожидайте курьера и наслаждайтесь вкусной едой!</span></li>
    </ul>
    <a href="https://sushi-master.ru/" target="_blank" class="order-button">Посмотреть цены в Суши Мастер</a>
</div>
<!-- ======== Конец блока Как сделать заказ? ======== -->

<!-- ======== Разделитель ======== -->
<div class="section-divider"></div>
<!-- ======== Суши Мастер КОНЕЦ ======== -->
<!--endblok-->




<!-- ======== МОЙ КОНТЕНТ КОНЕЦ ======== -->
<!-- Подключаем Популярные города -->
<?php include 'popular-cities.php'; ?>

</div>






    </div>

    <script>
        function toggleMenu() {
            document.getElementById("sidebar").classList.toggle("active");
        }
    </script>



<!-- Подключаем футер -->
<?php include 'footer.php'; ?>


<!-- Подключаем внешний JavaScript -->
<script src="scripts.js"></script>
</body>


</body>
</html>