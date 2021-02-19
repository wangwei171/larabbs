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

        @can('update',$topic)
        <div>
          <hr>
          <a href="{{route('topics.edit',$topic)}}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-edit"></i>编辑</a>
          <form action="{{route('topics.destroy',$topic->id)}}" method="post" style="display:inline-block;" onsubmit="return confirm('你确定要删除本条帖子吗？')">
          		{{csrf_field()}}
          		{{method_field('DELETE')}}
          	<button type="submit" class="btn btn-outline-secondary btn-sm">
          		<i class="fa fa-trash-alt"></i>删除
          	</button>
          </form>
        </div>
        @endcan
      </div>
    </div>

    <div class="card mt-4">
      <div class="card-body">
        @include('topics._reply_box',['topic' => $topic])
        @include('topics._reply_list',['replies' => $topic->replies()->with('user')->get()])
      </div>
    </div>
  </div>  
</div>


@endsection
