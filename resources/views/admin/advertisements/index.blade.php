@extends('layouts.admin')


@section('content')
<table class="table table-hover">
     <thead>
     <tr>
        <th>#</th>
        <th>Ad Comapany</th>
         <th>Status</th>
      </tr>
     </thead>
    
    
      <tbody>
    @if($advertisements)
        @foreach($advertisements as $ad)
      <tr>
          <td>{{$ad->id}}</td>
          <td><a href="{{route('advertisements.edit',$ad->id)}}">{{$ad->ad_title}}</a></td>
          <td>{{$ad->is_active == 1 ? 'Active' :'Not Active'}}</td>
{{--          <td><img src="{{asset('images/'.$ad->ad_image)}}" alt=""></td>--}}
          <td>
               {!! Form::open(['method'=>'get', 'action'=>['AdminAdvertisementsController@edit',$ad->id]]) !!}

                   <div class="form-group">
                       <button type="submit" class="btn btn-info"><i class=" fas fa-edit"></i></button>
                   </div>
                {!! Form::close() !!}


          </td>
          <td>
              {!! Form::open(['method'=>'DELETE', 'action'=>['AdminAdvertisementsController@destroy',$ad->id]]) !!}

              <div class="form-group">
                  <button type="submit" class="btn btn-danger"><i class="  far fa-trash-alt"></i></button>
              </div>
              {!! Form::close() !!}


          </td>
      </tr>
        @endforeach
        @endif

    </tbody>
  </table>


@stop