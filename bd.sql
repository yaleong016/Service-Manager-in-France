/*
** Jeu de données Series
** UCB Lyon 1 - BDW - Fabien Duchateau - 2023
*/


/* Inserting instances */ 
INSERT INTO citoyen VALUES ('cookies123@gmail.com', 'Greg', 'trestrew', '20-11-1990', '32 avenue', '11-23-32-12-32-32');
INSERT INTO citoyen VALUES ('tzcredks@hotmail.com', 'Sam', 'Smith', '01-04-1987', '11 rue vert', '34-23-23-12-54');
INSERT INTO citoyen VALUES ('adsjfhalskdj@gmail.com', 'Sarah', 'Behaldif', '01-04-2007', '11 rue vert', '34-23-23-12-54');

INSERT INTO lieu VALUES(1, 'ecole simple', 'ecole_', ST_GeomFromText('POINT(40.71727401 -74.00898606)'));
INSERT INTO lieu VALUES(2, 'ecole rouge', 'ecole_', ST_GeomFromText('POINT(41.71727401 -54.00898606)'));
INSERT INTO lieu VALUES(3, 'ecole en ciel', 'ecole_', ST_GeomFromText('POINT(31.71727401 -54.00898606)'));
INSERT INTO lieu VALUES(4, 'Michellin etoilles', 'cantine_', ST_GeomFromText('POINT(11.71727401 -54.00898606)'));
INSERT INTO lieu VALUES(5, 'yum yum pizzas', 'cantine_', ST_GeomFromText('POINT(31.71727401 -74.00898606)'));

INSERT INTO ecole_ VALUES(1, '1 rue killerBear', 10);
INSERT INTO ecole_ VALUES(2, '23 rue requinCharmant', 8);
INSERT INTO ecole_ VALUES(3, '1 grand binoclard', 6);

INSERT INTO cantine_ VALUES(4, 'Michellin etoilles', '23 riveiereBleu', 50, 4);
INSERT INTO cantine_ VALUES(5, 'yum yum pizzas', '19 heureuxCochons', 100, 15);

INSERT INTO enfant VALUES ('Clair', 'Desdf');
INSERT INTO enfant VALUES ('Clair', 'Desdf');
INSERT INTO enfant VALUES ('Clementi', 'Reqiire');
INSERT INTO enfant VALUES ('Clementi', 'Reqiire');
INSERT INTO enfant VALUES ('Fantome', 'Treq');
INSERT INTO enfant VALUES ('Jason', 'Creul');
INSERT INTO enfant VALUES ('Sarah', 'Beourl');
INSERT INTO enfant VALUES ('Ureqach', 'Drsdfwer');

INSERT INTO region VALUES (1321, 'Ontario');
INSERT INTO region VALUES (23427, 'Ile de France');
INSERT INTO department_ VALUES('Toronto', 1321, 1321, 'Ontario');
INSERT INTO department_ VALUES('Paris', 23427, 23427, 'Ile de France');

INSERT INTO commune VALUES(1, 23427, 341234, '2nd arrondissement', ST_GeomFromText('POINT(31.71727401 -74.00898606)'), '2nd arrondissement', 'Paris', 23427);
INSERT INTO service_ VALUES(0,'manger dans un cantine enfant', 'sep-mai', 'gratuit', 1, 23427);
INSERT INTO service_ VALUES(1, 'etudier pour les enfants', 'sep-mai', 'gratuit', 1, 23427);
]
INSERT INTO demande VALUES(1, '10/10/2020', 'manger pour mes enfants', 'rien', 0, 'cookies123@gmail.com');
INSERT INTO demande VALUES(2, '10/10/2020', 'manger pour mes enfants', 'rien', 0, 'cookies123@gmail.com');
INSERT INTO demande VALUES(3, '10/10/2020', 'manger pour mes enfants', 'rien', 0, 'tzcredks@hotmail.com');
INSERT INTO demande VALUES(4, '10/10/2020', 'manger pour mes enfants', 'rien', 0, 'tzcredks@hotmail.com');

INSERT INTO inscription VALUES('Clair', 'Desdf', 1, 4, 0);
INSERT INTO inscription VALUES('Clair', 'Desdf', 2, 5, 1);
INSERT INTO inscription VALUES('Ureqach', 'Drsdfwer', 3, 5, 2);
INSERT INTO inscription VALUES('Jason', 'Creul', 4, 4, 1);

INSERT INTO demande VALUES(5, '10/10/2020', 'etudier', 'rien', 1, 'adsjfhalskdj@gmail.com');
INSERT INTO demande VALUES(6, '10/10/2020', 'etudier', 'rien', 1, 'cookies123@gmail.com');
INSERT INTO demande VALUES(7, '10/10/2020', 'etudier', 'rien', 1, 'tzcredks@hotmail.com');
INSERT INTO demande VALUES(8, '10/10/2020', 'etudier', 'rien', 1, 'adsjfhalskdj@gmail.com');

INSERT INTO inscrit_ VALUES('Clair', 'Desdf', 2, 5, 1, 4);
INSERT INTO inscrit_ VALUES('Clementi', 'Reqiire', 1, 6, 1, 1);
INSERT INTO inscrit_ VALUES('Clementi', 'Reqiire', 2, 7, 1, 0);
INSERT INTO inscrit_ VALUES('Fantome', 'Treq', 2, 8, 1, 0);