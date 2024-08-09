@props(['Name',"Method",'data','categories',"count"=>"0"])

<form method="{{$Method}}" action="{{route($Name,$data)}}" enctype="multipart/form-data" style="margin-left:3% ">
 @isset($data)
 @method("PUT")   
 @endisset   
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input   type="text"  name="name" id="name"  class="form-control" placeholder="name" value="{{old('name', optional($data)->name)}}" />
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea type="text"  name="description"  id="description"  class="form-control" placeholder="description" cols="30" rows="10">{{old('description', optional($data)->quantity)}}</textarea>
    </div>
    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input   type="number"  name="quantity"  id="quantity"  class="form-control" placeholder="quantity" value="{{old('quantity', optional($data)->quantity)}}" />
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input   type="file"  name="image"   id="image" class="form-control"/>
        @if (!empty($data->image))
        <img src="/storage/{{$data->image}}"  loading="lazy" width="100px"> 
        @endif
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input   type="number" step="0.5"  id="name" name="prix"  class="form-control" placeholder="price"  value="{{old('prix', optional($data)->prix)}}" />
    </div>
    <div class="mb-3">
        <label for="category_id" class="form-label">category</label>
        <select class="form-select" name="category_id" id="category_id">
@foreach ($categories as $category)
<option @if (old('category_id', optional($data)->category_id) == $category->id) selected @endif value="{{$category->id}}">{{++$count}}-{{$category->name}}</option>
@endforeach
      </select>
    </div>
    <div class="mb-3">
<input type="submit" class="btn btn-primary" value="Add">


    </div>

</form>