/*Заполняю таблицу категорий*/
INSERT INTO categories
(title, char_code)
VALUES
("Доски и лыжи", "boards"),
("Крепления", "attachment"),
("Ботинки", "boots"),
("Одежда", "clothing"),
("Инструменты", "tools"),
("Разное", "other");



/*Пользователи*/
INSERT INTO users
(email, name, hashed_password, contacts_info)
VALUES
("rudoi@mail.ru", "Антон Рудой", "a78dc786c5a7ab27", "89217779922"),
("smo@mail.ru", "Андрей Смородин", "a78ac234d5c2ab27", "89212343452");



/*Объявления*/
INSERT INTO lots
(title, description, picture_path, start_price, dt_end, bid_step, cat_id, user_id)
VALUES
("2014 Rossignol District Snowboard", "Легендарный сноуборд Саломон", "img/lot-1.jpg", 10999, "2019-09-19 00:00:00", 500, 1, 1),
("DC Ply Mens 2016/2017 Snowboard", "Почти новый - катался пару раз", "img/lot-2.jpg", 159999, "2019-09-21 00:00:00", 2500, 1, 2),
("Крепления Union Contact Pro 2015 года размер L/XL", "Топовые крепления!", "img/lot-3.jpg", 8000, "2019-09-20 00:00:00", 500, 2, 1),
("Ботинки для сноуборда DC Mutiny Charocal", "Очень удобные ботинки", "img/lot-4.jpg", 10999, "2019-09-19 00:00:00", 500, 3, 2),
("Куртка для сноуборда DC Mutiny Charocal", "Куртка с мембраной 10000/10000", "img/lot-5.jpg", 7500, "2019-09-20 00:00:00", 500, 4, 1),
("Маска Oakley Canopy", "С комплектом запасных линз", "img/lot-6.jpg", 5400, "2019-09-21 00:00:00",500, 6, 2);



/*Ставки*/
INSERT INTO bids
(offer_price, lot_id, user_id)
VALUES
(10999, 1, 2),
(164999, 2, 1);



/*Получить все категории*/
SELECT title FROM categories;


/*получить самые новые, открытые лоты.
Каждый лот должен включать название,
стартовую цену, ссылку на изображение,
цену, название категории*/
SELECT l.title, start_price, picture_path, offer_price, c.title
FROM lots l
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
SELECT id, dt_add, offer_price
FROM bids
WHERE lot_id = 1
ORDER BY dt_add;
