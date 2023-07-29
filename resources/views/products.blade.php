<!DOCTYPE html>
<html>

<head>
    <title>Products API</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/@icon/themify-icons@1.0.1-alpha.3/themify-icons.min.css" rel="stylesheet">
</head>

<body class="antialiased">
    <div style="margin:auto; width:90%; padding:5px;">
        <nav style="padding-bottom:1rem">
            <div>
                <h1> Products API </h1>
            </div>
        </nav>
        <button type="button" data-toggle="modal" data-target="#CreateModal">Add Product</button>

        <div class="table-responsive-md mt-4" style="">
            <table class=" table table-bordered mb-3" id="products_table" style="width:100%;">
                <thead id="products_header">
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="product_tbody">
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->created_at}}</td>
                        <td>{{$product->updated_at}}</td>
                        <td style="display:flex; justify-content:right">
                            <button type="button" id="product_update" data-id="{{$product->id}}" data-toggle="modal" data-target="#UpdateModal"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                </svg>
                            </button>

                            <button type="button" id="product_delete" data-id="{{$product->id}}"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path d="M576 128c0-35.3-28.7-64-64-64H205.3c-17 0-33.3 6.7-45.3 18.7L9.4 233.4c-6 6-9.4 14.1-9.4 22.6s3.4 16.6 9.4 22.6L160 429.3c12 12 28.3 18.7 45.3 18.7H512c35.3 0 64-28.7 64-64V128zM271 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                </svg>
                            </button>


        </div>
    </div>

    </td>

    </tr>
    @endforeach
    </tbody>
    </table>

    </div>


    </div>

    <!-- Modal Create -->
    <div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post" name="create" id="create_id">
                        @csrf
                        <ul>
                            Input Name <input type="text" name="name" required><br>
                            Input description<input type="text" name="description" required><br>
                            Input price<input type="number" step="0.01" name="price" required><br>


                        </ul>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Update -->
    <div class="modal fade" id="UpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method=" post" name="update" id="update_id">
                        @csrf
                        <ul>
                            ID: <input type="text" id="product_id" disabled><br>
                            Input Name: <input type="text" name="name" required><br>
                            Input description: <input type="text" name="description" required><br>
                            Input price: <input type="number" name="price" required><br>


                        </ul>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Update -->
    <div class="modal fade" id="UpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method=" post" name="update" id="update_id">
                        @csrf
                        <ul>
                            ID: <input type="text" id="product_id" disabled><br>
                            Input Name: <input type="text" name="name" required><br>
                            Input description: <input type="text" name="description" required><br>
                            Input price: <input type="number" name="price" required><br>


                        </ul>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        //index table
        $('#products_table').DataTable({
            scrollX: true,
            paging: true,
            scroller: true,
            order: [
                [0, 'asc']
            ]
        });
        //create method
        $("#create_id").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "/api/products/create",
                data: $("#create_id").serialize(),
                success: function(response) {
                    alert('Success');
                },
                error: function(response) {
                    console.log(response);
                }
            });
            $("#CreateModal").modal('hide');
        });
        //delete method
        $(document).ready(function() {
            function deleteProduct(id, row) {
                $.ajax({
                    url: '/api/products/delete/' + id,
                    type: 'DELETE',
                    success: function(response) {
                        console.log(response);
                        row.remove();
                        alert('Deleted');
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            }
            $("#products_table").on("click", "#product_delete", function() {
                var id = $(this).data("id");
                var row = $(this).closest("tr");

                var shouldDelete = confirm("Are you sure you want to delete this product?");
                if (!shouldDelete) {
                    return;
                }

                deleteProduct(id, row);
            });
        });
        //update method
        $('#UpdateModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data("id");
            $('#product_id').val(id);
        });
        $("#update_id").submit(function(e) {
            var id = $('#product_id').val();
            e.preventDefault();
            $.ajax({
                url: '/api/products/update/' + id,
                type: 'PUT',
                data: $("#update_id").serialize(),
                success: function(response) {
                    console.log(response.message);
                    alert("Product Updated");

                },
                error: function(response) {
                    console.log(response)

                }
            });
            $("#UpdateModal").modal('hide');
        });
    </script>

</body>

</html>