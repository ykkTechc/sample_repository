SELECT
    celebrities.name,
    countries.name
FROM
    celebrities
    LEFT JOIN
        countries
    ON  celebrities.country_code = countries.code