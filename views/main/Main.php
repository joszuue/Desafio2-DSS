<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
        
        <title>Despacho y Venta de Gasolina</title>
    </head>
    <style>
        #agre{
            height:100%;
            width:90%;
            background: rgba( 252, 255, 231, 0.3 );
            box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
            backdrop-filter: blur( 3px );
            -webkit-backdrop-filter: blur( 3px );
            border-radius: 10px;
            border: 1px solid rgba( 255, 255, 255, 0.18 );
            margin-top:15%;
        }

        #agre h1{
            margin-top:2vw;
        }

        #agre button{
            margin-bottom:2vw;
        }

        #foot{
            color:white;
        }
        </style>
    <nav class="navbar bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
    <a class="navbar-brand" href="#" style="Color:white;">
      <i class="fa-solid fa-gas-pump" style="color: #ffffff;"></i>
      Los Empresaurios
    </a>
    </div>
    </nav>
    <body style="background-color:#F1F6F9">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Venta de Gasolina</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3">
      <div class="col-12">
        <label for="inputAddress" class="form-label">Seleccionar Tanque</label>
        <select class="form-select" aria-label="Default select example" >
            <option value="" selected>Tanques disponibles</option>
            <?php foreach($this->listaTanques as $lista ){?>
                <option value="<?php echo $lista->getIdTanque(); ?>">Tanque con Id: <?php echo $lista->getIdTanque(); ?></option>
            <?php }?>
        </select>
      </div>
      <div class="col-12">
        <label for="inputAddress" class="form-label">Tipo de Gasolina</label>
        <select class="form-select" aria-label="Default select example" >
            <option selected>Seleccionar Gasolina</option>
            <option value="regu" selected>Regular</option>
            <option value="espe" selected>Especial</option>
            <option value="die" selected>Diesel</option>



        </select>
      </div>
        <div class="col-12">
        <label for="inputPassword4" class="form-label">Cantidad de Galones</label>
        <input type="password" class="form-control" id="inputPassword4">
        </div>
        </form>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Realizar compra</button>
      </div>
    </div>
    </div>
    </div>
    
    <div class="container" id="agre">
    <h1 class="text-center">Gasolinera los Empresaurios</h1>
    <h5 class="text-center">¡Llega más lejos con nosotros!</h5>
        <?php 
            if($this->mensaje != ""){
                echo $this->mensaje; 
            }
        ?>
        <br>
        <center>
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Administrar Tanques</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Realizar venta</button>
        </center>
    </div>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">Administrar tanques</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form role="form" action="<?php echo constant("URL")?>Main/crearTanque" method="POST">
                    <div>
                        <center><input type="submit" value="Crear tanque" class="btn btn-primary"></center>
                        
                    </div>
                </form>
                <br><br>
                <center><h5 class="offcanvas-title" id="offcanvasRightLabel">Tanques creados</h5></center>
                <br>
                <?php foreach($this->listaTanques as $lista ){?>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Tanque con Id: <?php echo $lista->getIdTanque(); ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Regular</h6>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $lista->getCantRegu(); ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $lista->getCantRegu(); ?></div>
                        </div>
                        <br>
                        <form role="form" action="<?php echo constant("URL")?>Main/llenarTanque" method="POST">
                            <input type="hidden" name="tipo" value="regular">
                            <input type="hidden" name="id" value="<?php echo $lista->getIdTanque(); ?>">
                            <div>
                                <center><input type="submit" class="btn btn-success" value="Llenar"></center>
                            </div>
                        </form>
                        <br>
                        <h6 class="card-subtitle mb-2 text-muted">Especial</h6>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $lista->getCantEspecial(); ?>%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="60"><?php echo $lista->getCantEspecial(); ?></div>
                        </div>
                        <br>
                        <form role="form" action="<?php echo constant("URL")?>Main/llenarTanque" method="POST">
                            <input type="hidden" name="tipo" value="especial">
                            <input type="hidden" name="id" value="<?php echo $lista->getIdTanque(); ?>">
                            <div>
                                <center><input type="submit" class="btn btn-warning" value="Llenar"></center>
                            </div>
                        </form>
                        <br>
                        <h6 class="card-subtitle mb-2 text-muted">Diesel </h6>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $lista->getCantDiesel(); ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $lista->getCantDiesel(); ?></div>
                        </div>
                        <br>
                        <form role="form" action="<?php echo constant("URL")?>Main/llenarTanque" method="POST">
                            <input type="hidden" name="tipo" value="diesel">
                            <input type="hidden" name="id" value="<?php echo $lista->getIdTanque(); ?>">
                            <div>
                                <center><input type="submit" class="btn btn-danger" value="Llenar"></center>
                            </div>
                        </form>
                        <br><br>
                        <form role="form" action="<?php echo constant("URL")?>Main/eliminarTanque" method="POST">
                            <input type="hidden" name="id" value="<?php echo $lista->getIdTanque(); ?>">
                            <div>
                                <center><input type="submit" class="btn btn-dark" value="  Eliminar tanque: <?php echo $lista->getIdTanque(); ?>  "></center>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                <?php }?>
            </div>
        </div>
        
    </body>
    <nav class="navbar fixed-bottom bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
    <a class="navbar-brand" id="foot" href="#">La gasolina con mayor octanaje</a>
    </div>
    </nav>
</html>