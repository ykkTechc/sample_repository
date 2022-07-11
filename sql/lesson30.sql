SELECT
    country_code,
    max(ce.age),
    min(ce.age)
FROM
    celebrities ce
GROUP BY
    country_code
HAVING max(ce.age) >= 50
AND min(ce.age) <= 30