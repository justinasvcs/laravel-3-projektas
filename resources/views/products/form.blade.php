@if($errors->any())
    <div class="alert alert-danger">

        @foreach($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
        @endforeach

    </div>
@endif

@csrf()

<div class="form-group">
    <label for="product-title">Pavadinimas</label>
    <input type="text" value="{{ old('title', @$product->title) }}" name="title" class="form-control" id="product-title" placeholder="Įvesti pavadinimą">
</div>

<div class="form-group">
    <label for="product-price">Kaina</label>
    <input type="text" value="{{ old('price', @$product->price) }}" name="price" class="form-control" id="product-price" placeholder="Įvesti kainą">
</div>

<div class="form-group">
    <label for="product-count">Kiekis</label>
    <input type="text" value="{{ old('count', @$product->count) }}" name="count" class="form-control" id="product-count" placeholder="Įvesti kiekį">
</div>

<div class="form-group">
    <label for="product-photo">Nuotrauka</label>
    <input type="file" name="photo_path" class="form-control" id="product-photo">
</div>

@if(isset($product))
    <img class="img-fluid" src="{{ Storage::url($product->photo_path) }}">
@endif

<button type="submit" class="btn btn-primary">Išsaugoti</button>