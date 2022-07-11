SELECT
    `celebrities`.name,
    `countries`.name AS '国名'
FROM
    `celebrities`,
    `countries`
WHERE
    `celebrities`.country_code = `countries`.code