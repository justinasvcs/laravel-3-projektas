@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts</div>

                    <div>
                        <label>Pavadinimas</label>
                        <input type="text" name="title">
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