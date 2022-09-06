@extends('layouts.app')

@section('title', 'Edit Item')

@section('content')
    <div class="container card p-2">
        <form action="/items/{{$item->uuid}}" method="post">
            @csrf
            @method('PATCH')

            {{-- item name --}}
            <div class="mb-3">
                <label for="item_name" class="form-lable">Item Name</label>
                <input type="text" name="item_name" id="item_name" class="form-control" value="{{$item->item_name}}">
                @error('item_name')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            {{-- item price --}}
            <div class="mb-3">
                <label for="item_price" class="form-lable">Item Price</label>
                <div class="input-group">
                    <div class="input-group-text">$</div>
                    <input type="text" name="item_price" id="item_price" class="form-control" value="{{$item->item_price}}">
                </div>
                @error('item_price')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            {{-- item description --}}
            <div class="mb-3">
                <label for="description" class="form-lable">Item Price</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="5">{{$item->description}}</textarea>
                @error('description')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            {{-- btn --}}
            <div class="my-3 d-flex justify-content-center">
                <a href="/items/create" class="btn btn-outline-dark w-25">Back</a>
                <button type="submit" class="btn btn-success offset-3 w-25">Update</button>
            </div>
        </form>
    </div>
@endsection
