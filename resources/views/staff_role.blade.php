@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Assign Staff Role/Department</div>

                <div class="card-body">
                
                <?php
                 foreach($staff as $staff_name){
                     $staff_name =  $staff_name;
                 }
                ?>

            <form method="POST" action="/createStaffRole">
                @csrf
            
                <div class="form-group">
                <label for="staff_name">Staff Name</label>
                <input type="hidden" name="staff_id" value="{{ $id }}">
                <input placeholder="Staff Name" value="{{ $staff_name }}" type="text" class="form-control" id="staff_name" name="staff_name" required /> 
                        </div>

                <div class="form-group">
                        <label for="department">Department</label>
                        <select class="form-control" id="department" name="staff_department">
                                <?php
                                foreach($department as $staff_department){
                  
                                  echo '<option>'. $staff_department -> department . '</option>';
                                }
                               
                               ?>
                        </select>
                        </div>

    <div class="form-group">
            <label for="staff_role">Staff Role</label>
            <input placeholder="Staff Role" type="text" class="form-control" id="staff_role" name="staff_role" required /> 
                    </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Assign Staff Role/Department</button>
                </div>
            </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
