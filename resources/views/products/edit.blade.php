@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header  text-center">Redaguojamas produktas</div>

                    <div class="card-body">

                        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @include('products.form')
                        </form>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

{{--
1. pavadinimas
2. kaina
3. kiekis
4. nuotraukos url
--}}