<?php

Class Slider
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo=$pdo;
    }

    public function getSlider(){
        $sql="SELECT * FROM image_slider";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}