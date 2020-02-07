<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
	
*/


class user {

    private $nombre;
    private $apellido;
    private $dni;
    private $celular;
    private $email;
    
    private $foto_perfil;
    private $codigo;
    private $clave;
    
    private $rol_organizador;

    function __construct($nombre, $apellido, $dni, $celular, $email, $foto_perfil, $codigo, $clave, $rol_organizador) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->celular = $celular;
        $this->email = $email;
        $this->foto_perfil = $foto_perfil;
        $this->codigo = $codigo;
        $this->clave = $clave;
        $this->rol_organizador = $rol_organizador;
    }

    
    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getDni() {
        return $this->dni;
    }

    function getCelular() {
        return $this->celular;
    }

    function getEmail() {
        return $this->email;
    }

    function getFoto_perfil() {
        return $this->foto_perfil;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getClave() {
        return $this->clave;
    }

    function getRol_organizador() {
        return $this->rol_organizador;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setFoto_perfil($foto_perfil) {
        $this->foto_perfil = $foto_perfil;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setRol_organizador($rol_organizador) {
        $this->rol_organizador = $rol_organizador;
    }

}