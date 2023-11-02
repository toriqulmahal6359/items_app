<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Item') }}
        </h2>
    </x-slot>


    <section style="padding-top:60px">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{route('items.edit')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value={{$id}}/>
                                <div class="form-group p-2">
                                    <label class="fw-light" for="title">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{$item->title}}">
                                </div>
                                <div class="form-group p-2">
                                    <label class="fw-light" for="description">Description</label>
                                    <textarea name="description" class="form-control" cols="30" rows="10">{{$item->description}}</textarea>
                                </div>
                                <div class="form-group p-2">
                                    <label class="fw-light" for="price">Price</label>
                                    <input type="number" class="form-control" name="price" placeholder="Enter Price" value="{{$item->price}}">
                                </div>
                                <div class="form-group p-2">
                                    <label class="fw-light" for="image">Image</label>
                                    <input type="file" class="form-control" name="image" value="{{$item->image}}">
                                    @if($item->image != '')
                                        <a href="{{asset($item->image)}}" target="_blank"><img width="100px" src="{{asset($item->image)}}"></a>
                                    @endif
                                </div>
                                <div class="form-group p-2">
                                    <label class="fw-light" for="category">Update Category</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value="">--Select an Option--</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" {{ $item->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <button type="submit" class="btn btn-success p-2 ml-2 mt-5">Update Item</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>

