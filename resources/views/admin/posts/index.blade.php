@extends('layouts.admin')


@section('content')

    
        <div class="row">
                @if(Session::has('post_updated'))
            <div class="alert alert-success">
                <h2>{{session('post_updated')}}</h2>
                @endif   
            </div>
        </div>
     

       
        <div class="row">
                @if(Session::has('deleted_post'))
            <div class="alert alert-warning">        
                <h2>{{session('deleted_post')}}</h2>
                @endif
            </div>
        </div>

        <div class="row">
                @if(Session::has('created_post'))
            <div class="alert alert-warning">        
                <h2>{{session('created_post')}}</h2>
                @endif
            </div>
        </div>

        <script>
                var msg = '{{ Session::get('alert')}}';
                var exist = '{{Session::has('alert')}}';
                if(exist){
                  alert(msg);
                }
        </script>

    


<h1>Posts<h1>
        <div>
        <table class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Photo</th>
              <th>Owner</th>
              <th>Category</th>  
              <th>Title</th>
              <th>Body</th>
              <th>Post Link</th>
              <th>Comments</th>
              <th>Created</th>
              <th>Updated</th>
            </tr>
          </thead>
          <tbody>

              @if($posts)

              @foreach($posts as $post)
            <tr>  
              <td>{{$post->id}}</td>
              <td><img height="90" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""> </td>
              <td><a href="{{route('admin.posts.edit', $post->id ) }}">{{$post->user->name}}</a></td>
              <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>            
              <td>{{$post->title}}</td>
              <td>{{str_limit($post->body, 20)}}</td>
              <td><a href="{{route('home.post', $post->id )}}">View Post</a></td>
              <td><a href="{{route('admin.comments.show', $post->id) }}">View Comments</a></td>
              <td>{{$post->created_at->diffForHumans()}}</td>
              <td>{{$post->updated_at->diffForHumans()}}</td>
            </tr>
         
            @endforeach
            
            @endif
        </tbody>
    </table>


    
@stop 