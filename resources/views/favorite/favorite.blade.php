@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-8">
        <?php  ?>
        <ul class="media-list">
        @foreach ($fav as $micropost)
            <li class="media">
                <div class="media-body">
                  <div>
                    <p>{!! nl2br(e($micropost->content)) !!}</p>
                  </div>
                    <div>
                      @if(Auth::user()->is_favoritting($micropost->id)) 
                            {{-- {!! Form::open(['route' => ['favorites.destroy', $micropost->id], 'method' => 'delete']) !!} --}}
                            {!! Form::open(['url' => route('favorites.destroy', ['id' => $micropost->id]), 'method' => 'delete']) !!}
                              {!! Form::submit('お気に入り解除', ['class' => 'btn btn-warning btn-xs']) !!}
                            {!! Form::close() !!}
                            
                          @else
                            {!! Form::open(['url' => route('favorites.store', ['id' => $micropost->id]), 'method' => 'post']) !!}
                              {!! Form::submit('お気に入り', ['class' => 'btn btn-default btn-xs']) !!}
                            {!! Form::close() !!}
                            
                      @endif
                      @if(Auth::user()->id == $micropost->user_id)
                        {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                          {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                      @endif
                    </div>
                </div>
            </li>
        @endforeach
        </ul>
        </div>
    </div>
@endsection