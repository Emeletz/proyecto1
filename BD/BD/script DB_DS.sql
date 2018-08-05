-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema DB_DS
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `DB_DS` ;

-- -----------------------------------------------------
-- Schema DB_DS
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `DB_DS` DEFAULT CHARACTER SET utf8 ;
USE `DB_DS` ;

-- -----------------------------------------------------
-- Table `DB_DS`.`Ubicacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_DS`.`Ubicacion` (
  `h_id` INT NOT NULL AUTO_INCREMENT,
  `h_nombre` VARCHAR(100) NOT NULL,
  `h_descripcion` VARCHAR(200) NULL,
  PRIMARY KEY (`h_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_DS`.`Departamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_DS`.`Departamento` (
  `d_id` INT NOT NULL AUTO_INCREMENT,
  `d_nombre` VARCHAR(100) NOT NULL,
  `d_descripcion` VARCHAR(200) NULL,
  PRIMARY KEY (`d_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_DS`.`Municipio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_DS`.`Municipio` (
  `m_id` INT NOT NULL AUTO_INCREMENT,
  `m_departamento` INT NOT NULL,
  `m_nombre` VARCHAR(100) NOT NULL,
  `m_descripcion` VARCHAR(200) NULL,
  PRIMARY KEY (`m_id`),
  INDEX `fk_m_departamento_idx` (`m_departamento` ASC),
  CONSTRAINT `fk_m_departamento`
    FOREIGN KEY (`m_departamento`)
    REFERENCES `DB_DS`.`Departamento` (`d_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_DS`.`Proveedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_DS`.`Proveedor` (
  `pv_id` INT NOT NULL AUTO_INCREMENT,
  `pv_municipi` INT NOT NULL,
  `pv_nombre` VARCHAR(100) NOT NULL,
  `pv_encargado` VARCHAR(200) NULL,
  `pv_telefono` INT NULL,
  `pv_correo` VARCHAR(100) NULL,
  `pv_nit` VARCHAR(20) NULL,
  `pv_direccion` VARCHAR(100) NULL,
  PRIMARY KEY (`pv_id`),
  INDEX `fk_pv_municipio_idx` (`pv_municipi` ASC),
  CONSTRAINT `fk_pv_municipio`
    FOREIGN KEY (`pv_municipi`)
    REFERENCES `DB_DS`.`Municipio` (`m_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_DS`.`Categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_DS`.`Categoria` (
  `ct_id` INT NOT NULL AUTO_INCREMENT,
  `ct_nombre` VARCHAR(100) NOT NULL,
  `ct_descripcion` VARCHAR(200) NULL,
  PRIMARY KEY (`ct_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_DS`.`Producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_DS`.`Producto` (
  `p_id` INT NOT NULL AUTO_INCREMENT,
  `p_hubicacion` INT NOT NULL,
  `p_proveedor` INT NOT NULL,
  `p_categoria` INT NOT NULL,
  `p_cantidad` INT NOT NULL,
  `p_precio_costo` DOUBLE NOT NULL,
  `p_precio_base_venta` DOUBLE NOT NULL,
  `p_fecha_comra` DATE NOT NULL,
  `p_precio_venta` VARCHAR(45) NULL,
  `p_comprobante` VARCHAR(50) NOT NULL,
  `p_nombre` VARCHAR(100) NULL,
  `p_descripcion` VARCHAR(2000) NULL,
  `p_cantidad_minima` INT NULL,
  PRIMARY KEY (`p_id`),
  INDEX `fk_p_hubicacion_idx` (`p_hubicacion` ASC),
  INDEX `fk_p_proveedor_idx` (`p_proveedor` ASC),
  INDEX `fk_p_categoria_idx` (`p_categoria` ASC),
  CONSTRAINT `fk_p_hubicacion`
    FOREIGN KEY (`p_hubicacion`)
    REFERENCES `DB_DS`.`Ubicacion` (`h_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_p_proveedor`
    FOREIGN KEY (`p_proveedor`)
    REFERENCES `DB_DS`.`Proveedor` (`pv_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_p_categoria`
    FOREIGN KEY (`p_categoria`)
    REFERENCES `DB_DS`.`Categoria` (`ct_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_DS`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_DS`.`Cliente` (
  `c_id` INT NOT NULL AUTO_INCREMENT,
  `c_nombre` VARCHAR(100) NOT NULL,
  `c_apellido` VARCHAR(100) NOT NULL,
  `c_nit` VARCHAR(20) NOT NULL,
  `c_direccion` VARCHAR(100) NOT NULL,
  `c_municipio` INT NOT NULL,
  `c_correo` VARCHAR(100) NULL,
  `c_telefono` INT NULL,
  PRIMARY KEY (`c_id`),
  INDEX `fk_c_municipio_idx` (`c_municipio` ASC),
  CONSTRAINT `fk_c_municipio`
    FOREIGN KEY (`c_municipio`)
    REFERENCES `DB_DS`.`Municipio` (`m_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_DS`.`Factura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_DS`.`Factura` (
  `f_id` INT NOT NULL AUTO_INCREMENT,
  `f_cliente` INT NOT NULL,
  `f_fecha` DATE NOT NULL,
  `f_hora` TIME NOT NULL,
  PRIMARY KEY (`f_id`),
  INDEX `fk_f_cliente_idx` (`f_cliente` ASC),
  CONSTRAINT `fk_f_cliente`
    FOREIGN KEY (`f_cliente`)
    REFERENCES `DB_DS`.`Cliente` (`c_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_DS`.`Detalle_factura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_DS`.`Detalle_factura` (
  `df_id` INT NOT NULL AUTO_INCREMENT,
  `df_factura` INT NOT NULL,
  `df_producto` INT NOT NULL,
  `df_cantidad` INT NOT NULL,
  `df_monto` DOUBLE NOT NULL,
  PRIMARY KEY (`df_id`),
  INDEX `fk_df_factura_idx` (`df_factura` ASC),
  INDEX `fk_df_producto_idx` (`df_producto` ASC),
  CONSTRAINT `fk_df_factura`
    FOREIGN KEY (`df_factura`)
    REFERENCES `DB_DS`.`Factura` (`f_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_df_producto`
    FOREIGN KEY (`df_producto`)
    REFERENCES `DB_DS`.`Producto` (`p_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_DS`.`Bodega`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_DS`.`Bodega` (
  `b_id` INT NOT NULL AUTO_INCREMENT,
  `b_nombre` VARCHAR(100) NOT NULL,
  `b_descripcion` VARCHAR(200) NULL,
  `b_direccion` VARCHAR(200) NULL,
  `b_municipio` INT NOT NULL,
  PRIMARY KEY (`b_id`),
  INDEX `fk_b_municipio_idx` (`b_municipio` ASC),
  CONSTRAINT `fk_b_municipio`
    FOREIGN KEY (`b_municipio`)
    REFERENCES `DB_DS`.`Municipio` (`m_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_DS`.`Caja`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_DS`.`Caja` (
  `cj_id` INT NOT NULL AUTO_INCREMENT,
  `cj_fecha_apertura` DATE NULL,
  `cj_hora_apertura` TIME NULL,
  `cj_fecha_cierre` DATE NULL,
  `cj_hora_cierre` TIME NULL,
  PRIMARY KEY (`cj_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_DS`.`Detalle_caja`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_DS`.`Detalle_caja` (
  `dc_id` INT NOT NULL AUTO_INCREMENT,
  `dc_caja` INT NOT NULL,
  `dc_motivo` VARCHAR(200) NULL,
  `dc_descripcion` VARCHAR(200) NULL,
  `dc_ingreso` DOUBLE NULL,
  `dc_egreso` DOUBLE NULL,
  `dc_hora` TIME NULL,
  PRIMARY KEY (`dc_id`),
  INDEX `fk_dc_caja_idx` (`dc_caja` ASC),
  CONSTRAINT `fk_dc_caja`
    FOREIGN KEY (`dc_caja`)
    REFERENCES `DB_DS`.`Caja` (`cj_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_DS`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_DS`.`Usuario` (
  `u_id` INT NOT NULL AUTO_INCREMENT,
  `u_nombre` VARCHAR(200) NOT NULL,
  `u_apellido` VARCHAR(200) NOT NULL,
  `u_dpi` VARCHAR(20) NULL,
  `u_direccion` VARCHAR(100) NOT NULL,
  `u_municipio` INT NOT NULL,
  `u_usuario` VARCHAR(100) NOT NULL,
  `u_pass` VARCHAR(100) NOT NULL,
  `u_Tipo` VARCHAR(40) NOT NULL,
  PRIMARY KEY (`u_id`),
  INDEX `fk_u_municipio_idx` (`u_municipio` ASC),
  CONSTRAINT `fk_u_municipio`
    FOREIGN KEY (`u_municipio`)
    REFERENCES `DB_DS`.`Municipio` (`m_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_DS`.`Informacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_DS`.`Informacion` (
  `in_id` INT NOT NULL AUTO_INCREMENT,
  `in_nombre` VARCHAR(200) NOT NULL,
  `in_direccion` VARCHAR(200) NOT NULL,
  `in_municipio` INT NOT NULL,
  `in_nit` VARCHAR(20) NOT NULL,
  `in_correo` VARCHAR(200) NULL,
  `in_telefono1` INT NOT NULL,
  `in_telefono2` INT NULL,
  PRIMARY KEY (`in_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_DS`.`Tipo_gastos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_DS`.`Tipo_gastos` (
  `tpg_id` INT NOT NULL AUTO_INCREMENT,
  `tpg_nombre` VARCHAR(100) NOT NULL,
  `tpg_descripcion` VARCHAR(200) NULL,
  `tpg_monto` DOUBLE NOT NULL,
  PRIMARY KEY (`tpg_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_DS`.`Tipo_ingresos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_DS`.`Tipo_ingresos` (
  `tpg_id` INT NOT NULL AUTO_INCREMENT,
  `tpg_nombre` VARCHAR(100) NOT NULL,
  `tpg_descripcion` VARCHAR(200) NULL,
  `tpg_monto` DOUBLE NOT NULL,
  PRIMARY KEY (`tpg_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_DS`.`Detalle_cotizacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_DS`.`Detalle_cotizacion` (
  `df_id` INT NOT NULL AUTO_INCREMENT,
  `df_factura` INT NOT NULL,
  `df_producto` INT NOT NULL,
  `df_cantidad` INT NOT NULL,
  `df_monto` DOUBLE NOT NULL,
  PRIMARY KEY (`df_id`),
  INDEX `fk_df_producto_idx` (`df_producto` ASC),
  CONSTRAINT `fk_df_producto0`
    FOREIGN KEY (`df_producto`)
    REFERENCES `DB_DS`.`Producto` (`p_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_DS`.`Auditoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_DS`.`Auditoria` (
  `ad_id` INT NOT NULL AUTO_INCREMENT,
  `ad_usuario` INT NOT NULL,
  `ad_fecha` DATE NOT NULL,
  `ad_hora` TIME NOT NULL,
  `ad_motivo` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`ad_id`))
ENGINE = InnoDB;

USE `DB_DS`;

DELIMITER $$
USE `DB_DS`$$
CREATE DEFINER = CURRENT_USER TRIGGER `DB_DS`.`Producto_BEFORE_INSERT` BEFORE INSERT ON `Producto` FOR EACH ROW
BEGIN

END
$$


DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
