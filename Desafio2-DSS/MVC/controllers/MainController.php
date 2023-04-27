<?php
 class MainController extends Controller{//extenderemos de controller para poder acceder a sus funciones
    function __construct(){
        /*parent::__construct();//llamamos el constructor de Controller, para poder acceder a la instancia de view
        $this->view->listaVentas= $this->model->listaVentas();//enviamos arreglos de objetos a las vistas
        $this->view->renderView('main/main.php');//llamando al metodo renderView para pintar la vista*/

    }

    function realizarVenta(){
        parent::__construct();
    }

    function principal(){
        parent::__construct();//llamamos el constructor de Controller, para poder acceder a la instancia de view
        $this->view->listaVentas= $this->model->listarVentas();//enviamos arreglos de objetos a las vistas
        $this->view->listaTanques= $this->model->listaTanques();
        $this->view->mensaje = "";
        $this->view->renderView('main/main.php');//llamando al metodo renderView para pintar la vista
    }

    function crearTanque(){
        parent::__construct();
        $regular = 0;
        $especial = 0;
        $diesel = 0;
        $this->model->crearTanque($regular, $especial, $diesel);//invocamos al model y a la funcion del modelo
        $mensaje = "
        <div class='alert alert-success' role='alert'>
        Se ha creado correctamente un nuevo tanque!!! </div>";
        $this->enviarMensaje($mensaje);
    }

    function llenarTanque(){
        parent::__construct();
        $id = isset($_POST['id'])?$_POST['id']:"";
        $cant = 100;
        $tipo = isset($_POST['tipo'])?$_POST['tipo']:"";

        if($tipo == "regular"){
            $this->model->llenarRegular($id, $cant);
            $mensaje = "
            <div class='alert alert-success' role='alert'>
            Se ha llenado correctamente el tanque: " . $id . " de la gasolina REGULAR!!! </div>";
        }

        if($tipo == "especial"){
            $this->model->llenarEspecial($id, $cant);
            $mensaje = "
            <div class='alert alert-success' role='alert'>
            Se ha llenado correctamente el tanque: " . $id . " de la gasolina ESPECIAL!!! </div>";
        }

        if($tipo == "diesel"){
            $this->model->llenarDiesel($id, $cant);
            $mensaje = "
            <div class='alert alert-success' role='alert'>
            Se ha llenado correctamente el tanque: " . $id . " de la gasolina DIESEL!!! </div>";
        }

        $this->enviarMensaje($mensaje);

    }

    function eliminarTanque(){
        parent::__construct();
        $id = isset($_POST['id'])?$_POST['id']:"";
        $this->model->eliminarTanque($id);
        $mensaje = "
        <div class='alert alert-success' role='alert'>
        Se ha eliminado correctamente el tanque: " . $id . " !!! </div>";
        $this->enviarMensaje($mensaje);

    }

    function enviarMensaje($mensaje2){
        $this->view->mensaje = $mensaje2;
        $this->view->listaTanques= $this->model->listaTanques();
        $this->view->renderView('main/main.php');//llamando al metodo renderView para pintar la vista
    }


}
?>