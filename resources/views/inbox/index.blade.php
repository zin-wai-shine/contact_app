@extends('layouts.app')

@section('content')
    <div class="mtContact px-5">
       <div class="row">
           <div class="col-6">
               <table class="table table-hover">
                   <thead>
                   <tr>
                       <th>From</th>
                       <th><i class="fa fa-clock"></i></th>
                       <th></th>
                   </tr>
                   </thead>

                   <tbody>
                   @forelse($sends as $send)

                       <tr class="align-middle">
                           <td>{{ $send->from }}</td>
                           <td>
                               <div class="d-flex align-items-center gap-2">
                                   <i class="fa fa-calendar"></i>
                                   {{ $send->created_at->format('h : i : s A') }}
                               </div>
                               <div class="d-flex align-items-center gap-2">
                                   <i class="fa fa-calendar"></i>
                                   {{ $send->created_at->format('d / M / Y') }}
                               </div>
                           </td>
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
                        <tr>
                            <td colspan="3" class="text-center"><small>Empty Contact . . .🤕</small></td>
                        </tr>
                   @endforelse
                   </tbody>
               </table>
           </div>
       </div>
    </div>
@endsection


