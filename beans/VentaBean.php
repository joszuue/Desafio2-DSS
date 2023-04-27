<?php
    class VentaBean{
        private $idVenta;
        private $tanqueGas;
        private $tipoCombustible;
        private $cantGalones;
        private $totalPago;
        private $fechaHora;

        function setIdVenta($idVenta)
        {
            $this->idVenta= $idVenta;
        }
        function getIdVenta()
        {
            return $this->idVenta;
        }
        function setTanqueGas($tanqueGas)
        {
            $this->tipoCombustible= $tipoCombustible;
        }
        function getTanqueGas()
        {
            return $this->tanqueGas;
        }
        function setTipoCombustible($tipoCombustible)
        {
            $this->tipoCombustible= $tipoCombustible;
        }
        function getTipoCombustible()
        {
            return $this->tipoCombustible;
        }
        function setCantGalones($cantGalones)
        {
            $this->cantGalones= $cantGalones;
        }
        function getCantGalones()
        {
            return $this->cantGalones;
        }
        function setTotalPago($totalPago)
        {
            $this->totalPago= $totalPago;
        }
        function getTotalPago()
        {
            return $this->totalPago;
        }

        function setFechaHora($fechaHora)
        {
            $this->fechaHora= $fechaHora;
        }
        function getFechaHora()
        {
            return $this->fechaHora;
        }
    }
?>