<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Items') }}
        </h2>
    </x-slot>

    <section style="padding-top:60px">
      <div class="container">
          <div class="column">
              <div class="d-flex flex-row flex-wrap col-md-8 offset-md-2 p-1">
                @foreach ($items as $item)
                  <div class="card m-2" style="width: 50vh">
                    <img class="" src="{{$item->image}}" width="auto" style="border-radius: 5px"/>
                    <div class="card-body">
                        <h5 class="card-title">{{$item->title}}</h5>
                        <p class="card-text">{{$item->description}}</p>
                        <div class="d-flex flex-row justify-between items-center">
                            <span>{{$item->price}}$</span>
                            <a href="#" class="btn btn-primary">Buy Now</a>
                        </div>
                    </div>
                  </div>
                @endforeach
                  
    </section>

</x-app-layout>