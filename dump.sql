CREATE TABLE teaTypes
(
id int,
typeTitle varchar(80)
);

CREATE TABLE teas
(
id int,
teaTitle varchar(255),
teaPrice int(16),
existingCount int(16),
teaTypes_id int(16)
);

INSERT INTO teaTypes (typeTitle)
VALUES ('Ooloung');
INSERT INTO teaTypes (typeTitle)
VALUES ('Puer');
INSERT INTO teaTypes (typeTitle)
VALUES ('White');
INSERT INTO teaTypes (typeTitle)
VALUES ('Red');
INSERT INTO teaTypes (typeTitle)
VALUES ('Green');

INSERT INTO teaTypes (teaTitle, teaPrice, existingCount, teaTypes_id)
VALUES ('Wisdom', '120', '60', '2');

INSERT INTO teaTypes (teaTitle, teaPrice, existingCount, teaTypes_id)
VALUES ('Best', '150', '20', '1');

INSERT INTO teaTypes (teaTitle, teaPrice, existingCount, teaTypes_id)
VALUES ('Kolia', '80', '90', '3');

INSERT INTO teaTypes (teaTitle, teaPrice, existingCount, teaTypes_id)
VALUES ('Rome', '220', '170', '2');

INSERT INTO teaTypes (teaTitle, teaPrice, existingCount, teaTypes_id)
VALUES ('Cesar', '90', '230', '4');
