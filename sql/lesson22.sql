SELECT region,
       MAX(life_expectancy) AS '最大寿命',
       MAX(population) AS '最大人口'
FROM `countries`
GROUP BY region