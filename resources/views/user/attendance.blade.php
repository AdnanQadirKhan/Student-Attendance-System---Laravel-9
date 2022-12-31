@extends('user.layouts.main')


@section('content')

<div class="container-fluid">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Date</th>
            <th scope="col">Attendance</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($attendance as $at)
            <tr>
                <th scope="row">{{date('d-m-Y',strtotime($at->date))}}</th>
                <td>{{$at->status}}</td>
             
            </tr>
            @endforeach
            
        </tbody>
      </table>
</div>

@endsection