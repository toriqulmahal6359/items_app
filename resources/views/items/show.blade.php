<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Item Summary') }}
        </h2>
    </x-slot>

    <section style="padding-top:60px">
      <div class="container">
          <div class="row">
              <div class="col-md-8 offset-md-2 p-1">
                @foreach ($items as $item)
                    <div class="card m-2">
                        <div class="d-flex flex-row justify-between">
                            <img class="" src="{{$item->image}}" width="250vh" style="border-radius: 5px"/>
                            <div class="card-body">
                                <h5 class="card-title">{{$item->title}}</h5>                             
                                <strong>{{$item->category->name}}</strong>
                                <p class="card-text">{{$item->description}}</p>
                                <div class="d-flex flex-row justify-between items-center">
                                    <span>{{$item->price}}$</span>
                                    <div class="d-flex flex-row items-center">
                                        <a href="{{url('/edit/'.$item->id)}}" class="btn btn-success m-1">Edit</a>
                                        <a href="{{url('/delete/'.$item->id)}}" class="btn btn-danger m-1">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <input type="hidden" name="id" value={{$item->id}}/>
                @endforeach
            </div>  
        </div>       
    </section>

</x-app-layout>