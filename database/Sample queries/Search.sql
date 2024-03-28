SELECT * FROM tms.property;

SELECT * FROM tms.property 
WHERE 1300 < rental_price and -- min price 
2000 > rental_price; -- max price 

SELECT * FROM tms.property 
WHERE 1 < num_bedrooms and -- min bedroom 
5 > num_bedrooms; -- max medroom 