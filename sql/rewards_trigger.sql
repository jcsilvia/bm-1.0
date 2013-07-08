DROP TRIGGER bullet_monkey.rewards_insert_trg;
DELIMITER //
CREATE TRIGGER bullet_monkey.rewards_insert_trg AFTER INSERT ON bullet_monkey.product_availability FOR EACH ROW
BEGIN



  SET @total_points = 0;

  SELECT SUM(reward_points) INTO @total_points
  FROM REWARDS 
  WHERE member_id = new.member_id AND created_date > DATE_SUB(CURRENT_TIMESTAMP(), INTERVAL 1 DAY) 
  GROUP BY member_id;
  
  IF @total_points <= 125 THEN #max 125 points accumulated per 24 hours
  
  
    INSERT INTO product_availability(member_id, action_id, reward_points)
        VALUES(new.member_id, 2, 25);
  
  
  END IF;
  

    
END;
//
DELIMITER ;