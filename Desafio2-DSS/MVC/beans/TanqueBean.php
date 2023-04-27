<?php

    class TanqueBean{
        private $idTanque;
        private $cantRegular;
        private $cantEspecial;
        private $cantDiesel;
 
        function setIdTanque($idTanque)
        {
            $this->idTanque= $idTanque;
        }
        function getIdTanque()
        {
            return $this->idTanque;
        }
        function setCantRegu($cantRegular)
        {
            $this->cantRegular= $cantRegular;
        }
        function getCantRegu()
        {
            return $this->cantRegular;
        }

        function setCantEspecial($cantEspecial)
        {
            $this->cantEspecial= $cantEspecial;
        }
        function getCantEspecial()
        {
            return $this->cantEspecial;
        }
        function setCantDiesel($cantDiesel)
        {
            $this->cantDiesel= $cantDiesel;
        }
        function getCantDiesel()
        {
            return $this->cantDiesel;
        }
    }
?>