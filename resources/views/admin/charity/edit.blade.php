@extends('admin.layouts.app')

@section('title')

@endsection

@section('content')

    <section class="content-header">

        <h1>
            edit your case

        </h1>


    </section>
    <div class="container">


        <section class="content">

            <form method="POST" action="{{route('updateCase.charity',$case->id)}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">case description </label>
                    <textarea type="text" name="description" class="form-control">{{$case->description}}</textarea>
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">amount of Money </label>
                    <input type="number" name="amount" class="form-control" value="{{$case->amount}}">
                </div>

                <button type="submit" class="btn btn-primary">update</button>
            </form>

        </section>
    </div>

@endsection
