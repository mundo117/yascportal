@extends ('principal')
@section ('contenido')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center titulo-tabla">
				<h3 class="titulo-tabla">Users <a href="users/create"><button class="btn btn-success"><span class="boton-titulo">Agregar</span><i class="fa fa-plus"></i></button></a></h3>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
				<div class="buscador">
			@include('configuration.users.search')
				</div>
			</div>
		</div>
	</div>

</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<!--Contenedor de tabla-->
		<div class="card-body">
		<!--Declaramos la tabla-->
		   <table class="table table-bordered table-striped table-sm">
                          <thead>
                                <tr>
                                   <th>Id</th>
                                    <th>Name</th>
                                    <th>email</th>
                                     <th>Options</th>
                                 </tr>
                            </thead>
                           <tbody>			<!--Se treaen los datos de la BD-->
               @foreach ($users as $user)
				<tr>
					<td>{{ $user->id}}</td>
					<td>{{ $user->name}}</td>
					<td>{{ $user->email}}</td>
					<td>
						<a href="{{URL::action('UserController@edit',$user->id)}}">
							<button class="btn btn-secondary">
								<i class="fa fa-edit"></i>
							</button>
						</a>
                         <a href="" data-target="#modal-delete-{{$user->id}}" data-toggle="modal">
                         	<button class="btn btn-danger">
                         		<i class="fa fa-ban"></i>
                         	</button>
                         </a>
                        <a href="{{URL::action('UserController@show',$user->id)}}">
                        	<button type="button" class="btn btn-success btn-show-User">
                        		<span class="fa fa-file-text-o"></span>
                        	</button>
                        </a>
                       
					</td>
				</tr>
				@include('configuration.users.modal')
				@include('configuration.users.show')

				@endforeach
			</table>
			<!--Fin de tabla-->
		</div>
		<!--Contenedor de tabla-->
		<!--se llama a la paginacion-->
		{{$users->render()}}
	</div>
</div>
<script>
$(document).ready(function(){
     $(".btn-show-User").onclick( 
     	function(){
        IDUser = $(this).val();
        $.ajax({
            url:"UserController@show",
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