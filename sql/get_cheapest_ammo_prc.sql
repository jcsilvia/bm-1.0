DROP PROCEDURE IF EXISTS bullet_monkey.get_cheapest_ammo;
DELIMITER //
CREATE PROCEDURE bullet_monkey.`get_cheapest_ammo`(IN pState VARCHAR(2))
BEGIN
	
  
  DECLARE var_product_id INT;
  DECLARE no_more_records INT;
  
  DECLARE cur1 CURSOR FOR 
      SELECT DISTINCT pa.product_id
        FROM product_availability pa, addresses ad 
        WHERE pa.address_id = ad.address_id
          AND pa.in_stock = 'Yes'
          AND ad.state = pState
          AND pa.created_date > (date_sub(current_timestamp, INTERVAL 3 DAY));
  
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET no_more_records=1;
  
  
  CREATE TEMPORARY TABLE tmp_cheap_ammo 
    (
      product_id INT,
      product_name VARCHAR(255),
      vendor_id INT,
      vendor_name VARCHAR(255),
      address_id INT,
      price_per_round DECIMAL(10,2),
      last_updated INT,
      product_availability_id INT,
      user_name VARCHAR(255)
    );
    
    DELETE FROM tmp_cheap_ammo;

    SET no_more_records=0;
    OPEN cur1;

  REPEAT
        FETCH cur1 INTO var_product_id;
          
        IF NOT no_more_records THEN
        
          INSERT INTO tmp_cheap_ammo(product_id, product_name, vendor_id, vendor_name, address_id, price_per_round, last_updated, product_availability_id, user_name)
          SELECT pa.product_id, po.product_name, ad.vendor_id, ve.vendor_name, pa.address_id, ROUND(MIN(price/quantity), 2) as price_per_round, MAX(ROUND(time_to_sec(timediff(current_timestamp(), pa.created_date)) / 3600)) as last_updated, pa.product_availability_id, m.user_name
            FROM product_availability pa, products po, addresses ad, vendors ve, members m
            WHERE pa.product_id = var_product_id
              AND po.product_id = pa.product_id
              AND ad.vendor_id = ve.vendor_id
              AND ad.address_id = pa.address_id
              AND pa.member_id = m.member_id
              AND pa.address_id IN (SELECT DISTINCT ad.address_id FROM vendors ve, addresses ad WHERE ve.vendor_id = ad.vendor_id AND ad.state = pState AND ve.is_active = 1)
              AND pa.created_date > (date_sub(current_timestamp, INTERVAL 3 DAY))
              AND product_availability_id NOT IN (select product_availability_id FROM product_availability_flag)
              AND NOT EXISTS 
                (
                  SELECT pa2.product_id, ad2.vendor_id 
                  FROM product_availability pa2, addresses ad2 
                  WHERE pa2.address_id = ad2.address_id
                  AND pa2.address_id = pa.address_id
                  AND pa2.product_id = pa.product_id
                  AND pa2.in_stock = 'No' 
                  AND pa2.created_date > (date_sub(current_timestamp, INTERVAL 3 DAY))
                  AND ad2.state = pState
                )
            GROUP BY pa.product_id, ad.vendor_id , po.product_name, ve.vendor_name, pa.address_id
            ORDER BY last_updated ASC,price_per_round
            LIMIT 1;
          
          
        
        END IF;

    UNTIL no_more_records 
    END REPEAT;
    CLOSE cur1;
    
    SELECT * FROM tmp_cheap_ammo;

    DROP TABLE tmp_cheap_ammo;

  END;
//
DELIMITER ;