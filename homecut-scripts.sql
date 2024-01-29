Create table Countries
(
	Id int auto_increment,
	Name nvarchar(50),
	ArName nvarchar(50),
	`Code` nvarchar(5),
	CurrrencyCode nvarchar(5),
	ArCurrrencyCode nvarchar(25),
    CreatedBy nvarchar(50),
    CreatedTime timestamp default now(),
	LastModificationTime timestamp default now() on update now(),
    LastModifiedBy nvarchar(50),
	CONSTRAINT PK_Countries PRIMARY KEY (Id)
);

Create Table Services(
	Id int auto_increment,
	CountryId int,
	Name nvarchar(100),
	Description nvarchar(200),
	ArName nvarchar(100),
	ArDescription nvarchar(200),
	Price DECIMAL(18, 3) default 0,
	Duration int default 0,
	`Order` int default 0,
	IsChecked tinyint unsigned default 0,
	`Active` tinyint default 1,
    CreatedBy nvarchar(50),
    CreatedTime timestamp default now(),
	LastModificationTime timestamp default now() on update now(),
    LastModifiedBy nvarchar(50),
	CONSTRAINT PK_Services PRIMARY KEY (Id),
    CONSTRAINT FK_Service_Country_CountryId FOREIGN KEY (CountryId)
    REFERENCES Countries(Id)
);

Create table Users(
	Id int auto_increment,
    Username nvarchar(50),
    `Password` nvarchar(500),
    UserType nvarchar(20),
    Blocked tinyint default 0,
	CONSTRAINT PK_Users PRIMARY KEY (Id)
);

Create table ShopManagers(
	Id int auto_increment,
	Name nvarchar(100),
	Email nvarchar(100),
	PhoneNumber nvarchar(50),
    AppointmentSeparationMinutes int default 30, 
	CountryId int,
	UserId int,
    CreatedBy nvarchar(50),
    CreatedTime timestamp default now(),
	LastModificationTime timestamp default now() on update now(),
    LastModifiedBy nvarchar(50),
	CONSTRAINT PK_ShopManagers PRIMARY KEY (Id),
    CONSTRAINT FK_ShopManagers_Country_CountryId FOREIGN KEY (CountryId)
    REFERENCES Countries(Id),
    CONSTRAINT FK_ShopManagers_User_UserId FOREIGN KEY (UserId)
    REFERENCES Users(Id)
);


Create table Barbers(
	Id int auto_increment,
	Name nvarchar(100),
	ArName nvarchar(100),
	Description nvarchar(200),
	ArDescription nvarchar(200),
	Email nvarchar(100),
	PhoneNumber nvarchar(50),
	Photo nvarchar(1000), 
	ShopManagerId int,
	CountryId int,
	UserId int,
	`Order` int default 0,
	Location nvarchar(100),
    BufferTime int default 30,
	Blocked tinyint default 0,
	WorkFrom time,
	WorkTill time,
	ArLocation nvarchar(100),
	PhotoPreview longblob,
    CreatedBy nvarchar(50),
    CreatedTime timestamp default now(),
	LastModificationTime timestamp default now() on update now(),
    LastModifiedBy nvarchar(50),
	CONSTRAINT PK_Barbers PRIMARY KEY (Id),
    CONSTRAINT FK_Barbers_Country_CountryId FOREIGN KEY (CountryId)
    REFERENCES Countries(Id),
    CONSTRAINT FK_Barbers_User_UserId FOREIGN KEY (UserId)
    REFERENCES Users(Id),
    CONSTRAINT FK_Barbers_ShopManager_UserId FOREIGN KEY (ShopManagerId)
    REFERENCES ShopManagers(Id)
);

Create table BarberServices
(
	Id int auto_increment,
	BarberId int,
	ServiceId int,
    CreatedBy nvarchar(50),
    CreatedTime timestamp default now(),
	LastModificationTime timestamp default now() on update now(),
    LastModifiedBy nvarchar(50),
	CONSTRAINT PK_BarberServices PRIMARY KEY (Id),
    CONSTRAINT FK_BarberServices_Barber_BarberId FOREIGN KEY (BarberId)
    REFERENCES Barbers(Id),
    CONSTRAINT FK_Barbers_Service_UserId FOREIGN KEY (ServiceId)
    REFERENCES Services(Id)
);

Create table Clients(
	Id int auto_increment,
	Name nvarchar(200),
	ArName nvarchar(200),
	Email nvarchar(200),
	PhoneNumber nvarchar(50),
	Password nvarchar(200),
	CountryId int,
	PushId nvarchar(200),
    Blocked tinyint default 0,
	PhoneVerified tinyint unsigned default 0,
	CONSTRAINT PK_Clients PRIMARY KEY (Id),
    CONSTRAINT FK_Clients_Country_CountryId FOREIGN KEY (CountryId)
    REFERENCES Countries(Id)
);

Create table ClientAddresses(
	Id int auto_increment,
    ClientId int,
	CountryId int,
    `Name` nvarchar(20),
	City nvarchar(150),
    Appartment nvarchar(10),
	FullAddress nvarchar(150),
	Building nvarchar(100),
	FloorNb nvarchar(50),
    PhoneNumber nvarchar(50),
	Notes nvarchar(1000),
	CONSTRAINT PK_ClientAddresses PRIMARY KEY (Id),
    CONSTRAINT FK_ClientAddresses_Country_CountryId FOREIGN KEY (CountryId)
    REFERENCES Countries(Id),
    CONSTRAINT FK_ClientAddresses_Client_ClientId FOREIGN KEY (ClientId)
    REFERENCES Clients(Id)
);

Create Table ShopManagerTimeSets(
	ShopManagerId int,
	Monday tinyint unsigned default 1,
	Tuesday tinyint unsigned default 1,
	Wednesday tinyint unsigned default 1,
	Thursday tinyint unsigned default 1,
	Friday tinyint unsigned default 1,
	Saturday tinyint unsigned default 1,
	Sunday tinyint unsigned default 1,
    CreatedBy nvarchar(50),
    CreatedTime timestamp default now(),
	LastModificationTime timestamp default now() on update now(),
    LastModifiedBy nvarchar(50),
	CONSTRAINT PK_ShopManagerTimeSets PRIMARY KEY (ShopManagerId),
    CONSTRAINT FK_ShopManagerTimeSets_ShopManager_ShopManagerId FOREIGN KEY (ShopManagerId)
    REFERENCES ShopManagers(Id)
);

Create Table BarberDaysOff(
	Id int auto_increment,
	BarberId int,
    OffDate date,
    CreatedBy nvarchar(50),
    CreatedTime timestamp default now(),
	LastModificationTime timestamp default now() on update now(),
    LastModifiedBy nvarchar(50),
	CONSTRAINT PK_BarberDaysOff PRIMARY KEY (Id),
    CONSTRAINT FK_BarberDaysOff_Barber_BarberId FOREIGN KEY (BarberId)
    REFERENCES Barbers(Id)
);
 
Create TABLE RegistrationOTPs
(
	Id int auto_increment,
    ClientId int,
    OTP nvarchar(6),
    CreatedTime timestamp default now(),
	CONSTRAINT PK_RegitrationOTPs PRIMARY KEY (Id),
    CONSTRAINT FK_RegitrationOTPs_Client_ClientId FOREIGN KEY (ClientId)
    REFERENCES Clients(Id)
)

create TABLE Appointments
(
	Id int auto_increment,
    ClientId int,
	BarberId int,
    CountryId int,
    `AddressName` nvarchar(20),
	City nvarchar(150),
    Appartment nvarchar(10),
	FullAddress nvarchar(150),
	Building nvarchar(100),
	FloorNb nvarchar(50),
    PhoneNumber nvarchar(50),
	AddressNotes nvarchar(1000),
    AppointmentDate date,
    Timeslot Time,
    LocationCoordinates nvarchar(200),
    CurCode nvarchar(5),
    `Status` int default 0,
    PaymentMethod int default 0,
    CancelationReason nvarchar(500),
    Notes nvarchar(500),
    CreatedTime timestamp default now(),
	LastModificationTime timestamp default now() on update now(),
    LastModifiedBy nvarchar(50),
	CONSTRAINT PK_Appointments PRIMARY KEY (Id),
    CONSTRAINT FK_Appointments_Client_ClientId FOREIGN KEY (ClientId)
    REFERENCES Clients(Id),
    CONSTRAINT FK_Appointments_Barber_BarberId FOREIGN KEY (BarberId)
    REFERENCES Barbers(Id)
)

Create table AppointmentDetails
(
	Id int auto_increment,
	AppointmentId int,
	ServiceId int,
	Quantity int default 0,
	Price decimal(18, 3) default 0,
	Duration int default 0,
	CONSTRAINT PK_AppointmentDetails PRIMARY KEY (Id),
    CONSTRAINT FK_AppointmentDetails_Appointment_AppointmentId FOREIGN KEY (AppointmentId)
    REFERENCES Appointments(Id),
    CONSTRAINT FK_AppointmentDetails_Service_ServiceId FOREIGN KEY (ServiceId)
    REFERENCES Services(Id)
)

DELIMITER $$
CREATE PROCEDURE `GetAvailabilityByBarberAndDate`(BarberId int, BookingDate date, ServicesDuration int)
BEGIN
	DECLARE AppointmentSeparation int DEFAULT 30;
	DECLARE BufferTime int DEFAULT 15;
	DECLARE startTime time;
	DECLARE endTime time;
    
    select AppointmentSeparationMinutes
    Into AppointmentSeparation
    From Barbers b Join ShopManagers Sh on b.ShopManagerId = Sh.Id
    Where b.Id = BarberId;
    
    select WorkFrom
    Into startTime
    From Barbers b Where b.Id = BarberId;
    
    select b.BufferTime
    Into BufferTime
    From Barbers b Where b.Id = BarberId;
    
    select WorkTill
    Into endTime
    From Barbers b Where b.Id = BarberId;

	WITH RECURSIVE TimeSlotCTE as
	(
    select  startTime as `From`, timestampadd(minute, ServicesDuration, startTime) as `To`
    union all
    select
        timestampadd(minute, AppointmentSeparation, `From`),
        timestampadd(minute, AppointmentSeparation, `To`)
    from
        TimeSlotCTE
    where
        timestampadd(minute, AppointmentSeparation, `To`) <= endTime
	)
    
-- Finally, we simply select every time slot defined above for which there does not
-- yet exist an overlapping appointment on the requested date.
select
    T.From,
    T.To,
        case when exists 
        (
            select 1 from Appointments A
            where
                 A.AppointmentDate = BookingDate and
            	 A.Status = 1 and
            	 A.BarberId = BarberId and
                 timestampadd(minute, BufferTime * -1, A.Timeslot) <  T.To and
                timestampadd(minute, ((Select SUM(Duration) From AppointmentDetails Where AppointmentId = A.Id) + BufferTime), A.Timeslot) > T.From
        )
        then 0 else 1 end AS `Available`
from
    TimeSlotCTE T;
END$$
DELIMITER ;


Create Table CountryHolidays
(
	Id int auto_increment,
	CountryId int,
    HolidayDate date,
    CreatedBy nvarchar(50),
    CreatedTime timestamp default now(),
	LastModificationTime timestamp default now() on update now(),
    LastModifiedBy nvarchar(50),
	CONSTRAINT PK_CountryHolidays PRIMARY KEY (Id),
    CONSTRAINT FK_CountryHolidays_Country_CountryId FOREIGN KEY (CountryId)
    REFERENCES Countries(Id)
);

Create Table ClientPushIds
(
	Id int auto_increment,
    ClientId int,
    PushId nvarchar(200),
    Locale nvarchar(5),
	CONSTRAINT PK_ClientPushIds PRIMARY KEY (Id),
    CONSTRAINT FK_ClientPushIds_Client_ClientId FOREIGN KEY (ClientId)
    REFERENCES Clients(Id)
);

Create Table AppointmentsNotificationsSetup
(
	`Status` int,
    Title nvarchar(50),
    Message nvarchar(100),
    ArTitle nvarchar(50),
    ArMessage nvarchar(100),
	CONSTRAINT PK_AppointmentsNotificationsSetup PRIMARY KEY (`Status`)
)
