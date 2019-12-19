@extends('layouts.admin')




@section('content')


        <form action="{{route('socials.store')}}" method="post">
         {{csrf_field()}}

         <div class="form-group">
             <label for="name">Social Name </label>
             <input type="text" class="form-control"  name="name" placeholder="social name">

         </div>


         <div class="form-group">
             <label for="icon">Social Icon</label>
             <input type="text"  class="form-control" name="icon" placeholder="social icon">
             <div>
                 <code class="bg-danger">For Fontawesome code visit : http://fontawesome.io/icons/</code>
             </div>

         </div>

         <div class="form-group">
             <label for="link"> Social link</label>
             <input type="text" class="form-control" name="link" placeholder="Link of the social">

         </div>
         <div class="form-group">
             <button type="submit" class="btn btn-primary ">Create Social</button>
         </div>


     </form>

 @include('include.form_errors')
    @stop