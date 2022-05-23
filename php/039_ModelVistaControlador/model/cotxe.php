<?php

class Cotxe{
/* A private variable that is used to store the id of the car. */
    private $id;
/* A private variable that is used to store the brand of the car. */
    private $marca;
/* A private variable that is used to store the model of the car. */
    private $model;
/* A private variable that is used to store the color of the car. */
    private $color;
/* A private variable that is used to store the owner of the car. */
    private $propietari;
/**
 * The function __construct() is a special function that is called when an object is created
 * 
 * @param id int
 * @param marca brand
 * @param model the name of the model of the car
 * @param color string
 * @param propietari is an object of the class Persona
 */
    function __construct($id, $marca, $model, $color, $propietari){
        $this->id = $id;
        $this->marca = $marca;
        $this->model = $model;
        $this->color = $color;
        $this->propietari = $propietari;
    }
/**
 * Setters and Getters
 */
    function setMarca($marca){
        $this->marca = $marca;
    }   
    function getMarca(){
        return $this->marca;
    }
    function setModel($model){
        $this->model = $model;
    }   
    function getModel(){
        return $this->model;
    }
    function setColor($color){
        $this->color = $color;
    }   
    function getColor(){
        return $this->color;
    }
    function setPropietari($propietari){
        $this->propietari = $propietari;
    }   
    function getPropietari(){
        return $this->propietari;
    }
    function getId(){
        return $this->id;
    }
}