@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <form class="card-block" method="post" action="{{URL::to("/payment")}}">
          {{ csrf_field() }}
            <input type="hidden" class="form-control" name="amount" placeholder="金額" value="{{$params['amount']}}" >
            <div class="card">
              <div class="card-header">カード情報入力</div>
              <div class="card-block">
                <fieldset>
                  <legend>CARD INFO</legend>
                  <p>{{$params['description']}}</p>
                  <div class="form-group">
                    <label>NAME</label>
                    <input type="text" class="form-control" name="name" placeholder="YOUR NAME" value="">
                  </div>
                  <div class="form-group">
                    <label>NUMBER</label>
                    <input type="text" class="form-control" name="number" placeholder="カード番号" value="" >
                  </div>
                  <div class="form-group">
                    <label>EXPIRE</label>
                    <div class="row">
                      <div class="col-lg-3">
                        <input type="number" class="form-control" name="exp_month" placeholder="月" value="">
                      </div>
                      <div class="col-lg-3">
                        <input type="number" class="form-control" name="exp_year" placeholder="年" value="">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>CVC</label>
                    <input type="number" class="form-control" name="cvc" placeholder="***" value="">
                  </div>
              </div>
              <div class="card-footer">
                <input type="submit" class="btn btn-block btn-danger" value="決済">
              </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
