@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header  text-center">Naujas produktas</div>

                    <div class="card-body">

                        @if($errors->any())
                            <div class="alert alert-danger">

                                @foreach($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach

                            </div>
                        @endif

                        {{--
                        1. Produkto pavadinimas - DONE
                        2. Kaina
                        3. Kiekis
                        4. Nuotrauka
                        5. Submit mygtukas
                        --}}

                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf()

                            <div class="form-group">
                                <label for="product-title">Pavadinimas</label>
                                <input type="text" value="{{ old('title') }}" name="title" class="form-control" id="product-title" placeholder="Įvesti pavadinimą">
                            </div>

                            <div class="form-group">
                                <label for="product-price">Kaina</label>
                                <input type="text" value="{{ old('price') }}" name="price" class="form-control" id="product-price" placeholder="Įvesti kainą">
                            </div>

                            <div class="form-group">
                                <label for="product-count">Kiekis</label>
                                <input type="text" value="{{ old('count') }}" name="count" class="form-control" id="product-count" placeholder="Įvesti kiekį">
                            </div>

                            <div class="form-group">
                                <label for="product-photo">Nuotrauka</label>
                                <input type="file" name="photo_path" class="form-control" id="product-photo">
                            </div>

                            <button type="submit" class="btn btn-primary">Išsaugoti</button>
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