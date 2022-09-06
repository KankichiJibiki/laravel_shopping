@extends('layouts.app')

@section('title', 'Item Overview')

@section('content')
    <div class="itemDisplay container p-2 justify-content-center">
        @if ($items->isNotEmpty())
            @foreach ($items as $item)
                <div class="card p-1 text-center">
                    <form action="" method="post">
                        <div class="card card-title border-0">{{$item->item_name}}</div>
                        <div class="mb-2">Price {{$item->item_price}}</div>
                        <div>
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                            <a href="" class="btn btn-success">View Item</a>
                        </div>
                    </form>
                </div>
            @endforeach
        @else
            <div class="mx-auto">
                <h3 class="test center text-muted">No Item Yet</h3>
                <a href="/items/create" class="text-success">Create Items here</a>
            </div>
        @endif
    </div>
@endsection
