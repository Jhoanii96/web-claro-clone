<?php

class Cliente
{

    private $codcliente;
    private $dni;
    private $celular;
    private $firstName;
    private $lastName;
    private $direccion;
    private $region;
    private $provincia;
    private $distrito;

    function __construct($codcliente, $dni, $celular, $firstName, $lastName, $direccion, $region, $provincia, $distrito)
    {
        $this->codcliente = $codcliente;
        $this->dni = $dni;
        $this->celular = $celular;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->direccion = $direccion;
        $this->region = $region;
        $this->provincia = $provincia;
        $this->distrito = $distrito;
    }

    function getCodcliente()
    {
        return $this->codcliente;
    }

    function getDni()
    {
        return $this->dni;
    }

    function getCelular()
    {
        return $this->celular;
    }

    function getFirstName()
    {
        return $this->firstName;
    }

    function getLastName()
    {
        return $this->lastName;
    }

    function getDireccion()
    {
        return $this->direccion;
    }

    function getRegion()
    {
        return $this->region;
    }

    function getProvincia()
    {
        return $this->provincia;
    }

    function getDistrito()
    {
        return $this->distrito;
    }

    function setCodcliente($codcliente)
    {
        $this->codcliente = $codcliente;
    }

    function setDni($dni)
    {
        $this->dni = $dni;
    }

    function setCelular($celular)
    {
        $this->celular = $celular;
    }

    function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    function setRegion($region)
    {
        $this->region = $region;
    }

    function setProvincia($provincia)
    {
        $this->provincia = $provincia;
    }

    function setDistrito($distrito)
    {
        $this->distrito = $distrito;
    }






}



