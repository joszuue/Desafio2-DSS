<?php
    require "beans/VentaBean.php";
    require "beans/TanqueBean.php";

    class MainModel extends Model{
        function __construct(){
            parent::__construct();
        }
        function listarVentas(){
            $query="SELECT * FROM ventas";
            $this->conexion =$this->con->conectar();
            $resultado = $this->conexion->prepare($query);
            $resultado->execute();
            $array =array();

            while ($row = $resultado->fetch()) {
                $ventas = new VentaBean();
                $ventas->setIdVenta($row['idVenta']);
                $ventas->setTanqueGas($row['tanqueGas']);
                $ventas->setTipoCombustible($row['tipoCombustible']);
                $ventas->setCantGalones($row['cantGalones']);
                $ventas->setTotalPago($row['totalPago']);
                $ventas->setFechaHora($row['fechaHora']);
                $array[]= $ventas;
            }
            $this->con->desconectar($this->conexion);//cerramos la conexion
            return $array;//retornamos el arreglo

        } 

        function crearTanque($regular, $especial, $diesel){
            $query = "INSERT INTO tanques (cantRegular,cantEspecial,cantDiesel	) VALUES (:regular, :especial, :diesel)";
            $this->conexion = $this->con->conectar();
            $row = $this->conexion->prepare($query);
            $row->bindParam(':regular', $regular);//enviamos parametros a la consulta, esto evita inyecciones SQL
            $row->bindParam(':especial', $especial);
            $row->bindParam(':diesel', $diesel);
            return $row->execute();//devolvera un booleano dependiendo si la consulta y conexion fue exitosa
        }

        function listaTanques(){
            $query="SELECT * FROM tanques";
            $this->conexion =$this->con->conectar();
            $resultado = $this->conexion->prepare($query);
            $resultado->execute();
            $array =array();

            while ($row = $resultado->fetch()) {
                $tanques = new TanqueBean();
                $tanques->setIdTanque($row['idTanque']);
                $tanques->setCantRegu($row['cantRegular']);
                $tanques->setCantEspecial($row['cantEspecial']);
                $tanques->setCantDiesel($row['cantDiesel']);
                $array[]= $tanques;
            }
            $this->con->desconectar($this->conexion);//cerramos la conexion
            return $array;//retornamos el arreglo
        }

        function llenarRegular($id, $cant){
            $query = "UPDATE tanques SET cantRegular=:cant  WHERE idTanque = :id";
            $this->conexion = $this->con->conectar();
            $row = $this->conexion->prepare($query);
            $row->bindParam(':cant', $cant);
            $row->bindParam(':id', $id);
            return $row->execute();
        }

        function llenarEspecial($id, $cant){
            $query = "UPDATE tanques SET cantEspecial=:cant  WHERE idTanque = :id";
            $this->conexion = $this->con->conectar();
            $row = $this->conexion->prepare($query);
            $row->bindParam(':cant', $cant);
            $row->bindParam(':id', $id);
            return $row->execute();
        }

        function llenarDiesel($id, $cant){
            $query = "UPDATE tanques SET cantDiesel=:cant  WHERE idTanque = :id";
            $this->conexion = $this->con->conectar();
            $row = $this->conexion->prepare($query);
            $row->bindParam(':cant', $cant);
            $row->bindParam(':id', $id);
            return $row->execute();
        }

        function eliminarTanque($id){
            $query = "DELETE FROM tanques WHERE idTanque = :id";
            $this->conexion = $this->con->conectar();
            $row = $this->conexion->prepare($query);
            $row->bindParam(':id', $id);
            return $row->execute();
        }
    }
?>
