SELECT
    substring(birth, 1, 4) AS '誕生年',
    count(*) AS '人数'
FROM
    celebrities
WHERE
    substring(birth, 1, 4) = '1981'
GROUP BY
    substring(birth, 1, 4)
UNION
SELECT
    substring(birth, 1, 4) AS '誕生年',
    count(*) AS '人数'
FROM
    celebrities
WHERE
    substring(birth, 1, 4) = '1991'
GROUP BY
    substring(birth, 1, 4)