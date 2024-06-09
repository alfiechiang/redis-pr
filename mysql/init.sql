ALTER USER 'giant'@'%' IDENTIFIED WITH mysql_native_password BY '123456';
ALTER USER 'root'@'%' IDENTIFIED WITH mysql_native_password BY '123456';
CREATE DATABASE coupon;
FLUSH PRIVILEGES;

