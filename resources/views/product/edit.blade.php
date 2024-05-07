@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
          
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    
                <form method="POST" action="{{ route('product.update', $product->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Libellé</label>
                        <input required type="text" name="name" class="form-control" value="{{$product->name}}">
                        <label class="form-label">Quantity</label>
                        <input type="text" name="quantity" class="form-control" value="{{$product->quantity}}">
                        <p>
                            <label for="Categorie">Catégorie :</label>
                            <select class="form-select" name="category_id" id="category_id">
                                @foreach($categories as $category) 
                                    <option {{$product->category->is($category) ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </p>
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    
                </form>
                    
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
