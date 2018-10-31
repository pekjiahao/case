create schema javajam;
USE javajam;

create table drinks
(
  drinkid int unsigned not null auto_increment primary key,
  name    char(50)     not null,
  note    char(100)    not null,
  divtag  char (20)
);

create table drinksize
(
  drinksizeid int unsigned not null auto_increment primary key,
  name char(50) not null,
  price float(5,2) not null,
  drinkid int unsigned not null,
  FOREIGN KEY (drinkid) REFERENCES drinks(drinkid)
);

create table orders
(
	orderid int unsigned not null auto_increment primary key,
	drinksizeid int unsigned not null,
	quantity int unsigned not null,
	price float(5,2) not null,
	FOREIGN KEY (drinksizeid) REFERENCES drinksize(drinksizeid)
);




insert into drinks values
                          (1,"Just Java", "Regular house blend, decaffeinated coffee, or flavor of the day.", "justJavaDiv"),
                          (2,"Cafe au Lait", "House blended coffee infused into a smooth, steamed milk.", "cafeAuLaitDiv"),
                          (3,"Iced Cappuccino", "Sweetened espresso blended with icy-cold milk and served in a chilled glass.", "icedCappDiv");

insert into drinksize values
                               (1,"Endless Cup", 2, 1),
                               (2,"Single", 2, 2),
                               (3,"Double", 3, 2),
                               (4,"Single", 4.75, 3),
                               (5,"Double", 5.75, 3);

insert into orders values
													(1, 5, 5, 5.60),
													(2, 4, 45, 3.50),
													(3, 3, 9, 5.00),
													(4, 2, 2, 4.00),
													(5, 1, 10, 5.00);


SELECT orders.orderid,drinks.name, (select orders.quantity * orders.price where  ) /*match drinkid to price to quantity?????*/

FROM orders
			 INNER JOIN drinksize, drinks
				 ON orders.drinksizeid =drinksize.drinksizeid;

select orders.orderid, drinks.name, drinksize.name, orders.quantity

from orders
				inner join  drinksize, drinks
					on orders.drinksizeid = drinksize.drinksizeid;