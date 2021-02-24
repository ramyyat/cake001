@extends('admin.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Photo slider editor</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('photoslider.create') }}"> Create New Slide</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>title</th>
        <th>button title</th>
        <th>button link</th>
        <th>photo</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($PhotoSliders as $slide)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $slide->title }}</td>
        <td>{{ $slide->btn }}</td>
        <td>{{ $slide->btn_link }}</td>
        <td>
            <img src="{{asset('img/hero')}}/{{ $slide->photo }}" style="max-height: 70px; max-width: 120px;" alt="">    
        </td>
        <td>
            <form action="{{ route('photoslider.destroy',$slide->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('photoslider.show',$slide->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('photoslider.edit',$slide->id) }}">Edit</a>

                @csrf
                @method('DELETE')
  
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $PhotoSliders->links() !!}
  

@endsection