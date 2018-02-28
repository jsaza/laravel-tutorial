@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table">
            <thread>
                <th>ID</th>
                <th>氏名</th>
                <th>金額</th>
                <th>カード</th>
                <th>状態</th>
                <th>操作</th>
            </thread>
            <tbody>
            @forelse ($chargeList->data as $key => $value)
            <tr>
              <td>
                <a href="{{URL::to("/view/".$value->id)}}">{{$value->id}}</a>
              </td>
              <td>
                {{$value->source->name}}
              </td>
              <td class="text-xs-center">&yen;{{$value->amount}}</td>
              <td class="text-xs-center">{{$value->source->brand}}</td>
              <td class="text-xs-center">
                @if($value->refunded==true)
                  払い戻し済み
                @else
                  @if($value->captured)
                    実売上
                  @else
                    仮売上
                  @endif
                @endif
              </td>
              <td class="text-xs-center">
                @if($value->refunded==false)
                  @if($value->captured==false)
                    <a href="{{URL::to("/capture/".$value->id)}}">実売上にする</a>
                    /
                  @endif
                  <a href="{{URL::to("/refund/".$value->id)}}">払い戻す</a>
                @endif
              </td>
            </tr>
            @empty
            @endforelse
            </tbody>
          </table>
        </div>
    </div>
</div>
@endsection
