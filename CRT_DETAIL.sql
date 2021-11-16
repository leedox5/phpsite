DROP PROCEDURE IF EXISTS CRT_DETAIL;
DELIMITER $$
CREATE PROCEDURE CRT_DETAIL ()
BEGIN
    DECLARE done    INT DEFAULT FALSE;
    DECLARE v_pa_id INT DEFAULT 0;
    DECLARE item    text;
    DECLARE s_pos   INT DEFAULT 0;
    DECLARE e_pos   INT DEFAULT 0;
    DECLARE cnt     INT DEFAULT 0;
    DECLARE pos     INT DEFAULT 0;
    DECLARE t_items TEXT;
    DECLARE cur CURSOR FOR
	  select id, 林巩前格
      from dh_atomy_rawdata_t1
	  where 老磊 = '2020-02-01' and '2020-02-05';
	
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
	OPEN cur;
    c_loop: LOOP
       FETCH cur INTO v_pa_id, t_items;
       IF done THEN
           leave c_loop;
	   END IF;
	   t_loop: LOOP
	       SET item = SUBSTRING_INDEX(t_items, ',', 1); --  1. 000003(1) 2. 000471(1)
	       SET s_pos = INSTR(item, '(');
	       SET e_pos = INSTR(item, ')');
           INSERT INTO dh_detail(
               ord_item
              ,pa_id
              ,pt_1
              ,pt_2
           ) VALUES (
               item
              ,v_pa_id
              ,SUBSTRING(item, 1, s_pos - 1)   -- 000003
              ,CAST(SUBSTRING(item, s_pos + 1, e_pos - s_pos - 1) AS UNSIGNED)  -- 1
           ); 
	       SET pos = INSTR(t_items, ',');
	       IF pos = 0  THEN
	           LEAVE t_loop;
	       END IF;
	       SET t_items = SUBSTRING(t_items, pos + 1);
	   end loop t_loop;
    end LOOP c_loop;
    close cur;
END$$
DELIMITER ;