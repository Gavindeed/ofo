/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2017/5/22 22:16:06                           */
/*==============================================================*/
use ofo;

drop table if exists Account;

drop table if exists Bike;

drop table if exists Location;

drop table if exists Recharge;

drop table if exists Repair;

drop table if exists User;

/*==============================================================*/
/* Table: Account                                               */
/*==============================================================*/
create table Account
(
   Account_ID           int not null,
   Location_ID          int,
   Bike_ID              int,
   User_ID              int,
   Loc_Location_ID      int,
   Use_date             date not null,
   Use_time             time not null,
   Charge               float not null,
   Left_balance         float not null,
   primary key (Account_ID)
);

/*==============================================================*/
/* Table: Bike                                                  */
/*==============================================================*/
create table Bike
(
   Bike_ID              int not null,
   Location_ID          int,
   User_ID              int,
   Password             varchar(32) not null,
   Age                  int not null,
   Is_broken            blob not null,
   In_use               blob not null,
   primary key (Bike_ID)
);

/*==============================================================*/
/* Table: Location                                              */
/*==============================================================*/
create table Location
(
   Location_ID          int not null,
   Location_name        varchar(64) not null,
   primary key (Location_ID)
);

/*==============================================================*/
/* Table: Recharge                                              */
/*==============================================================*/
create table Recharge
(
   Recharge_ID          int not null,
   User_ID              int,
   Recharge_date        date not null,
   Recharge_amount      float not null,
   Current_balance      float not null,
   Recharge_approach    varchar(32) not null,
   primary key (Recharge_ID)
);

/*==============================================================*/
/* Table: Repair                                                */
/*==============================================================*/
create table Repair
(
   Repair_ID            int not null,
   Bike_ID              int,
   Location_ID          int,
   Repair_date          date not null,
   Repair_time          time not null,
   primary key (Repair_ID)
);

/*==============================================================*/
/* Table: User                                                  */
/*==============================================================*/
create table User
(
   User_ID              int not null,
   Bike_ID              int,
   User_name            varchar(64) not null,
   Password             varchar(32) not null,
   Balance              float not null,
   primary key (User_ID)
);

alter table Account add constraint "FK_Bike-Account" foreign key (Bike_ID)
      references Bike (Bike_ID) on delete restrict on update restrict;

alter table Account add constraint FK_EndingLocation foreign key (Location_ID)
      references Location (Location_ID) on delete restrict on update restrict;

alter table Account add constraint FK_StartingLocation foreign key (Loc_Location_ID)
      references Location (Location_ID) on delete restrict on update restrict;

alter table Account add constraint "FK_User-Account" foreign key (User_ID)
      references User (User_ID) on delete restrict on update restrict;

alter table Bike add constraint FK_Locate foreign key (Location_ID)
      references Location (Location_ID) on delete restrict on update restrict;

alter table Bike add constraint FK_Own foreign key (User_ID)
      references User (User_ID) on delete restrict on update restrict;

alter table Recharge add constraint "FK_User-Recharge" foreign key (User_ID)
      references User (User_ID) on delete restrict on update restrict;

alter table Repair add constraint "FK_Bike-Repair" foreign key (Bike_ID)
      references Bike (Bike_ID) on delete restrict on update restrict;

alter table Repair add constraint "FK_Location-Repair" foreign key (Location_ID)
      references Location (Location_ID) on delete restrict on update restrict;

alter table User add constraint FK_Serve foreign key (Bike_ID)
      references Bike (Bike_ID) on delete restrict on update restrict;

