@extends('layouts.app')

@section('title', 'Create Item')

@section('content')
    @if (session('success_create'))
        <div class="alert-success">{{session('success_create')}}</div>
    @endif
    <div class="container d-grid p-2">
        {{-- input     --}}
        <div class="my-3">
            <h3 class="text-center">Add Items</h3>
            <form action="/items" method="post">
                @csrf
                @method('post')
                <div class="mb-3">
                    <input type="text" name="item_name" id="item_name" class="form-control" value="{{old('item_name')}}">
                    <label for="item_name" class="text-muted form-label">Item Name</label>
                    @error('item_name')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="text" name="item_price" id="item_price" class="form-control" value="{{old('item_price')}}">
                    <label for="item_price" class="text-muted form-label">Price</label>
                    @error('item_price')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="description" id="description" cols="20" rows="3"></textarea>
                    <label for="description" class="text-muted form-label" value="{{old('description')}}">Description</label>
                    @error('description')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button class="btn btn-success">Create Item</button>
                </div>
            </form>
        </div>
        {{-- table --}}
        <table class="table table-hover">
            <thead class="bg-secondary text-light">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($items as $item)
                   <tr>
                        <td class="col-3">{{$item->item_name}}</td>
                        <td class="col-3">{{$item->item_price}}</td>
                        <td class="col-4">{{$item->description}}</td>
                        <td class="d-flex">
                            <a href="/items/{{$item->uuid}}/edit" class="btn btn-warning">Edit</a>
                            <form action="/items/{{$item->uuid}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger offset-4">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
