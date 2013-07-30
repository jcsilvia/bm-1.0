USE bullet_monkey;

insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (1,'Ammunition',null);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (2,'Reloading Supplies',null);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (3,'Magazines',null);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (4,'5.56x45',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (5,'7.62x39',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (6,'22 LR',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (7,'9mm Luger',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (8,'7.62x51',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (9,'.45 ACP',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (10,'.40 S&W',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (11,'5.45x39',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (12,'.380 Auto',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (13,'5.7x28',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (14,'10mm',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (15,'30-06',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (16,'6.8 SPC',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (17,'.357 Magnum',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (18,'.38 Special',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (19,'357 Sig',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (20,'.300 AAC',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (21,'.44 Magnum',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (22,'9x18 Makarov',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (23,'7.62x54R',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (24,'30-30',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (25,'6.5 Grendel',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (26,'.32 Auto',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (27,'.44 Special',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (28,'7.62x25 Tokarev',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (29,'45 LC',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (30,'25 Auto',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (31,'17 HMR',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (32,'22 WMR',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (33,'50 BMG',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (34,'Primers, Small Rifle',2);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (35,'Primers, Large Rifle',2);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (36,'Primers, Small Pistol',2);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (37,'Primers, Large Pistol',2);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (38,'Primers, Shotgun Shotshell',2);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (39,'Gun Powder, Pistol',2);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (40,'Gun Powder, Rifle',2);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (41,'Gun Powder, Shotgun',2);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (42,'12ga Buckshot',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (43,'12ga Slug',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (44,'20ga Buckshot',1);
insert into `product_categories`(`product_category_id`,`category_name`,`parent_category_id`) values (45,'20ga Slug',1);



insert into `products`(`product_id`,`product_category_id`,`product_subcategory_id`,`product_name`,`product_description`,`created_date`) values (1,1,4,'Federal XM193 5.56','Federal XM193 5.56mm 55gr FMJ','2013-05-28 17:07:33');
insert into `products`(`product_id`,`product_category_id`,`product_subcategory_id`,`product_name`,`product_description`,`created_date`) values (2,1,4,'Federal XM855 5.56','Federal XM855 5.56mm 62gr FMJ','2013-05-28 17:07:33');
insert into `products`(`product_id`,`product_category_id`,`product_subcategory_id`,`product_name`,`product_description`,`created_date`) values (3,1,4,'American Eagle .223','Federal American Eagle .223 Remington 55gr FMJ','2013-05-28 17:07:33');
insert into `products`(`product_id`,`product_category_id`,`product_subcategory_id`,`product_name`,`product_description`,`created_date`) values (4,1,5,'TulAmmo 7.62x39','TulAmmo 7.62x39 124gr FMJ Steel Case','2013-05-28 17:07:33');
insert into `products`(`product_id`,`product_category_id`,`product_subcategory_id`,`product_name`,`product_description`,`created_date`) values (5,1,5,'Wolf 7.62x39','Wolf 7.62x39 124gr FMJ Steel Case','2013-05-28 17:07:33');
insert into `products`(`product_id`,`product_category_id`,`product_subcategory_id`,`product_name`,`product_description`,`created_date`) values (6,1,5,'Brown Bear 7.62x39','Brown Bear 7.62x39 123gr Steel Case','2013-05-28 17:07:33');
insert into `products`(`product_id`,`product_category_id`,`product_subcategory_id`,`product_name`,`product_description`,`created_date`) values (7,1,7,'American Eagle 9mm','Federal American Eagle 9mm 115gr FMJ','2013-05-28 17:07:33');
insert into `products`(`product_id`,`product_category_id`,`product_subcategory_id`,`product_name`,`product_description`,`created_date`) values (8,1,7,'Federal 9mm JHP','Federal Premium Personal Defense 9mm Luger 124gr Hydra-Shok Jacketed Hollow Point','2013-05-28 17:07:33');



insert into `vendors`(`vendor_id`,`vendor_name`,`created_date`,`is_active`,`is_paid`) values (1,'Four Seasons','2013-06-04 00:00:00',1,0);
insert into `vendors`(`vendor_id`,`vendor_name`,`created_date`,`is_active`,`is_paid`) values (2,'Zero Hour Arms','2013-06-06 11:51:16',1,0);
insert into `vendors`(`vendor_id`,`vendor_name`,`created_date`,`is_active`,`is_paid`) values (3,'Mass Firearms School','2013-06-06 11:53:27',1,0);
insert into `vendors`(`vendor_id`,`vendor_name`,`created_date`,`is_active`,`is_paid`) values (4,'Rileys Sport Shop','2013-06-07 12:04:13',1,0);
insert into `vendors`(`vendor_id`,`vendor_name`,`created_date`,`is_active`,`is_paid`) values (5,'Flint Armament','2013-06-07 12:08:03',1,0);
insert into `vendors`(`vendor_id`,`vendor_name`,`created_date`,`is_active`,`is_paid`) values (6,'Ephesian Arms','2013-06-12 22:55:46',1,0);
insert into `vendors`(`vendor_id`,`vendor_name`,`created_date`,`is_active`,`is_paid`) values (7,'American Weapon Systems','2013-06-13 11:46:25',1,0);


insert into `addresses`(`address_id`,`vendor_id`,`address1`,`address2`,`city`,`state`,`zipcode`,`country`,`address_type`,`phone_number`,`created_date`,`geolat`,`geolng`,`geolatbox`,`geolngbox`) values (1,1,'76 Winn Street',null,'Woburn','MA','01801','US','primary','7819323133','2013-06-04 00:00:00',null,null,null,null);
insert into `addresses`(`address_id`,`vendor_id`,`address1`,`address2`,`city`,`state`,`zipcode`,`country`,`address_type`,`phone_number`,`created_date`,`geolat`,`geolng`,`geolatbox`,`geolngbox`) values (2,2,'7 Renker Drive',null,'Easton','MA','02375','US','primary','5085840291','2013-06-06 11:52:19',null,null,null,null);
insert into `addresses`(`address_id`,`vendor_id`,`address1`,`address2`,`city`,`state`,`zipcode`,`country`,`address_type`,`phone_number`,`created_date`,`geolat`,`geolng`,`geolatbox`,`geolngbox`) values (3,3,'100 Kuniholm Drive',null,'Holliston','MA','01746','US','primary','8003086212','2013-06-06 11:54:18',null,null,null,null);
insert into `addresses`(`address_id`,`vendor_id`,`address1`,`address2`,`city`,`state`,`zipcode`,`country`,`address_type`,`phone_number`,`created_date`,`geolat`,`geolng`,`geolatbox`,`geolngbox`) values (4,4,'1575 Hooksett Road',null,'Hooksett','NH','03106','US','primary','6034855000','2013-06-07 12:05:24',null,null,null,null);
insert into `addresses`(`address_id`,`vendor_id`,`address1`,`address2`,`city`,`state`,`zipcode`,`country`,`address_type`,`phone_number`,`created_date`,`geolat`,`geolng`,`geolatbox`,`geolngbox`) values (5,5,'360 Rhode Island Ave.',null,'Fall River','MA','02721','US','primary','5085671442','2013-06-07 12:09:09',null,null,null,null);
insert into `addresses`(`address_id`,`vendor_id`,`address1`,`address2`,`city`,`state`,`zipcode`,`country`,`address_type`,`phone_number`,`created_date`,`geolat`,`geolng`,`geolatbox`,`geolngbox`) values (6,6,'117 Tripp Street','','Fall River','MA','02724','US','primary','5086743636','2013-06-12 22:55:46',null,null,null,null);
insert into `addresses`(`address_id`,`vendor_id`,`address1`,`address2`,`city`,`state`,`zipcode`,`country`,`address_type`,`phone_number`,`created_date`,`geolat`,`geolng`,`geolatbox`,`geolngbox`) values (7,7,'16-2 S Woodbound Rd','','Rindge','NH','03461','US','primary','6038998400','2013-06-13 11:46:25',null,null,null,null);


update product_categories
 set url = '556' where product_category_id = 4;
update product_categories
 set url = '762x39' where product_category_id = 5;
update product_categories
 set url = '22lr' where product_category_id = 6;
update product_categories
 set url = '9mm' where product_category_id = 7;
update product_categories
 set url = '308win' where product_category_id = 8;
update product_categories
 set url = '45acp' where product_category_id = 9;
update product_categories
 set url = '40sw' where product_category_id = 10;
update product_categories
 set url = '545x39' where product_category_id = 11;
update product_categories
 set url = '380acp' where product_category_id = 12;
update product_categories
 set url = '357mag' where product_category_id = 17;
update product_categories
 set url = '38spec' where product_category_id = 18;
update product_categories
 set url = '357sig' where product_category_id = 19;
update product_categories
 set url = '9x18mak' where product_category_id = 22;

commit;