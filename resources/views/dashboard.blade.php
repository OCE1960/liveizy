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
                <div class="card-header">Staff Dashboard</div>

                <div  class="card-body">
                @if (session('staff_success'))
                <div class="alert alert-success">
                    {{ session('staff_success') }}
                </div>
                    @endif
                    @if (session('department_success'))
                    <div class="alert alert-success">
                        {{ session('department_success') }}
                    </div>
                @endif

                @if (session('staffrole_success'))
                <div class="alert alert-success">
                    {{ session('staffrole_success') }}
                </div>
            @endif
                    @isset($staffs)
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
                                   Email
                        </th>
       
                        <th scope="col">
                                       Phone Number
                        </th>
       
                        <th scope="col">
                                           Staff Level
                        </th>
                        <th scope="col">
                                Add Staff to Department
             </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                    <?php $sn = 0; ?>
                    @foreach ($staffs as $staff)
                    <?php ++$sn; ?>
                    <tr>
                            <th scope="col">
                                    {{ $sn }}
                           </th>
                <th scope="col">
                        <a href="/detail/{{$staff->id}}">  {{ $staff -> name }} </a>
                </th>
                <th scope="col">
                            {{ $staff -> email }}
                </th>

                <th scope="col">
                                {{ $staff -> phone_number }}
                </th>

                <th scope="col">
                                    {{ $staff -> level }}
                </th>

                <th scope="col">
            <form method="GET" action="/role_creation/{{$staff->id}}">
                    <div class="form-group">
                <input type="hidden" value="{{ $staff -> id }}">
                    <button type="submit" class="btn btn-primary">Add Staff to Department</button>
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
