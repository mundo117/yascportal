<!--Declaracion del tipo de formulario-->
{!! Form::open(array('url'=>'configuration/types','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
 <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" v-model="criterio">
                                      <option value="nombre">Nombre</option>
                                      <option value="descripcion">Descripción</option>
                                    </select>
                                    <input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
{{Form::close()}}