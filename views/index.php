
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seleccion Dependiente</title>

    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">

</head>
 
<body>
    <div class="container">
        <br><br>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                        <h4>Lista de Productos</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon" >Buscar:</span>
                                        <input type="text" class="form-control" placeholder="Buscar algo..." id="search" name="search">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button class="btn btn-success btn-add" data-toggle="modal" data-target="#myModal">
                                        <span class="glyphicon glyphicon-plus"></span> Agregar Producto
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="tbListProducts" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Precio</th>
                                            <th>Stock</th>
                                            <th>Categoria</th>
                                            <th>Subcategoria</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <form action="#" method="POST" id="form-product">
                <input type="hidden" id="action" name="action" value="save">
                <input type="hidden" id="idProduct" name="idProduct">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" id="name" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label for="price">Precio:</label>
                        <input type="text" name="price" id="price" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <input type="text" name="stock" id="stock" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label for="category">Categoria:</label>
                        <select name="category" id="category" class="form-control" required="required"></select>
                    </div>
                    <div class="form-group">
                        <label for="subcategory">Subcategoria:</label>
                        <select name="subcategory" id="subcategory" class="form-control" required="required">
                            <option value="">Seleccione Subcategoria...</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>

      </div>
    </div>

    <script src="../resources/js/jquery.min.js"></script>
    <script src="../resources/js/bootstrap.min.js"></script>
    <script>
        var base_url = "http://localhost/dependent-selection/";
    </script>
    <script src="../resources/js/script.js"></script>
</body>
</html>

    