-- 주문 정보
CREATE TABLE Orders (
  id          INT           AUTO_INCREMENT
 ,user_id     INT
 ,total_price INT
 ,stat        VARCHAR(10)
 ,order_date  TIMESTAMP
 ,CONSTRAINT Orders_PK PRIMARY KEY(id)
);

ALTER TABLE Orders ADD FOREIGN KEY(user_id) REFERENCES Users(id);