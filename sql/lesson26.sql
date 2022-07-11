SELECT countries.name AS '国名',
       cities.name AS '市区町村名',
       countrylanguages.language
FROM countries
INNER JOIN countrylanguages ON countries.code = countrylanguages.country_code
INNER JOIN cities ON countries.code = cities.country_code