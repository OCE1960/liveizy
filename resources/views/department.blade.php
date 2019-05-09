@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Department</div>

                <div class="card-body">

            <form method="POST" action="/createdepartment">
                @csrf
            
                <div class="form-group">
                <label for="department">Department</label>
                <input placeholder="Department" type="text" class="form-control" id="department" name="department" required /> 
                        </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create Department</button>
                </div>
            </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
