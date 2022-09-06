@extends('layouts.app')

@section('title', 'Item Overview')

@section('content')
    <div class="container d-flex p-2 card">
        @if ($items->isNotEmpty())
            @foreach ($items as $item)
                <div class="card p-1">
                    <form action="" method="post">
                        <div class="card card-title">{{$item->item_name}}</div>
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
