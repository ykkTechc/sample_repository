SELECT countries.name AS '国名',
       avg(celebrities.age) AS '平均年齢'
FROM countries
INNER JOIN celebrities ON countries.code = celebrities.country_code
GROUP BY countries.name
ORDER BY avg(celebrities.age) DESC