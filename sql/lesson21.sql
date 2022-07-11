SELECT region,
       AVG(life_expectancy) AS '平均寿命',
       AVG(population) AS '平均人口'
FROM `countries`
GROUP BY region