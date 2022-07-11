select
  -- 年のみ切り抜き
  substring(birth, 1, 4) as '誕生年',
  count(*) as '人数'
from
  celebrities
where
  substring(birth, 1, 4) = '1981'
group by
  substring(birth, 1, 4)

UNION

select
  substring(birth, 1, 4) as '誕生年',
  count(*) as '人数'
from
  celebrities
where
  substring(birth, 1, 4) = '1991'
group by
  substring(birth, 1, 4)