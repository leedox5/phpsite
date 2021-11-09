CREATE TABLE Products (
  products_num INT AUTO_INCREMENT
 ,name         VARCHAR(20)
 ,price        INT
 ,type         VARCHAR(20)
 ,count        INT
 ,CONSTRAINT Products_PK PRIMARY KEY(products_num)
);
