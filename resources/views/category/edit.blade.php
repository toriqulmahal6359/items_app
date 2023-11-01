<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
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
                            <form method="POST" action="{{route('category.edit')}}">
                                @csrf
                                <input type="hidden" name="id" value={{$category->id}}/>
                                <div class="form-group p-2">
                                    <label class="fw-light m-1" for="name">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$category->name}}">
                                </div>
                                <button type="submit" class="btn btn-success p-2 ml-2 mt-3">Update Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>


