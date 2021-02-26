CREATE TABLE `bd_fudebiol_digital`.`fudebiol_publicaciones_img` (
  `FPI_ID` INT NOT NULL AUTO_INCREMENT,
  `FPI_PUBLICACION_ID` INT NOT NULL,
  `FPI_IMAGEN_ID` INT NOT NULL,
  PRIMARY KEY (`FPI_ID`),
  INDEX `FK_PUBLICACIONES_IMG_PUBLICACION` (`FPI_PUBLICACION_ID` ASC) VISIBLE,
  INDEX `FK_PUBLICACIONES_IMG_IMAGEN` (`FPI_IMAGEN_ID` ASC) VISIBLE,
  CONSTRAINT `FK_PUBLICACION`
    FOREIGN KEY (`FPI_PUBLICACION_ID`)
    REFERENCES `bd_fudebiol_digital`.`fudebiol_publicaciones` (`FP_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_IMAGEN`
    FOREIGN KEY (`FPI_IMAGEN_ID`)
    REFERENCES `bd_fudebiol_digital`.`fudebiol_imagenes` (`FI_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;