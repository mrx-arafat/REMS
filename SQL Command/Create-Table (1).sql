----------------------USER_TABLE-------------------------------------------------------------------------------------------------
CREATE TYPE ADDR AS OBJECT
(
    Country VARCHAR2(20), 
    State VARCHAR2(20), 
    District VARCHAR2(20), 
    City VARCHAR2(20), 
    Area VARCHAR2(20), 
    Postal_Code VARCHAR2(6)
);
CREATE TYPE CONT AS OBJECT
(
	Email VARCHAR2(30),
    Phone VARCHAR2(14)
);
INSERT INTO USER_TABLE (USER_ID, NAME, USERNAME) VALUES ('U_'||USER_ID_SEQ, )
CREATE TABLE User_Table 
(
    User_ID VARCHAR2(12) CONSTRAINT User_Table_USER_ID_PK PRIMARY KEY,
	Name VARCHAR2(50),
    Username VARCHAR2(30) NOT NULL UNIQUE,
    Password VARCHAR2(15) NOT NULL,
    Date_of_Birth DATE,
    Date_of_Registration DATE DEFAULT SYSDATE,
    Image VARCHAR2(200), 
    Role VARCHAR2(10),
    Contact CONT NOT NULL,
	Address ADDR 
);

CREATE SEQUENCE USER_ID_SEQ
INCREMENT BY 1
START WITH 1
CACHE 20
ORDER 
;


----------------------Social_Media------------------------------------------------------------------------------------------------
CREATE TABLE Social_Media 
(
	Profile_Link VARCHAR2(150) NOT NULL UNIQUE, 
	User_ID VARCHAR2(12) NOT NULL,
    CONSTRAINT SOCIAL_MEDIA_USER_ID_FK FOREIGN KEY(User_ID) REFERENCES User_Table(User_ID) ON DELETE CASCADE
);


----------------------Owner-------------------------------------------------------------------------------------------------------
 -- NOT NULL UNIQUE CONSTRAINT NOT MANDATORY TO DEFINE IN OWNER AND CUSTOMER TABLE
CREATE TABLE Owner 
(
    Owner_ID VARCHAR2(12) NOT NULL UNIQUE,
	User_ID VARCHAR2(12) NOT NULL UNIQUE, 
    CONSTRAINT OWNER_USER_ID_FK FOREIGN KEY(User_ID) REFERENCES User_Table(User_ID) ON DELETE CASCADE
);

CREATE SEQUENCE OWNER_ID_SEQ
INCREMENT BY 1
START WITH 0
CACHE 20
ORDER
;


----------------------Customer------------------------------------------------------------------------------------------------------
CREATE TABLE Customer 
( 
    Customer_ID VARCHAR2(12) NOT NULL UNIQUE, 
	User_ID VARCHAR2(12) NOT NULL UNIQUE,
    CONSTRAINT CUSTOMER_USER_ID_FK FOREIGN KEY(User_ID) REFERENCES User_Table(User_ID) ON DELETE CASCADE
);

CREATE SEQUENCE CUSTOMER_ID_SEQ
INCREMENT BY 1
START WITH 0
CACHE 20
ORDER
;


----------------------Property------------------------------------------------------------------------------------------------------

CREATE TABLE Property 
(
    Property_ID VARCHAR2(12) CONSTRAINT PROPERTY_PROPERTY_ID_PK PRIMARY KEY,
	Property_Name VARCHAR2(100),
    FloorNo NUMBER, 
	Bedrooms NUMBER NOT NULL, 
    Bathrooms NUMBER NOT NULL, 
    Balcony VARCHAR2(20) DEFAULT 'Balconies', 
    Kitchen VARCHAR2(20) DEFAULT 'Kitchen', 
    Dining VARCHAR2(20) DEFAULT 'Dining',
    Facilities VARCHAR2(150), 
    Property_Type VARCHAR2(20) NOT NULL, 
    Property_Area NUMBER NOT NULL,
    Occupancy NUMBER, 
    Floor_Plan VARCHAR2(200) NOT NULL, 
    Purpose VARCHAR2(10) NOT NULL, 
    Price NUMBER NOT NULL, 
    Area VARCHAR2(20), 
    City VARCHAR2(20), 
    District VARCHAR2(20), 
    State VARCHAR2(20),
    Status VARCHAR2(10) NOT NULL
);

CREATE SEQUENCE PROPERTY_ID_SEQ
INCREMENT BY 1
START WITH 1
CACHE 20
ORDER
;



----------------------Property_Image--------------------------------------------------------------------------------------------------
CREATE TABLE Property_Image 
(
    P_Image BLOB NOT NULL UNIQUE,
    Property_ID VARCHAR2(12) NOT NULL, 	
    CONSTRAINT PROPERTY_IMAGE_PROPERTY_ID_FK FOREIGN KEY(Property_ID) REFERENCES Property(Property_ID) ON DELETE CASCADE
);


----------------------Appointment-----------------------------------------------------------------------------------------------------
CREATE TABLE Appointment 
(
    Meeting_ID VARCHAR2(12) CONSTRAINT APPOINTMENT_MEETING_ID_PK PRIMARY KEY, 
    Meeting_Time DATE, 
    Meeting_Link VARCHAR2(150), 
    Meeting_Status VARCHAR2(10) DEFAULT 'Pending', 
    Customer_User_ID VARCHAR2(12) NOT NULL, 
    Owner_User_ID VARCHAR2(12) NOT NULL, 
    Property_ID VARCHAR2(12) NOT NULL,
    CONSTRAINT APPOINTMENT_CUSTOMER_USER_ID_FK FOREIGN KEY(Customer_User_ID) REFERENCES User_Table(User_ID) ON DELETE CASCADE, 
    CONSTRAINT APPOINTMENT_OWNER_USER_ID_FK FOREIGN KEY(Owner_User_ID) REFERENCES User_Table(User_ID) ON DELETE CASCADE,
    CONSTRAINT APPOINTMENT_Property_ID_FK FOREIGN KEY(Property_ID) REFERENCES PROPERTY(Property_ID) ON DELETE CASCADE
);

CREATE SEQUENCE MEETING_ID_SEQ
INCREMENT BY 1
START WITH 1
CACHE 20
ORDER
;


----------------------owns-------------------------------------------------------------------------------------------------------------
CREATE TABLE owns 
(
    Property_ID VARCHAR2(12),
    Owner_User_ID VARCHAR2(12), 	
    CONSTRAINT OWNS_PROPERTY_ID_FK FOREIGN KEY(Property_ID) REFERENCES Property(Property_ID) ON DELETE CASCADE,
	CONSTRAINT OWNS_OWNER_USER_ID_FK FOREIGN KEY(Owner_User_ID) REFERENCES User_Table(User_ID) ON DELETE CASCADE
);


----------------------looks_for-------------------------------------------------------------------------------------------------------
CREATE TABLE looks_for 
(
	Property_ID VARCHAR2(12),
    Customer_User_ID VARCHAR2(12), 
    Objective VARCHAR2(15), 	
    CONSTRAINT LOOKS_FOR_PROPERTY_ID_FK FOREIGN KEY(Property_ID) REFERENCES Property(Property_ID) ON DELETE CASCADE,
	CONSTRAINT LOOKS_FOR_CUSTOMER_USER_ID_FK FOREIGN KEY(Customer_User_ID) REFERENCES User_Table(User_ID) ON DELETE CASCADE
);


----------------------Review----------------------------------------------------------------------------------------------------------
CREATE TABLE Review
(
    Comment_ID VARCHAR2(12) CONSTRAINT REVIEW_COMMENT_ID_PK PRIMARY KEY, 
    Comment_Desc VARCHAR2(200) NOT NULL, 
    Rating_Option NUMBER NOT NULL, 
    User_ID VARCHAR2(12) NOT NULL, 
    Property_ID VARCHAR2(12) NOT NULL, 
    CONSTRAINT REVIEW_USER_ID_FK FOREIGN KEY(User_ID) REFERENCES User_Table(User_ID) ON DELETE CASCADE, 
    CONSTRAINT REVIEW_Property_ID_FK FOREIGN KEY(Property_ID) REFERENCES Property(Property_ID) ON DELETE CASCADE
);

CREATE SEQUENCE COMMENT_ID_SEQ
INCREMENT BY 1
START WITH 1
CACHE 20
ORDER
;


----------------------Subscriber-----------------------------------------------------------------------------------------------------
CREATE TABLE Subscriber 
(
    Subscriber_ID VARCHAR2(12) CONSTRAINT SUBSCRIBER_SUBSCRIBER_ID_PK PRIMARY KEY, 
    Name VARCHAR2(20) NOT NULL, 
    Email VARCHAR2(20) NOT NULL UNIQUE
);

CREATE SEQUENCE SUBSCRIBER_ID_SEQ
INCREMENT BY 1
START WITH 1
CACHE 20
ORDER
;


----------------------Forum--------------------------------------------------------------------------------------------------------
CREATE TABLE Forum 
(
    Forum_ID VARCHAR2(12) CONSTRAINT FORUM_FORUM_ID_PK PRIMARY KEY, 
    Name VARCHAR2(20) NOT NULL, 
    W_ID VARCHAR2(12) NOT NULL UNIQUE, 
    W_Email VARCHAR2(20)NOT NULL, 
    Question VARCHAR2(150) NOT NULL, 
    Answer VARCHAR2(150) NOT NULL, 
    Subscriber_ID VARCHAR2(12), 
    User_ID VARCHAR2(12), 
    CONSTRAINT FORUM_SUBSCRIBER_ID_FK FOREIGN KEY(Subscriber_ID) REFERENCES Subscriber(Subscriber_ID) ON DELETE CASCADE, 
    CONSTRAINT FORUM_USER_ID_FK FOREIGN KEY(User_ID) REFERENCES User_Table(User_ID) ON DELETE CASCADE
);

CREATE SEQUENCE FORUM_ID_SEQ
INCREMENT BY 1
START WITH 1
CACHE 20
ORDER
;

CREATE SEQUENCE WRITER_ID_SEQ
INCREMENT BY 1
START WITH 1
CACHE 20
ORDER
;


----------------------Contract-----------------------------------------------------------------------------------------------------
CREATE TABLE Contract 
(
    Contract_ID VARCHAR2(12) CONSTRAINT CONTRACT_CONTRACT_ID_PK PRIMARY KEY, 
    Price NUMBER NOT NULL, 
    Start_Of_Contract DATE NOT NULL, 
    End_Of_Contract DATE NOT NULL, 
    Duration AS (End_Of_Contract - Start_Of_Contract), 
    Commission_Fee AS 0.10*Price, 
    Commission_Status VARCHAR2(10) NOT NULL, --paid,pending 
    Date_Of_Signing DATE NOT NULL, 
    Contract_Status VARCHAR2(10) NOT NULL, --pending, approved
    Property_ID VARCHAR2(12) NOT NULL, 
    Meeting_ID VARCHAR2(12) NOT NULL, 
    CONSTRAINT CONTRACT_PROPERTY_ID_FK FOREIGN KEY(Property_ID) REFERENCES Property(Property_ID) ON DELETE CASCADE, 
    CONSTRAINT CONTRACT_MEETING_ID_FK FOREIGN KEY(Meeting_ID) REFERENCES Appointment(Meeting_ID) ON DELETE CASCADE
);


----------------------For_Sale--------------------------------------------------------------------------------------------------
CREATE TABLE For_Sale 
( 
    Advance_Payment NUMBER DEFAULT 0, 
    Payment_Frequency NUMBER NOT NULL, 
    Unit_Payment NUMBER NOT NULL,
	Contract_ID VARCHAR2(12) NOT NULL,
    CONSTRAINT FOR_SALE_CONTRACT_ID_FK FOREIGN KEY(Contract_ID) REFERENCES Contract(Contract_ID) ON DELETE CASCADE
);


----------------------For_Rent-------------------------------------------------------------------------------------------------
CREATE TABLE For_Rent 
(
    Duration_of_Lease NUMBER NOT NULL, 
    Rent_Per_Month NUMBER NOT NULL,
	Contract_ID VARCHAR2(12) NOT NULL,
    CONSTRAINT FOR_RENT_CONTRACT_ID_FK FOREIGN KEY(Contract_ID) REFERENCES Contract(Contract_ID) ON DELETE CASCADE
);


----------------------Transactions---------------------------------------------------------------------------------------------
CREATE TABLE Transactions 
(
    Transaction_ID VARCHAR2(12) CONSTRAINT TRANSACTIONS_TRANSACTION_ID_PK PRIMARY KEY, 
    Transaction_Date DATE, 
    Bill_Details BLOB, 
    Amount NUMBER, 
    Contract_ID VARCHAR2(12), 
    Customer_User_ID VARCHAR2(12), 
    Owner_User_ID VARCHAR2(12), 
    CONSTRAINT TRANSACTIONS_CONTRACT_ID_FK FOREIGN KEY(Contract_ID) REFERENCES Contract(Contract_ID) ON DELETE CASCADE, 
    CONSTRAINT TRANSACTIONS_CUSTOMER_ID_FK FOREIGN KEY(Customer_User_ID) REFERENCES User_Table(User_ID) ON DELETE CASCADE, 
    CONSTRAINT TRANSACTIONS_OWNER_ID_FK FOREIGN KEY(Owner_User_ID) REFERENCES User_Table(User_ID) ON DELETE CASCADE
);

