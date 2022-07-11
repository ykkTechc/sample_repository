SELECT `celebrities`.`name`,
       `countries`.`name`,
       `countrylanguages`.`language`
FROM celebrities
INNER JOIN countries ON celebrities.country_code = countries.code
INNER JOIN countrylanguages ON celebrities.country_code = countrylanguages.country_code
AND countrylanguages.is_official = TRUE