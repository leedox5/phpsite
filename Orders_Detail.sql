CREATE TABLE Orders_Detail (
  id             INT    AUTO_INCREMENT
 ,order_id       INT
 ,product_id     INT
 ,order_quantity INT
 ,CONSTRAINT Orders_Detail_PK PRIMARY KEY(id)
);

ALTER TABLE Orders_Detail ADD FOREIGN KEY(order_id)   REFERENCES Orders(id);
ALTER TABLE Orders_Detail ADD FOREIGN KEY(product_id) REFERENCES Products(id);