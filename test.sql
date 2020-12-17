SELECT t.*,
  r.*,
  GROUP_CONCAT(nd.billcode ORDER BY nd.billcode) AS Bill_code_new
FROM tempreport t
  LEFT JOIN rcpt_print r ON r.finance_number = t.name9
  LEFT JOIN income i ON t.name = i.name
  LEFT JOIN opitemrece op ON op.income = i.income AND op.vn = t.name2
  LEFT JOIN nondrugitems nd ON op.icode = nd.icode
WHERE t.reportname = :reportname
GROUP BY i.name