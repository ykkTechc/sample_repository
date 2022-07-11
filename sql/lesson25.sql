SELECT countries.name,
       countrylanguages.language
FROM `countries`
INNER JOIN `countrylanguages`
WHERE countries.code = countrylanguages.country_code