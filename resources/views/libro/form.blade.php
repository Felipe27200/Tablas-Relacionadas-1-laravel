<!-- Por ser el template de los formularios de creación y actualización
es aquí donde se deben traer los valores de la tabla fuerte, para generar
desde aquí la relación -->
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <!-- Estos definen el tipo de elemento HTML que aparece en el formulario -->
            {{ Form::label('categoria_id') }}

            <!-- Aquí se define un elemento </select> y se le va añadir 
            los valores de la variable recibida desde LibroController, $categorias.
            
            De esta manera, nos trae el nombre de la categoria y lo muestra en el </option> de </select> -->
            {{ Form::select('categoria_id', $categorias, $libro->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Categoria Id']) }}
            {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $libro->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20 mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>