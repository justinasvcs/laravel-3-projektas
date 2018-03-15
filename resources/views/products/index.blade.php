@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header  text-center">Visi produktai</div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nuotrauka</th>
                                <th scope="col">Pavadinimas</th>
                                <th scope="col">Kaina</th>
                                <th scope="col">Kiekis</th>
                                <th scope="col">Veiksmai</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>
                                    <img style="width: 80px; height: auto" src="{{ Storage::url($product->photo_path) }}">
                                </td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->count  }}</td>
                                <td>
                                    {{-- TODO: mygtukas "Redaguoti" --}}
                                    <a class="btn  btn-secondary" href="{{ route('products.edit', $product->id) }}">Redaguoti</a>

                                    {{-- TODO: mygtukas "Trinti" --}}
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        @csrf()
                                        @method('DELETE')

                                        <button class="btn  btn-danger" type="submit">Trinti</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>

                        {{ $products->links() }}

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