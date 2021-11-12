CREATE TABLE Users (
  id       INT           AUTO_INCREMENT
 ,user_id  VARCHAR(20)
 ,name     VARCHAR(20)
 ,age      INT
 ,email    VARCHAR(50)
 ,address  VARCHAR(30)
 ,pwd      VARCHAR(255)
 .admin_yn VARCHAR(10)
 ,CONSTRAINT Users_PK PRIMARY KEY(id)
 ,CONSTRAINT Users_UQ_1 UNIQUE(user_id)
);
