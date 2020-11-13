<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Latihan CRUD</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/css/mdb.min.css" rel="stylesheet">

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/js/mdb.min.js"></script>
</head>
<body>

    <style>
        .container
        {
            padding:0.5%;
        }
    </style>
    <div class="container">
    	<h2 class="alert alert-success">Perpustakaan</h2>
        <div class="row">
        	<a href="" class="btn btn-info" style="margin-left:84%" data-toggle="modal" data-target="#exampleModal">ADD NEW BOOK</a>
            <div class="col-md-12">
                @if($message = Session::get('success'))
                    <div class="alert-success">
                        <p>{{$message}}</p>
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Author</th>
                            <th>Year</th>
                            <th>Publisher</th>
                            <th>Country</th>
                            <th>Action</th>
                        </tr>
                        <tbody>
                        @foreach($perpuses as $key=>$perpus)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$perpus->name}}</td>
                                <td>{{$perpus->author}}</td>
                                <td>{{$perpus->year}}</td>                                
                                <td>{{$perpus->publisher}}</td>
                                <td>{{$perpus->country}}</td>
                                <td>
                                    <a data-perpus_id="{{$perpus->id}}" data-name="{{$perpus->name}}" data-year="{{$perpus->year}}" data-author="{{$perpus->author}}" data-publisher="{{$perpus->publisher}}" data-country="{{$perpus->country}}" data-toggle="modal" data-target="#exampleModal-show" type="button" class="btn btn-warning btn-sm">Show</a>
                                    <a data-perpus_id="{{$perpus->id}}" data-name="{{$perpus->name}}" data-year="{{$perpus->year}}" data-author="{{$perpus->author}}" data-publisher="{{$perpus->publisher}}" data-country="{{$perpus->country}}" data-toggle="modal" data-target="#exampleModal-edit" type="button" class="btn btn-info btn-sm">Edit</a>
                                    <a data-perpus_id="{{$perpus->id}}" data-toggle="modal" data-target="#exampleModal-delete" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody> 
                        {{$perpuses->links()}}                       
                    </thead>
                </table>

                <!-- ADD NEW BOOK -->
                <!-- Modal -->
                <div class="modal fade right" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
                        <div class="modal-content">
	                        <div class="modal-header">
	                            <h5 class="modal-title" id="exampleModalLabel">Book Info</h5>
	                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                            	<span aria-hidden="true">&times;</span>
	                            </button>
	                        </div>
	                        <div class="modal-body">
	                            <form action="{{route('perpus.store')}}" method="POST">
	                            	@csrf
	                                <div class="input-group">
	                                    <div class="input-group-prepend">
	                                        <span class="input-group-text">Name</span>
	                                    </div>
	                                    <input type="text" class="form-control" name="name" placeholder="Book Name">
	                                </div>
	                                <br>
	                                <div class="input-group">
	                                    <div class="input-group-prepend">
	                                        <span class="input-group-text">Year</span>
	                                    </div>
	                                    <input type="text" class="form-control" name="year" placeholder="Book Release Year">
	                                </div>
	                                <br>
	                                <div class="input-group">
	                                    <div class="input-group-prepend">
	                                        <span class="input-group-text">Author</span>
	                                    </div>
	                                    <input type="text" class="form-control" name="author" placeholder="Book Author">
	                                </div>
	                                <br>
	                                <div class="input-group">
	                                    <div class="input-group-prepend">
	                                        <span class="input-group-text">Publisher</span>
	                                    </div>
	                                    <input type="text" class="form-control" name="publisher" placeholder="Book Publisher">
	                                </div>
	                                <br>
	                                <div class="input-group">
	                                    <div class="input-group-prepend">
	                                        <span class="input-group-text">Country</span>
	                                    </div>
	                                    <input type="text" class="form-control" name="country" placeholder="Book From...">
	                                </div>
	                                <br>
	                        		<div class="modal-footer">
		                            	<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
		                            	<button type="submit" class="btn btn-success">Save Book</button>
	                        		</div>
	                        	</form>
	                        </div>
                    	</div>
                	</div>
				</div>
				<!-- END ADD BOOK -->

                <!-- EDIT BOOK -->
                <!-- Modal -->
                <div class="modal fade left" id="exampleModal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-notify modal-lg modal-right modal-info" role="document">
                        <div class="modal-content">
                        	<div class="modal-header">
	                            <h5 class="modal-title" id="exampleModalLabel">Edit Book Info</h5>
	                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                            	<span aria-hidden="true">&times;</span>
	                            </button>
                        	</div>
	                        <div class="modal-body">
	                            <form action="{{route('perpus.update', 'perpus_id')}}" method="POST">
	                            	@csrf
                            		@method('PUT')
	                                <div class="input-group">
	                                    <div class="input-group-prepend">
	                                        <span class="input-group-text">Name</span>
	                                    </div>
	                                    <input type="text" class="form-control" id="name" name="name" placeholder="Book Name">
	                                </div>
	                                <input type="hidden" id="perpus_id" name="perpus_id">
	                                <br>
	                                <div class="input-group">
	                                    <div class="input-group-prepend">
	                                        <span class="input-group-text">Year</span>
	                                    </div>
	                                    <input type="text" class="form-control" id="year" name="year" placeholder="Book Release Year">
	                                </div>
	                                <br>
	                                <div class="input-group">
	                                    <div class="input-group-prepend">
	                                        <span class="input-group-text">Author</span>
	                                    </div>
	                                    <input type="text" class="form-control" id="author" name="author" placeholder="Book Author">
	                                </div>
	                                <br>
                                	<div class="input-group">
	                                    <div class="input-group-prepend">
	                                        <span class="input-group-text">Publisher</span>
	                                    </div>
	                                    <input type="text" class="form-control" id="publisher" name="publisher" placeholder="Book Publisher">
	                                </div>
	                                <br>
	                                <div class="input-group">
	                                    <div class="input-group-prepend">
	                                        <span class="input-group-text">Country</span>
	                                    </div>
	                                    <input type="text" class="form-control" id="country" name="country" placeholder="Book From...">
	                                </div>
	                                <br>	                    
			                        <div class="modal-footer">
			                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
			                            <button type="submit" class="btn btn-info">Save Changes</button>
			                        </div>
	                        	</form>
                        	</div>
                        </div>
                    </div>
                </div>
                <!-- END MODAL EDIT -->

                <!-- DELETE BOOK -->
                <!-- Modal -->
                <div class="modal fade top" id="exampleModal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-notify modal-right modal-danger" style="color:white;" role="document">
                        <div class="modal-content">
	                        <div class="modal-header">
	                            <h5 class="modal-title" id="exampleModalLabel">Remove Book</h5>
	                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                            <span aria-hidden="true">&times;</span>
	                            </button>
	                        </div>
	                        <div class="modal-body">
		                        <form action="{{route('perpus.destroy', 'perpus_id')}}" method="POST">
		                        	@csrf
		                        	@method('DELETE')
	                                <input type="hidden" id="perpus_id" name="perpus_id">
	                                <p class="text-center" width="50px">Do you want to remove this book information?</p>
			                        <div class="modal-footer">
			                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
			                            <button type="submit" class="btn btn-danger">Delete Book Information</button>
			                        </div>
		                        </form>
	                        </div>
                    	</div>
                	</div>
            	</div>
            	<!-- END MODAL DELETE -->

    			<!-- SHOW BOOK -->
                <!-- Modal -->
                <div class="modal fade left" id="exampleModal-show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-notify modal-lg modal-right modal-warning" role="document">
                        <div class="modal-content">
                        	<div class="modal-header">
	                            <h5 class="modal-title" id="exampleModalLabel">Show Book Info</h5>
	                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                            	<span aria-hidden="true">&times;</span>
	                            </button>
                        	</div>
	                        <div class="modal-body">
	                            <form action="{{route('perpus.show', 'perpus_id')}}" method="get">
	                            	@csrf
                            		<!-- @method('PUT') -->
	                                <div class="input-group">
	                                    <div class="input-group-prepend">
	                                        <span class="input-group-text">Name</span>
	                                    </div>
	                                    <input type="text" class="form-control" id="name" name="name" placeholder="Book Name" readonly>
	                                </div>
	                                <input type="hidden" id="perpus_id" name="perpus_id">
	                                <br>
	                                <div class="input-group">
	                                    <div class="input-group-prepend">
	                                        <span class="input-group-text">Year</span>
	                                    </div>
	                                    <input type="text" class="form-control" id="year" name="year" placeholder="Book Release Year" readonly>
	                                </div>
	                                <br>
	                                <div class="input-group">
	                                    <div class="input-group-prepend">
	                                        <span class="input-group-text">Author</span>
	                                    </div>
	                                    <input type="text" class="form-control" id="author" name="author" placeholder="Book Author" readonly>
	                                </div>
	                                <br>
                                	<div class="input-group">
	                                    <div class="input-group-prepend">
	                                        <span class="input-group-text">Publisher</span>
	                                    </div>
	                                    <input type="text" class="form-control" id="publisher" name="publisher" placeholder="Book Publisher" readonly>
	                                </div>
	                                <br>
	                                <div class="input-group">
	                                    <div class="input-group-prepend">
	                                        <span class="input-group-text">Country</span>
	                                    </div>
	                                    <input type="text" class="form-control" id="country" name="country" placeholder="Book From..." readonly>
	                                </div>
	                                <br>	                    
			                        <div class="modal-footer">
			                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
			                        </div>
	                        	</form>
                        	</div>
                        </div>
                    </div>
                </div>
                <!-- END MODAL SHOW -->
            </div>
        </div>
    </div>
</body>
<script>
    $('#exampleModal-edit').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var name = button.data('name')
        var year = button.data('year')
        var author = button.data('author')
        var publisher = button.data('publisher')
        var country = button.data('country')
        var perpus_id = button.data('perpus_id')

        var modal = $(this)

        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #year').val(year);
        modal.find('.modal-body #author').val(author);
        modal.find('.modal-body #publisher').val(publisher);
        modal.find('.modal-body #country').val(country);
        modal.find('.modal-body #perpus_id').val(perpus_id);
    });

    $('#exampleModal-delete').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var perpus_id = button.data('perpus_id')

        var modal = $(this)

        modal.find('.modal-body #perpus_id').val(perpus_id);
    });

    
    $('#exampleModal-show').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var name = button.data('name')
        var year = button.data('year')
        var author = button.data('author')
        var publisher = button.data('publisher')
        var country = button.data('country')
        var perpus_id = button.data('perpus_id')

        var modal = $(this)

        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #year').val(year);
        modal.find('.modal-body #author').val(author);
        modal.find('.modal-body #publisher').val(publisher);
        modal.find('.modal-body #country').val(country);
        modal.find('.modal-body #perpus_id').val(perpus_id);
    });
</script>
</html>