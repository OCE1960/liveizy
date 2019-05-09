@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div  class="card">
                <div class="card-header">Staff Department</div>

                <div  class="card-body">

                    @isset($staff_role)
                    <table class="table">
                        <thead class="thead-dark">
                                <tr>
                        <th scope="col">
                                S/N
                            </th>
                        <th scope="col">
                              Staff Department
                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                    <?php $sn = 0; ?>
                    @foreach ($staff_role as $dept)
                    <?php ++$sn; ?>
                    <tr>
                            <th scope="col">
                                    {{ $sn }}
                           </th>
                <th scope="col">
                <a href="/role/{{ $dept -> department }}">  {{ $dept -> staff_department }} </a>
                </th>>
                        
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
