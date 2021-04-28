<?php
require 'head.php';

?>
<div class="container">
    <h1>Nuevas Notas</h1>

    <h3>Notas de: </h3>
    <div class="col col-6">
        <label for="">Nota 1</label>
        <input type="text" class="form-control" name="nota1" id="">
    </div>
    <div class="col col-6">
        <label for="">Nota 2</label>
        <input type="text" class="form-control" name="nota2" id="">
    </div>
    <div class="col col-6">
        <label for="">Nota 3</label>
        <input type="text" class="form-control" name="nota3" id="">
    </div>
    <br>
    <input type="submit" class="btn btn-success" value="Guardar">
</div>
<?php
require 'footer.php';

?>