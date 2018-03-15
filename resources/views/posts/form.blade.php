@if($errors->any())
    <div class="alert alert-danger">

        @foreach($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
        @endforeach

    </div>
@endif


@csrf() {{-- cross site resource forgery --}}

<div>
    <label>Pavadinimas</label>
    <input name="title" type="text" value="{{ old('title', @$post->title) }}">
</div>

<div>
    <label>Turinys</label>
    <textarea name="content">
        {{ old('content', @$post->content) }}
    </textarea>
</div>

<div>
    <label>Autorius</label>
    <input name="author" type="text" value="{{ old('author', @$post->author) }}">
</div>

<div>
    <label>Produktai</label>
    <select name="products[]" multiple>
        @foreach($products as $product)
        <option value="{{ $product->id }}">{{ $product->title }}</option>
        @endforeach
    </select>
</div>

<div>
    <input name="draft" type="hidden" value="0">
    <input name="draft" type="checkbox" value="1" @if(old('draft', @$post->draft) == false) checked @endif> Draft
</div>

<button type="submit">Išsaugoti</button>