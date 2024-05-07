@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
          
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Details</div>

                <div class="card-body">
                    
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Slug</th>
                                <th scope="col">Name</th>
                            </tr>
                        </thead>
                            <tbody>
                                <tr>                                
                                    <td>{{$category->slugs}}</td>
                                    <td>{{$category->name}}</td>
                                </tr>
                            </tbody>
                  </table>
                </div>

                <div class="card-footer text-body-secondary">
                    <button type="button" class="btn btn-primary">
                        <a class="text-white text-decoration-none" href="{{url()->previous()}}">Retour</a>
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
