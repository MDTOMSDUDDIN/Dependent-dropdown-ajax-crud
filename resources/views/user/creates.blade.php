<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dependent Dropdwon Ajax Crud </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="_token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="bg p-3  shadow-lg text-center" >
        <h3 class="text-center">Dependent Dropdwon Ajax Crud</h3>
    </div>
    <div class="container mt-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <a href="{{ route('list') }}" class="btn btn-primary mb-3 margin-left">Break</a>
                <div class="card card-primary p-4 border-0 shadow-lg">
                    <form action="#" name="frm" id="frm" method="POST">
                        @csrf
                        <div class="card-body">
                            <h4 class="text-center">Create Users</h4>

                            <div class="mb-3">
                                <input type="text" class="form-control form-control-lg" name="name" id="name" placeholder="Enter Your Name">
                                <p class="invalid-feedback" id="name-error"></p>
                            </div>

                            <div class="mb-3">
                                <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Enter Your email">
                                <p class="invalid-feedback" id="email-error"></p>
                            </div>

                            <div class="mb-3">
                               <Select name="country" id="country" class="form-control form-control-lg">
                                <option value="">Select Country</option>
                                @if (!empty('$countries'))
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                @endif
                               </Select>
                            </div>

                            <div class="mb-3">
                               <Select name="state" id="state" class="form-control form-control-lg">
                                <option value="">Select State</option>
                               </Select>
                            </div>
                            <div class="mb-3">
                               <Select name="city" id="city" class="form-control form-control-lg">
                                <option value="">Select City</option>
                               </Select>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-primary btn-lg">Create</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

 <script>
   $.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
    });

    $(document).ready(function(){
        $("#country").change(function(){
            var country_id = $(this).val();

            if(country_id === ""){
                country_id = 0;
            }

            $.ajax({
                url:'{{ url("/fetch-state/") }}/' + country_id ,
                type: "POST",
                dataType: "json",
                success: function(response){
                    $('#state').find('option:not(:first)').remove();
                    $('#city').find('option:not(:first)').remove();

                    if(response['states'].length > 0){
                        $.each(response['states'], function(key, value){
                            $("#state").append("<option value='"+value['id']+"'> "+ value['name'] +  "</option>");
                        });
                    }
                },
            });
        });

    //---------------------------------------------------------------------------------------
        $("#state").change(function(){
            var state_id = $(this).val();

            if(state_id === ""){
                state_id = 0;
            }

            $.ajax({
                url:'{{ url("/fetch-cities/") }}/' + state_id ,
                type: "POST",
                dataType: "json",
                success: function(response){
                    $('#city').find('option:not(:first)').remove();

                    if(response['cities'].length > 0){
                        $.each(response['cities'], function(key, value){
                            $("#city").append("<option value='"+value['id']+"' > "+ value['name'] + "</option>");
                        });
                    }
                }
            });
        });
    });
//create |save-------------------------------------------------
    $("#frm").submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: '{{ url("/save") }}',
                type: 'post',
                data: $("#frm").serializeArray(),
                dataType: 'json',
                success: function(response) {
                    alert(response['status']);
                    if (response['status'] == 1) {
                        window.location.href = "{{ url('/list') }}";
                    } else {
                        if (response['errors']['name']) {
                            $("#name").addClass('is-invalid');
                            $("#name-error").html(response['errors']['name']);
                        } else {
                            $("#name").removeClass('is-invalid');
                            $("#name-error").html("");
                        }

                        if (response['errors']['email']) {
                            $("#email").addClass('is-invalid');
                            $("#email-error").html(response['errors']['email']);
                        } else {
                            $("#email").removeClass('is-invalid');
                            $("#email-error").html("");
                        }
                    }
                }
            });
        })

 </script>
</body>
</html>

