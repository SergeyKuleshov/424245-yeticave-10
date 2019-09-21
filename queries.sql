/*Заполняю таблицу категорий*/
INSERT INTO categories
SET title = "Доски и лыжи",
    char_code = "boards";

INSERT INTO categories
SET title = "Крепления",
    char_code = "attachment";

INSERT INTO categories
SET title = "Ботинки",
    char_code = "boots";

INSERT INTO categories
SET title = "Одежда",
    char_code = "clothing";

INSERT INTO categories
SET title = "Инструменты",
    char_code = "tools";

INSERT INTO categories
SET title = "Разное",
    char_code = "other";



/*Пользователи*/
INSERT INTO users
SET dt_reg NOW(),
    email = "rudoi@mail.ru",
    name = "Антон Рудой",
    hashed_password = "a78dc786c5a7ab27",
    contacts_info = "89217779922";

INSERT INTO users
SET dt_reg NOW(),
    email = "smo@mail.ru",
    name = "Андрей Смородин",
    hashed_password = "a78ac234d5c2ab27",
    contacts_info = "89212343452";



/*Объявления*/
INSERT INTO lots
SET dt_add = NOW(),
    title = "2014 Rossignol District Snowboard",
    description = "Легендарный сноуборд Саломон",
    picture_path = "img/lot-1.jpg",
    start_price = "10999",
    dt_end = "2019-09-19 00:00:00",
    bid_step = "500",
    cat_id = 1,
    user_id = 1;

INSERT INTO lots
SET dt_add = NOW(),
    title = "DC Ply Mens 2016/2017 Snowboard",
    description = "Почти новый - катался пару раз. Для ценителей",
    picture_path = "img/lot-2.jpg",
    start_price = "159999",
    dt_end = "2019-09-21 00:00:00",
    bid_step = "2500",
    cat_id = 1,
    user_id = 2;

INSERT INTO lots
SET dt_add = NOW(),
    title = "Крепления Union Contact Pro 2015 года размер L/XL",
    description = "Топовые крепления!",
    picture_path = "img/lot-3.jpg",
    start_price = "8000",
    dt_end = "2019-09-20 00:00:00",
    bid_step = "500",
    cat_id = 2,
    user_id = 1;

INSERT INTO lots
SET dt_add = NOW(),
    title = "Ботинки для сноуборда DC Mutiny Charocal",
    description = "Очень удобные ботинки",
    picture_path = "img/lot-4.jpg",
    start_price = "10999",
    dt_end = "2019-09-19 00:00:00",
    bid_step = "500",
    cat_id = 3,
    user_id = 2;

INSERT INTO lots
SET dt_add = NOW(),
    title = "Куртка для сноуборда DC Mutiny Charocal",
    description = "Куртка с мембраной 10000/10000",
    picture_path = "img/lot-5.jpg",
    start_price = "7500",
    dt_end = "2019-09-20 00:00:00",
    bid_step = "500",
    cat_id = 4,
    user_id = 1;

INSERT INTO lots
SET dt_add = NOW(),
    title = "Маска Oakley Canopy",
    description = "С комплектом запасных линз",
    picture_path = "img/lot-6.jpg",
    start_price = "5400",
    dt_end = "2019-09-21 00:00:00",
    bid_step = "500",
    cat_id = 6,
    user_id = 2;



/*Ставки*/
INSERT INTO bids
SET dt_add = NOW(),
    offer_price = 10999,
    lot_id = 1,
    user_id = 2;

INSERT INTO bids
SET dt_add = NOW(),
    offer_price = 164999,
    lot_id = 2,
    user_id = 1;



/*Получить все категории*/
SELECT title FROM categories;


/*получить самые новые, открытые лоты.
Каждый лот должен включать название,
стартовую цену, ссылку на изображение,
цену, название категории*/
SELECT l.title, start_price, picture_path, offer_price, c.title
FROM lots
JOIN categories c ON l.cat_id = c.id
JOIN bids b ON l.id = b.lot_id
WHERE DATE(dt_end) <= CURRENT_TIME;


/*показать лот по его id.
Получите также название категории,
к которой принадлежит лот;*/
SELECT l.title, c.title
FROM lots l
JOIN categories c
ON l.cat_id = c.id
WHERE l.id = 3;


/*обновить название лота по его идентификатору;*/
UPDATE lots
SET title = "2015 Rossignol District Snowboard"
WHERE id = 1;


/*получить список ставок для лота по его идентификатору с сортировкой по дате*/
SELECT b.id, b.dt_add, offer_price
FROM bids b
JOIN lots l
ON l.id = b.lot_id
WHERE lot_id = 1
ORDER BY b.dt_add;
