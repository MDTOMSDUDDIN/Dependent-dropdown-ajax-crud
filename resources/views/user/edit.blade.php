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
                            <h4 class="text-center">Edit Users</h4>

                            <div class="mb-3">
                                <input type="text" class="form-control form-control-lg" name="name" id="name" value="{{ $user->name }}">
                                <p class="invalid-feedback" id="name-error"></p>
                            </div>

                            <div class="mb-3">
                                <input type="email" class="form-control form-control-lg" name="email" id="email" value="{{ $user->email }}">
                                <p class="invalid-feedback" id="email-error"></p>
                            </div>

                            <div class="mb-3">
                               <Select name="country" id="country" class="form-control form-control-lg">
                                <option value="">Select Country</option>
                                @if (!empty('$countries'))
                                    @foreach ($countries as $country)
                                        <option {{ ($user->country == $country->id) ? 'selected':'' }} value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                @endif
                               </Select>
                            </div>

                            <div class="mb-3">
                               <Select name="state" id="state" class="form-control form-control-lg">
                                <option value="">Select State</option>
                                @if (!empty('$states'))
                                    @foreach ($states as $state)
                                        <option {{ ($user->state == $state->id) ? 'selected':'' }} value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                            	@endif
                               </Select>
                            </div>
                            <div class="mb-3">
                               <Select name="city" id="city" class="form-control form-control-lg">
                                <option value="">Select City</option>
                                @if (!empty('$cities'))
                                    @foreach ($cities as $city)
                                        <option {{ ($user->city == $city->id) ? 'selected':'' }} value="{{ $city->id }}">{{ $state->name }}</option>
                                    @endforeach
                            	@endif
                               </Select>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-primary btn-lg">Update</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    

</body>
</html>

