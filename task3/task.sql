--Написать запрос который выведет всех пользователей в возрасте от 20 лет с количеством книг более 5
SELECT u.*,
       COUNT(b.id) AS count_books
FROM books b
JOIN users_books ub ON ub.book_id = b.id
JOIN users u ON ub.user_id = u.id
WHERE u.age > 20
GROUP BY u.id
HAVING count_books > 5;

--Написать запрос который выведет пользователей в имени которых присутствует число 3
SELECT *
FROM users
WHERE users.first_name LIKE '%3%';

--Написать запрос который выведет список пользователей которые не брали книгу с именем "Book #21"
SELECT users.*
FROM
  (SELECT u.*
   FROM books b
   JOIN users_books ub ON ub.book_id = b.id
   JOIN users u ON ub.user_id = u.id
   AND b.title = 'Book #21') AS res
RIGHT JOIN users ON res.id = users.id
WHERE res.id IS NULL

--Написать запрос который добавит поле is_active в таблицу users;
ALTER TABLE users ADD COLUMN isactive BOOL NULL DEFAULT 0;

--Написать запрос, который проставит is_active = 1 для пользователей, которые взяли как минимум одну книгу
UPDATE users a INNER JOIN users_books b ON a.id=b.user_id SET a.isactive=1;

--Написать запрос который добавит поле best_seller (bool) в таблицу books
ALTER TABLE books ADD COLUMN best_seller BOOL NULL DEFAULT 0;

--Написать запрос который выставит best_seller = 1 для книг, которые были взяты пользователями более 10 раз
UPDATE books b
JOIN (
SELECT book_id, COUNT(user_id) AS count_book
FROM users_books GROUP BY book_id HAVING count_book > 10)
AS l ON b.id = l.book_id
SET best_seller = 1;