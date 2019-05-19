@extends ('welcome')
@section ('content')
 <div class="container">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <button id="btn_add" name="btn_add" class="btn btn-default pull-right">Add New Product</button>
                    </div>
                </div>
            </div>
           
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <div class="input-group col-sm-12">
                    <input type="text" class="form-control search-food" placeholder="search">
                  </div>
                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                        <thead>
                            <tr class="info">
                              <th>ID</th>
                              <th>Comida</th>
                              <th>Precio</th>
                              <th>Estado</th>
                              <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody id="products-list" name="products-list">
                            @foreach ($products as $product)
                              <tr id="product{{$product->id}}" class="active">
                                  <td>{{$product->id}}</td>
                                  <td>{{$product->name}}</td>
                                  <td>{{$product->price}}</td>
                                  @if (($product->status) == 1)
                                  <td><span class="badge badge-success">Activo</span></td>
                                  @elseif(($usertype->status) == 0)
                                   <td><span class="badge badge-secondary">Inactivo</span></td>
                                  @endif
                                  <td width="35%">
                                      <button class="btn btn-warning btn-detail open_modal" value="{{$product->id}}">Edit</button>
                                      <button class="btn btn-danger btn-delete delete-product" value="{{$product->id}}">Delete</button>
                                  </td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>

        <!-- Passing BASE URL to AJAX -->
        <input id="url" type="hidden" value="{{ \Request::url() }}">

        <!-- MODAL SECTION -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Product Form</h4>
              </div>
              <div class="modal-body">
                <form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="">
                  <div class="form-group error">
                    <label for="inputName" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control has-error" id="name" name="name" placeholder="Product Name" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputDetail" class="col-sm-3 control-label">Price</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="price" name="price" placeholder="Price" value="">
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" value="add">Save Changes</button>
                <input type="hidden" id="product_id" name="product_id" value="0">
              </div>
            </div>
          </div>
        </div>
@endsection