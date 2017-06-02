/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2017/6/2 11:38:30                            */
/*==============================================================*/


drop table if exists movie;

drop table if exists schedule;

drop table if exists seat;

drop table if exists studio;

drop table if exists ticket;

drop table if exists user;

/*==============================================================*/
/* Table: movie                                                 */
/*==============================================================*/
create table movie
(
   Movie_Id          int(3)  NOT NULL AUTO_INCREMENT,
   Movie_Name           varchar(255),
   Movie_Time           varchar(255),
   Movie_Type           varchar(255),
   Movie_Price          float(4,2),
   Movie_Img            varchar(255),
   primary key (Movie_Id)
);

/*==============================================================*/
/* Table: schedule                                              */
/*==============================================================*/
create table schedule
(
   Schedule_ID          int(3)   NOT NULL AUTO_INCREMENT,
   Movie_Id             int(3),
   Studio_ID            int(3),
   Start_Time           varchar(100),
   End_Time             varchar(100),
   primary key (Schedule_ID)
);

/*==============================================================*/
/* Table: seat                                                  */
/*==============================================================*/
create table seat
(
   Seat_ID              int(11)  AUTO_INCREMENT,
   Studio_ID          int(3),
   Seat_Row             int,
   Seat_Col             int,
   Seat_Status          varchar(50),
   primary key (Seat_ID)
);

/*==============================================================*/
/* Table: studio                                                */
/*==============================================================*/
create table studio
(
   Studio_ID           int(3)   NOT NULL AUTO_INCREMENT,
   Studio_Name          varchar(255),
   Studio_Row           int,
   Studio_Col           int,
   primary key (Studio_ID)
);

/*==============================================================*/
/* Table: ticket                                                */
/*==============================================================*/
create table ticket
(
   Ticket_ID            int(6)  NOT NULL AUTO_INCREMENT,
   Schedule_ID          int(3),
   Seat_Col             int,
   Seat_Row             int,
   Ticket_Price         float(5,2),
   Ticket_Status        varchar(100),
   primary key (Ticket_ID)
);

/*==============================================================*/
/* Table: user                                                  */
/*==============================================================*/
create table user
(
   User_ID            int(3) NOT NULL AUTO_INCREMENT,
   User_Name            varchar(255),
   User_Pwd             varchar(255),
   User_Pwds            varchar(255),
   User_Type            varchar(255),
   primary key (User_ID)
);
alter table schedule add constraint FK_MOVIE_SCHE foreign key (Movie_Id)
      references movie (Movie_Id) on delete restrict on update restrict;

alter table schedule add constraint FK_SCHE_STUDIO foreign key (Studio_ID)
      references studio (Studio_ID) on delete restrict on update restrict;

alter table seat add constraint FK_STUDIO_SEAT foreign key (Studio_ID)
      references studio (Studio_ID) on delete restrict on update restrict;

alter table ticket add constraint FK_SCHE_TICKET foreign key (Schedule_ID)
      references schedule (Schedule_ID) on delete restrict on update restrict;
