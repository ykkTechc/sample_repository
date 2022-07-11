select   country_code, max(ce.age), min(ce.age)
from     celebrities ce
group by country_code
having   max(ce.age) >= 50
and      min(ce.age) <= 30