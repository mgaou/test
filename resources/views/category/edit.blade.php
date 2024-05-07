@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
          
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    
                <form method="POST" action="{{ route('category.update', $category->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Libellé</label>
                        <input required type="text" name="name" class="form-control" value="{{$category->name}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Valider</button>
                    
                </form>
                    
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
