@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
          
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Produits disponibles</div>

                <div class="card-body">
                    
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Categorie</th>
                                <th scope="col">created_at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        @foreach($products as $product)  
                                <tr>                                
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->category->name}}</td><!-- ramene le produit a sa categorie -->
                                    <td>{{$product->created}}</td>
                                   <td>
                                       

                                   
                                    <button type="button" class="btn btn-primary">
                                        <a class="text-white text-decoration-none" href="{{route('product.show', $product->id)}}">Voir</a>
                                    </button>
                                    <button type="button" class="btn btn-secondary">
                                        <a  class="text-white text-decoration-none" href="{{route('product.edit', $product->id)}}">Modifier</a>
                                    </button>
                                    <form action="{{route('product.destroy', $product->id)}}" method="POST"  style="display: inline;">
                                        @csrf
                                        @method("DELETE")
                                        <button onclick="return confirm('Voulez-vous vraiment supprimer ce produit?')" type="submit" class="btn btn-danger">
                                            Supprimer
                                        </button>
                                     
                                    </form>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                  </table>
                </div>

                <div class="card-footer text-body-secondary">
                    {{$products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
