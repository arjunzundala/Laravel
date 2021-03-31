<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Laravel - 8 AJAX Crud</title>
  </head>
  <body>
    <!-- <h1>Hello, world!</h1> -->

    <section style="padding-top: 60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Students <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Student</a></h3>
                        </div>
                        <div class="card-body">
                            <table class="table" id="studentTable" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>City</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $stud)
                                        <tr>
                                            <td>{{$stud->id}}</td>
                                            <td>{{$stud->name}}</td>
                                            <td>{{$stud->mobile}}</td>
                                            <td>{{$stud->email}}</td>
                                            <td>{{$stud->city}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Student Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="StudentForm">
                    @csrf
                    <div class="container">
                        <div class="row">
                        <div class="col-md-12">
                                <div class="form-group">
                                    <h6>Name</h6>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <h6>Mobile</h6>
                                    <input type="text" class="form-control" name="mobile" id="mobile">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <h6>Email</h6>
                                    <input type="text" class="form-control" name="email" id="email">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <h6>City</h6>
                                    <input type="text" class="form-control" name="city" id="city">
                                </div>
                            </div>

                            <div class="col-md-12 mt-5">
                                <input type="submit" value="Submit" class="btn btn-success">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>

<script>
$(document).ready(function(){
    $("#StudentForm").on("submit", function(e){
        e.preventDefault();

        let name = $("#name").val();
        let mobile = $("#mobile").val();
        let email = $("#email").val();
        let city = $("#city").val();
        let _token = $("input[name=_token]").val();

        $.ajax({
            url :  "{{route('student.add')}}",
            method : "POST",
            data : {
                name : name,
                mobile : mobile,
                email : email,
                city : city,
                _token : _token
            },
            success : function(data) {
                if(data) {
                    $("#studentTable tbody").prepend('<tr><td>'+data.id+'</td><td>'+data.name+'</td><td>'+data.mobile+'</td><td>'+data.email+'</td><td>'+data.city+'</td></tr>');
                    $("#StudentForm")[0].reset();
                    $("#exampleModal").modal('hide');
                }
            }
        })
    
    })
})
</script>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  </body>
</html>
