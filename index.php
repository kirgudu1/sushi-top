<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Рейтинг лучших доставок суши | Суши Рейтинг</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- Подключаем верхнее меню -->
<?php include 'header.php'; ?>

<!-- Основной контент -->
<div class="container">
    <!-- Заголовок и описание -->
    <section class="hero">
        <h1>📍 Лучшие доставки суши в России</h1>
        <p>Мы собрали для вас рейтинг лучших доставок суши по городам России. Выбирайте свой город и находите проверенные сервисы с реальными отзывами клиентов.</p>
    </section>

    <!-- Список городов -->
<section class="cities-list">
    <h2>🏙 Выберите ваш город</h2>
    <ul>
        <li><a href="/moskva.php">Москва</a></li>
        <li><a href="/spb.php">Санкт-Петербург</a></li>
        <li><a href="/balashikha.php">Балашиха</a></li>
        <li><a href="/chelyabinsk.php">Челябинск</a></li>
        <li><a href="/dolgoprudny.php">Долгопрудный</a></li>
        <li><a href="/domodedovo.php">Домодедово</a></li>
        <li><a href="/kaliningrad.php">Калининград</a></li>
        <li><a href="/kazan.php">Казань</a></li>
        <li><a href="/komsomolsk.php">Комсомольск-на-Амуре</a></li>
        <li><a href="/kotelniki.php">Котельники</a></li>
        <li><a href="/krasnogorsk.php">Красногорск</a></li>
        <li><a href="/krasnodar.php">Краснодар</a></li>
        <li><a href="/krasnoyarsk.php">Красноярск</a></li>
        <li><a href="/lubercy.php">Люберцы</a></li>
        <li><a href="/mytishchi.php">Мытищи</a></li>
        <li><a href="/veliky-novgorod.php">Великий Новгород</a></li>
        <li><a href="/odintsovo.php">Одинцово</a></li>
        <li><a href="/podolsk.php">Подольск</a></li>
        <li><a href="/pskov.php">Псков</a></li>
        <li><a href="/pushkino.php">Пушкино</a></li>
        <li><a href="/reutov.php">Реутов</a></li>
        <li><a href="/rostov.php">Ростов-на-Дону</a></li>
        <li><a href="/samara.php">Самара</a></li>
        <li><a href="/sochi.php">Сочи</a></li>
        <li><a href="/shelkovo.php">Щелково</a></li>
        <li><a href="/ufa.php">Уфа</a></li>
        <li><a href="/uhta.php">Ухта</a></li>
        <li><a href="/himki.php">Химки</a></li>
		<li><a href="/goroda.php">Другие города...</a></li>
    </ul>
</section>



    <!-- Как составляется рейтинг -->
<section class="rating-info">
    <h2>📊 Как мы составляем рейтинг?</h2>
    <p>Наш рейтинг формируется на основе реальных отзывов пользователей, качества продуктов, скорости доставки и уровня сервиса.  
    Мы тщательно анализируем данные, чтобы вы могли легко выбрать лучшую службу доставки суши в своём городе.</p>
    
    <a href="/about.php" class="btn">Подробнее</a>
</section>


<section class="video-reviews">
    <h2>🎥 Обзоры на доставку суши</h2>
    <p>Смотрите честные видеообзоры на службы доставки суши и выбирайте лучших!</p>
    
    <div class="video-container">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/-fFusk9wF4g" allowfullscreen></iframe>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/D-NgzEP_HP0" allowfullscreen></iframe>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/TcGaACkyKAE" allowfullscreen></iframe>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/pxkzupsjLzM" allowfullscreen></iframe>
    </div>
</section>



<section class="contact-block">
    <h2>📩 Свяжитесь с нами</h2>
    <p>Если у вас есть вопросы или предложения, напишите нам на e-mail.</p>
    <p><a href="mailto:info@example.com" class="contact-email">info@example.com</a></p>
</section>


<!-- скрываем форму
<section class="contact-form">
    <h2>📩 Свяжитесь с нами</h2>
    <p>Если у вас есть вопросы или предложения, напишите нам. Мы всегда рады вашим отзывам!</p>
    
    <form action="send_message.php" method="post">
        <div class="form-group">
            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="message">Сообщение:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn">Отправить</button>
    </form>
</section>
-->


</div>

<!-- Подключаем подвал -->
<?php include 'footer.php'; ?>

<!-- Подключаем JS -->
<script src="scripts.js"></script>

</body>
</html>
