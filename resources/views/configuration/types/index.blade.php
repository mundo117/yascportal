@extends ('principal')
@section ('contenido')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center titulo-tabla">
				<h3 class="titulo-tabla">Type Users<a href="types/create"><button class="btn btn-success"><span class="boton-titulo">Agregar</span><i class="fa fa-plus"></i></button></a></h3>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
				<div class="buscador">
			@include('configuration.types.search')
				</div>
			</div>
		</div>
	</div>

</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<!--Contenedor de tabla-->
		<div class="table-responsive text-center">
		<!--Declaramos la tabla-->
			 	<table id="mainTable" class="table table-hover" style="cursor: pointer;">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
					<!--Se treaen los datos de la BD-->				
               @foreach ($type_users as $type)
                                    <tr>
                                        <td>{{ $type->id}}</td>
										<td>{{ $type->description}}</td>
										<td>
											<a href="{{URL::action('TipoController@edit', $type->id)}}">
												<button class="btn btn-secondary">
													<i class="fa fa-edit"></i>
												</button>
											</a>
					                         <a href="" data-target="#modal-delete-{{$type->id}}" data-toggle="modal">
					                         	<button class="btn btn-danger">
					                         		<i class="fa fa-ban"></i>
					                         	</button>
					                         </a>
					                        <a href="{{URL::action('TipoController@show',$type->id)}}">
					                        	<button type="button" class="btn btn-success btn-show-TipoUsuario">
					                        		<span class="fa fa-file-text-o"></span>
					                        	</button>
					                        </a>
										</td>
                                    </tr>
                             
				@include('configuration.types.modal')
				@include('configuration.types.show')

				@endforeach
				</tbody>
                            </table>
			<!--Fin de tabla-->
		</div>
		<!--Contenedor de tabla-->
		<!--se llama a la paginacion-->
		{{$type_users->render()}}
	</div>
</div>
<script>
$(document).ready(function(){
     $(".btn-show-TipoUsuario").onclick( 
     	function(){
        IDTipoUsuario = $(this).val();
        $.ajax({
            url:"TipoController@show",
            type:"POST",
            dataType:"html",
            data:{id:IDcategoria},
            success:function(data){
                $("#modal_contrato .modal-body").html(data);
            }
        });
    });
 });
</script>
@endsection