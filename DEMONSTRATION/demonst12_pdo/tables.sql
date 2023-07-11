CREATE TABLE employees(
    userid INT(5) PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(35) NOT NULL,
    lastname VARCHAR(35) NOT NULL,
    email VARCHAR(35) NOT NULL
);

INSERT INTO employees (firstname, lastname, email)
VALUES ("fname1","lname1","fl1@fl1.fl1");

INSERT INTO employees (firstname, lastname, email)
VALUES ("fname2","lname2","fl2@fl2.fl2");

INSERT INTO employees (firstname, lastname, email)
VALUES ("fname3","lname3","fl3@fl3.fl3");

INSERT INTO employees (firstname, lastname, email)
VALUES ("fname4","lname4","fl4@fl4.fl4");