@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Shop') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('shop.update', $shop->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="shop_name">{{ __('Shop Name') }}</label>
                            <input type="text" class="form-control" id="shop_name" name="shop_name" value="{{ $shop->shop_name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="details">{{ __('Details') }}</label>
                            <textarea class="form-control" id="details" name="details" rows="4" required>{{ $shop->details }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="address_line_1">{{ __('Address Line 1') }}</label>
                            <input type="text" class="form-control" id="address_line_1" name="address_line_1" value="{{ $shop->address_line_1 }}" required>
                        </div>

                        <!-- Add other form fields as needed -->

                        <button type="submit" class="btn btn-primary">{{ __('Update Shop') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
