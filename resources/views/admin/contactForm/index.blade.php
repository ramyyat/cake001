@extends('admin.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Message from Contact Form</h2>
            </div>            
        </div>
    </div>   
       
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Type</th>
            <th>Message</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($messages as $message)
        <tr class="@if($message->isRead == 1) isread @endif">
            <td>{{ ++$i }}</td>
            <td>{{ $message->name }}</td>
            <td>{{ $message->phone }}</td>
            <td>{{ $message->type }}</td>
            <td>{{ $message->message }}</td>
            <td>
                <form action="{{ route('contactForm.destroy',$message->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('contactForm.show',$message->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('markAsRead',$message->id) }}">Mark As Read</a>
                       
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $messages->links('pagination::bootstrap-4') !!}
      
@endsection

