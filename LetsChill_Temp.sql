Create database Letschill;
Use Letschill;

Create table users (
NID int not null, 
name varchar(100) not null,
username varchar(50) not null,
password varchar(50) not null,
email varchar(100) not null,
number int not null,
role_id int not null,
primary key (NID),
foreign key (role_id) references role_table(role_id));

Create table admin(
admin_nid int not null,
Primary key(admin_nid),
Foreign key (admin_nid) references users(NID));

Create table organizer(
organizer_nid int not null,
Primary key(organizer_nid),
Foreign key (organizer_nid) references users(NID));

Create table buyer(
buyer_nid int not null,
Primary key(buyer_nid),
Foreign key (buyer_nid) references users(NID));

Create table performer(
performer_nid int not null,
organizer_nid int not null,
Primary key(performer_nid),
Foreign key (performer_nid) references user(NID),
Foreign key (organizer_nid) references organizer(organizer_nid));


Create table performance_songs(
performer_nid int not null,
songs varchar(250) not null,
primary key (performer_nid, songs),
foreign key (performer_nid) references
performer(performer_nid));

Create table location (
    location_id int not null,
    location_address varchar(200) not null,
    primary key (location_id, location_address)
);


Create table concert (
Concert_id int not null, 
Name varchar(100) not null,
Date date not null,
type varchar(50) not null,
description varchar(250) not null,
organizer_nid int not null, 
location_id int not null, 
location_address varchar(200) not null,
primary key (Concert_id),
foreign key (location_id,location_address) references location(location_id,location_address));

Create table tickets (
ticket_ID int not null, 
Type  varchar(100) not null,
price int not null, 
total_tickets int not null, 
buyer_nid int not null, 
concert_id int not null, 
primary key (ticket_ID),
foreign key (buyer_nid) references buyer(buyer_nid),
foreign key (concert_id) references concert(concert_id));


Create table role_table(
Job varchar(50) not null,
role_id int not null,
primary key (role_id));

Create table performs_in(
Concert_id int not null,
performer_nid int not null,
primary key (Concert_id,performer_nid),
foreign key (Concert_id) references concert(Concert_id),
foreign key (performer_nid) references performer(performer_nid));

Create table purchasing_info(
ticket_ID int not null,
buyer_nid int not null,
primary key (ticket_ID,buyer_nid),
foreign key (ticket_ID) references tickets(ticket_ID),
foreign key (buyer_nid) references buyer(buyer_nid));


insert into role_table values
('admin',1),
('organizer',2),
('performer',3),
('buyer',4);


insert into users (NID, name, username, password, email, number, role_id)
values
(9876543210123456, 'Joy', 'joy_bangladesh', 'password123', 'joy@gmail.com', 1234567890, 1),
(8765432101234567, 'Adib', 'adib_bangladesh', 'adibpass', 'adib@yahoo.com', 9876543210, 2),
(7654321012345678, 'Rahim', 'rahim_bangladesh', 'rahimpass', 'rahim@gmail.com', 5555555555, 3);

insert into admin (admin_nid)
values
(9876543210123456);


insert into organizer (organizer_nid)
values
(8765432101234567);


insert into buyer (buyer_nid)
values
(7654321012345678);


insert into performer (performer_nid, organizer_nid)
values
(7654321012345678, 8765432101234567); 


insert into performance_songs (performer_nid, songs)
values
(7654321012345678, 'Bangla Song 1'),
(7654321012345678, 'Bangla Song 2'),
(7654321012345678, 'Bangla Song 3');


insert into concert (Concert_id, Name, Date, type, description, organizer_nid, location_id, location_address)
values
(1, 'Concert 1', '2024-05-10', 'Rock', 'Rock concert featuring Jon Kabir', 8765432101234567, 1, 'Bashundhara'),
(2, 'Concert 2', '2024-06-15', 'Pop', 'Pop concert featuring Tahsan', 8765432101234567, 2, 'Baridhara');


insert into tickets (ticket_ID, Type, price, total_tickets, buyer_nid, concert_id)
values
(9, 'VIP', 100, 100, 7654321012345678, 1),
(10, 'Regular', 50, 200, 7654321012345678, 1),
(11, 'Regular', 50, 200, 7654321012345678, 1),
(12, 'Regular', 50, 200, 7654321012345678, 1),
(13, 'Regular', 50, 200, 7654321012345678, 1),
(14, 'Regular', 50, 200, 7654321012345678, 1),
(15, 'Regular', 50, 200, 7654321012345678, 1),
(16, 'Regular', 50, 200, 7654321012345678, 1);


insert into performs_in (Concert_id, performer_nid)
values
(1, 7654321012345678);
