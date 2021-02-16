@extends('layouts.app')

@section('title',$topic->title)
@section('description',$topic->excerpt)

@section('content')

<div class="row">
  <div class="col-lg-3 col-md-3 hidden-sm hidden-xs author-info">
    <div class="card">
      <div class="card-body">
        <div class="text-center">
          作者：{{$topic->user->name}}
        </div>
        <hr>
        <div class="media">
          <div align="center">
            <a href="{{route('users.show',$topic->user->id)}}">
              <img src="{{$topic->user->avatar}}" class="thumbnail img-fluid" width="300px" height="300px">
            </a>
          </div>
        </div>
      </div>      
    </div>
  </div>

  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 topic-content">
    <div class="card">
      <div class="card-body">
        <h1 class="text-center">
          {{$topic->title}}
        </h1>

        <div class="text-center article-meta text-secondary">
          {{$topic->created_at->diffForHumans()}} * <i class="fa fa-comment"></i>{{$topic->reply_count}}
        </div>

        <div class="topic_body">
          {!!$topic->body!!}
        </div>

        <div>
          <hr>
          <a href="{{route('topics.edit',$topic)}}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-edit"></i>编辑</a>
          <a href="" class="btn btn-outline-secondary btn-sm"><i class="fa fa-trash-alt"></i>删除</a>
        </div>
      </div>
    </div>
  </div>  
</div>


@endsection
