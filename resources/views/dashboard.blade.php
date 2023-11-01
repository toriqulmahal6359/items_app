<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"> --}}


            {{-- </div>
        </div>
    </div> --}}
      <div class="col-md-10 offset-md-2 p-6">
        <div class="card">
            <div class="d-flex justify-content-end">
                <a href="{{url("/add-category")}}" style="text-decoration: none"><button class="btn btn-info p-2 m-3">Add Category</button></a>
            </div>
            <div class="card-body">       
              <table class="table table-striped" id="data_table" style="width: 100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->name}}</td>
                        <td>
                            <a href="/edit-category/{{$data->id}}"><button class="btn btn-success">Edit</button></a>
                            <a href="/delete-category/{{$data->id}}"><button class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            </div>
        </div>
</x-app-layout>

@section('container')
    @include('items.create')
@endsection

