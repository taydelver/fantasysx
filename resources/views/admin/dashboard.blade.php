@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Rider Import</div>
    
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form action="{{route('import.riders')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" class="form-control" name="filename" id="filename" required />
                        <button type="submit" class="btn btn-success">Import</button>
                    </form>
                    {{-- <form action="{{route('jobtest')}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Run Test</button>
                    </form> --}}
    
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Contests</div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Rd.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Location</th>
                        <th scope="col">Status</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($events as $event)
                        <tr>
                          <th scope="row">{{$event->round}}</th>
                          <td>{{$event->name}}</td>
                          <td>{{$event->date}}</td>
                          <td>{{$event->location}}</td>
                          <td>{{$event->status}}</td>
                          <td>
                          {{-- <a class="btn btn-primary" data-toggle="collapse" href="#eventContests{{$event->id}}" role="button" aria-expanded="false" aria-controls="eventContests{{$event->id}}">Contests</a> --}}
                          </td>
                        </tr>
                        <tr>
                          <td colspan="6">
                            <div id="eventContests{{$event->id}}">
                              @foreach ($event->contests as $contest)
                                <div class="flex">
                                  <div>
                                    <small>Name</small>
                                    <div>{{$contest->name}}</div>
                                  </div>
                                  <div>
                                    
                                  </div>
                                </div>
                              @endforeach
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
@endsection
