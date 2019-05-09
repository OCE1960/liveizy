@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Staff</div>

                <div class="card-body">

            <form method="POST" action="/createstaff">
                @csrf
            
                <div class="form-group">
                <label for="name">Name</label>
                <input placeholder="name" type="text" class="form-control" id="name" name="name" required /> 
                        </div>

                <div class="form-group">
                        <label for="email">Email</label>
                        <input placeholder="email" type="email" class="form-control" id="email" name="email" required /> 
                                </div>

                <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input placeholder="Phone Number" type="tel" class="form-control" id="phone_number" name="phone_number" required /> 
                                </div>

                <div class="form-group">
                        <label for="level">Level</label>
                        <input placeholder="level" type="number" class="form-control" id="level" name="level" required /> 
                                </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create Staff</button>
                </div>
            </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
