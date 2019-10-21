CREATE TABLE produit (
  id INTEGER NOT NULL AUTO_INCREMENT,
  nom STRING NOT NULL,
  info STRING,
  prix FLOAT,
  categorie STRING,
  image STRING,
  PRIMARY KEY(id)
);

CREATE TABLE client (
  id INTEGER NOT NULL AUTO_INCREMENT,
  nom STRING NOT NULL,
  prenom STRING,
  email STRING,
  adresse STRING,
  datecreation DATE,
  password STRING,
  admin BOOLEAN,
  PRIMARY KEY(id)
);
