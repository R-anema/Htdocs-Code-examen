USE netland;
SELECT * FROM series WHERE has_won_awards>=1;

USE netland;
SELECT * FROM series WHERE rating >= 2.5;

USE netland;
SELECT * FROM series WHERE country = 'NL' AND language = 'NL';

USE netland;
SELECT * FROM series WHERE seasons <= 5;

USE netland;
SELECT MAX(rating) FROM series;

SELECT * FROM series WHERE seasons < 3 OR seasons > 20;

SELECT * FROM series WHERE title LIKE '%Th%';

USE netland;
SELECT * FROM series WHERE seasons < 3;

USE netland;
SELECT * FROM series WHERE rating >= 2.5 ORDER BY rating DESC;

USE netland;
SELECT * FROM series WHERE seasons <= 5 ORDER BY seasons ASC;

USE netland;
SELECT * FROM series WHERE seasons < 3 OR seasons > 20 ORDER BY seasons, country;

USE netland;

SELECT filmtitel, filmduur FROM films;
