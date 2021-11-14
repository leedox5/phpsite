SELECT A.*
      ,B.user_id
  FROM Orders A
      LEFT OUTER JOIN
       Users B
      ON B.id = A.user_id  