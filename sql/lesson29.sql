select
    countries.name as '国名',
    avg(celebrities.age) as '平均年齢'
from
    countries inner join celebrities ON countries.code = celebrities.country_code
group by
    countries.name
order by
    avg(celebrities.age) DESC