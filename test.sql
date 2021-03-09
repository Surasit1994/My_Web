select pt.nationality,pt.citizenship,vn_stat.hn,vn_stat.vn,vn_stat.income from vn_stat
    LEFT JOIN patient  pt ON pt.hn =  vn_stat.hn
where vstdate BETWEEN "2019-10-01" AND "2020-09-30"    and pt.citizenship="56"
group by vn_stat.hn

select sum(vn_stat.income) from vn_stat
    LEFT JOIN patient  pt ON pt.hn =  vn_stat.hn
where vstdate BETWEEN "2019-10-01" AND "2020-09-30"     and vn_stat.hn <> "999999999"  and vn_stat.hn <> "888888888"

select pt.citizenship ,ans.an,ans.hn,ans.regdate,ans.dchdate,ans.admdate,ans.income
from an_stat ans
 LEFT JOIN patient  pt ON pt.hn =  ans.hn
 where ans.regdate BETWEEN "2019-10-01" AND "2020-09-30" and pt.citizenship="99"    and ans.hn <> "999999999"  and ans.hn <> "888888888"
 group by ans.hn

