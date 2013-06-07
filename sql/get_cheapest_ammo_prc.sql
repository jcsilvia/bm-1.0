#DROP PROCEDURE IF EXISTS get_cheapest_ammmo;
#DELIMITER //
CREATE PROCEDURE get_cheapest_ammo(IN pState VARCHAR(2))
BEGIN
	
  
  DECLARE var_product_id INT;
  DECLARE no_more_records INT;
  
  DECLARE cur1 CURSOR FOR 
      SELECT DISTINCT pa.product_id
        FROM product_availability pa, addresses ad 
        WHERE pa.vendor_id = ad.vendor_id
          AND pa.in_stock = 'Yes'
          AND ad.state = pState
          AND pa.created_date > CURRENT_DATE - 2;
  
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET no_more_records=1;
  
  
  CREATE TEMPORARY TABLE tmp_cheap_ammo 
    (
      product_id INT,
      product_name VARCHAR(255),
      vendor_id INT,
      vendor_name VARCHAR(255),
      price_per_round DECIMAL(2,2)
    );
    

    SET no_more_records=0;
    OPEN cur1;

  REPEAT
        FETCH cur1 INTO var_product_id;
          
        IF NOT no_more_records THEN
        
          INSERT INTO tmp_cheap_ammo(product_id, product_name, vendor_id, vendor_name, price_per_round)
          SELECT pa.product_id, po.product_name, pa.vendor_id, ve.vendor_name, ROUND(MIN(price/quantity), 2) as price_per_round 
            FROM product_availability pa, products po, vendors ve
            WHERE pa.product_id = var_product_id
              AND po.product_id = pa.product_id
              AND ve.vendor_id = pa.vendor_id
              AND pa.vendor_id IN (SELECT DISTINCT ve.vendor_id FROM vendors ve, addresses ad WHERE ve.vendor_id = ad.vendor_id AND ad.state = pState AND ve.is_active = 1)
              AND pa.created_date > CURRENT_DATE - 2
              AND NOT EXISTS 
                (
                  SELECT pa2.product_id, pa2.vendor_id 
                  FROM product_availability pa2, addresses ad2 
                  WHERE pa2.vendor_id = ad2.vendor_id 
                  AND pa2.vendor_id = pa.vendor_id
                  AND pa2.product_id = pa.product_id
                  AND pa2.in_stock = 'No' 
                  AND pa2.created_date > CURRENT_DATE - 8/24
                  AND ad2.state = pState
                )
            GROUP BY pa.product_id, pa.vendor_id , po.product_name, ve.vendor_name
            ORDER BY price_per_round
            LIMIT 1;
          
          
        
        END IF;

    UNTIL no_more_records 
    END REPEAT;
    CLOSE cur1;
    
    SELECT * FROM tmp_cheap_ammo;

    DROP TABLE tmp_cheap_ammo;

  END;
#END //
#DELIMITER ;