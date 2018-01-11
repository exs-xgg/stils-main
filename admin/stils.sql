
create table users(
id int primary key not null auto_increment,
lname varchar(50),
fname varchar(50),
email varchar(40),
sms1 varchar(11),
sms2 varchar(11),
tel varchar(10),
date_added timestamp default current_timestamp(),
store varchar(50),
login_token varchar(5),
pin varchar(6),
user_lock int default 0,
priv int default 0
);

create table item(
id int primary key not null auto_increment,
supplier int not null,
serial_no varchar(50),
category int,
item_name varchar(100),
unit_price decimal(19,4),
sell_price decimal(19,4),
qty int default 0,
date_added datetime default now(),
date_last_update timestamp default current_timestamp()
);


create table msg(
id int primary key not null auto_increment,
_from int,
_to int,
body varchar(255),
_time timestamp default now()
);

create table bulletin(
bul_id int primary key not null auto_increment,
 bul_title varchar(200),
  bul_body varchar(65536),
  bul_date timestamp default now()
);