@extends('layouts.app')

@section('content')
    <div class="mtContact px-5">
       <table class="table table-hover">
           <thead>
               <tr>
                   <th>From</th>
                   <th>To</th>
                   <th>contact</th>
                   <th>dates : times</th>
                   <th></th>
               </tr>
           </thead>

           <tbody>
                @forelse($sends as $send)

                           <tr class="align-middle">
                               <td>{{ $send->from }}</td>
                               <td>{{ $send->to }}</td>
                               <td>new contact . . . .</td>
                               <td>{{ $send->created_at->format('d M Y') }}</td>
                               <td>
                                   <div class="d-flex align-items-center gap-2">
                                       <a href="{{route('send.show', $send->id)}}" class="btn btn-secondary"><i class="fa fa-info-circle"></i></a>
                                       <form action="{{ route('recieve') }}" method="post">
                                           @csrf
                                           <input type="number" name="contact_id" value="{{$send->contact_id}}" hidden>
                                           <input type="number" name="send_id" value="{{$send->id}}" hidden>
                                           <button class="btn btn-primary"><i class="fa fa-inbox"></i></button>
                                       </form>

                                       <form action="{{route('send.destroy', $send->id)}}" method="POST">
                                           @csrf
                                           @method('delete')
                                           <button class="btn btn-danger"><i class="fa fa-trash-can"></i></button>
                                       </form>

                                   </div>
                               </td>
                           </tr>

                    @empty

                        @endforelse
           </tbody>
       </table>
    </div>
@endsection


