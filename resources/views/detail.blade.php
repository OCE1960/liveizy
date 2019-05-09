@extends('layouts.app')

@section('content')
<div class="">
    <div class="row justify-content-center">
 <div class="col-md-2">
 <div class="card">

 <div class="card-header">Staff Creation</div>
  <div class="card-body">
        <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="/staff_creation">Add Staff</a></li>
             <li class="list-group-item"><a href="/department_creation">Add Department</a></li>
              </ul>
    </div>

    <div class="card-header">Staff Edition</div>
    <div class="card-body">
          <ul class="list-group list-group-flush">
          <li class="list-group-item"><a href="/dashboard">Staff</a></li>
               <li class="list-group-item"><a href="/department_list"> Department</a></li>
                </ul>
      </div>


 </div>
   

            </div>
        <div class="col-md-8">
            <div  class="card">
                <div class="card-header">Staff Department & Roles</div>

                <div  class="card-body">
   

                    @isset($staff_role)
                    <table class="table">
                        <thead class="thead-dark">
                                <tr>
                        <th scope="col">
                                S/N
                            </th>
                        <th scope="col">
                              Staff Name
                        </th>
                        <th scope="col">
                                   Department
                        </th>
       
                        <th scope="col">
                                       Role
                        </th>
       
                        <th scope="col">
                                    Remove from Department
                        </th>
        
                                    </tr>
                                    </thead>
                                    <tbody>
                    <?php $sn = 0; ?>
                    @foreach ($staff_role as $staff)
                    <?php ++$sn; ?>
                    <tr>
                            <th scope="col">
                                    {{ $sn }}
                           </th>
                <th scope="col">
                          {{ $staff ->  staff_name }} 
                </th>
                <th scope="col">
                            {{ $staff -> staff_department }}
                </th>

                <th scope="col">
                    {{ $staff -> staff_role }}
        </th>



                <th scope="col">
            <form method="POST" action="/delete/{{$staff->id}}">
                 <div class="form-group">
                <input type="hidden" name="id" value="{{ $staff -> id }}">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-primary">Delete from Department</button>
                    </div>   
                    </form>
               </th>
                        
                    </tr>  
                    @endforeach
                </tbody>
                </table>
                    @endisset

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
