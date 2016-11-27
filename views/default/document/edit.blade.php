@extends('category::default.layout')

@section('body')

    <form action="{{route('documents.update',['document'=>$id])}}" method="post" @submit.prevent="store">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        {{method_field('put')}}
        @foreach($attributes as $attribute)
            {!! $attribute !!}
        @endforeach
        <div class="form-group">
            <button class="btn btn-success" type="submit">提交</button>
        </div>
    </form>
@endsection

