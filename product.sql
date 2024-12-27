CREATE DATABASE test_db;
USE test_db;

CREATE TABLE PRODUCT(
product_id INT AUTO_INCREMENT,
product_name VARCHAR(20),
is_recyclable BOOLEAN,
is_low_fat BOOLEAN,
PRIMARY KEY(product_id)
);

INSERT INTO PRODUCT(product_name,is_recyclable,is_low_fat) VALUES('Product A',TRUE,TRUE),('Product B',TRUE,FALSE),
('Product C',FALSE,TRUE),('Product D',TRUE,TRUE);

SELECT product_id,product_name 
FROM PRODUCT
WHERE is_recyclable=TRUE AND is_low_fat=TRUE;
