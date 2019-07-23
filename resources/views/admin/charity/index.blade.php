@extends('admin.layouts.app')

@section('title')

@endsection

@section('content')

    <section class="content-header">

        <h1>
            write your case

        </h1>


    </section>
    <div class="container">


        <section class="content">

            <form method="Post" action="">
                <div class="form-group">
                    <label for="exampleInputEmail1">case description </label>
                    <textarea type="text" name="description" class="form-control" required></textarea>
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">amount of Money </label>
                    <input type="number" name="amount" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </section>
    </div>

@endsection
