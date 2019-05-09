@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div  class="card">
                <div class="card-header">Staff Department</div>

                <div  class="card-body">

                    @isset($department_list)
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
                    @foreach ($department_list as $dept)
                    <?php ++$sn; ?>
                    <tr>
                            <th scope="col">
                                    {{ $sn }}
                           </th>
                <th scope="col">
                <a href="/role/{{ $dept -> department }}">  {{ $dept -> department }} </a>
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
