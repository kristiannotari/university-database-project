@extends('app') 
@section('title', 'Edit campaign') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Create campaign</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('campaign.create.action') }}">
                        @csrf @method('POST')

                        <input type="hidden" name="worker_id" value="{{ Auth::user()->id }}">

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Opening/Closing dates</label>

                            <div class="col-md-6">
                                <div class="input-group input-daterange" data-provide="datepicker" data-date-format="yyyy/mm/dd" data-date-start-date="0d">
                                    <input type="text" name="opening_date" class="form-control">
                                    <div class="input-group-addon">to</div>
                                    <input type="text" name="closing_date" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Signin period</label>

                            <div class="col-md-6">
                                <div class="input-group input-daterange" data-provide="datepicker" data-date-format="yyyy/mm/dd" data-date-start-date="0d">
                                    <input type="text" name="sign_in_period_open" class="form-control">
                                    <div class="input-group-addon">to</div>
                                    <input type="text" name="sign_in_period_close" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div id="required_workers" class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Required workers</label>

                            <div class="col-md-6">
                                <input type="range" class="custom-range" min="1" max="999" step="1" name="required_workers" required autofocus>
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>

                        <div id="threshold_percentage" class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Threshold Percentage</label>

                            <div class="col-md-6">
                                <input type="range" class="custom-range" min="0" max="100" step="0.5" name="threshold_percentage" required autofocus>
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection