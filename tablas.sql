-- -----------------------------------------------------
-- Table `mydb`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `contraseña` VARCHAR(45) NOT NULL,
  `esAdmin` TINYINT NOT NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`genero`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `genero` (
  `id_genero` INT NOT NULL AUTO_INCREMENT,
  `nombre_genero` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_genero`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`canciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `canciones` (
  `id_cancion` INT NOT NULL AUTO_INCREMENT,
  `fecha` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `album` VARCHAR(45) NOT NULL,
  `artista` VARCHAR(45) NOT NULL,
  `fk_genero` INT NOT NULL,
  PRIMARY KEY (`id_cancion`, `fk_genero`),
  INDEX `fk_canciones_genero` (`fk_genero` ASC) ,
  CONSTRAINT `fk_canciones_genero`
    FOREIGN KEY (`fk_genero`)
    REFERENCES `genero` (`id_genero`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


INSERT INTO genero
 VALUES
 (1,'Alternativa/independiente'),
 (2,'Rock alternativo'),
 (3,'R&B/Soul'),
 (4,'Reggae'),
 (5,'Rock');



INSERT INTO canciones
(nombre, artista, album, fecha, fk_genero)
 VALUES
('Feel Good Inc','Gorillaz','Demon Days','2005',5),
('Pick U Up','Foster the People','Pick U Up','2019',1),
('Breaking the habit','Linkin Park','Meteora','2003',2),
('Electric Love','BØRNS','Dopamine','2015',1),
('Veneno','La Renga','Despedazado por mil partes','1996',5),
('Hit the road Jack','Ray Charles', 'Ray Charles Greatest Hits','1962', 3),
('Desaparecido','Manu Chao','Clandestino','1998',4),
('Valerie','Amy Winehouse','Back to Black','2007',3),
('Eleanor Rigby','The Beatles','Revolver','1966',5);
