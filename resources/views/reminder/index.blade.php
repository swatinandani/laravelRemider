@extends('layouts.app')
@section('content')
<section class="section" id="list">
      
      <div class="row">
            <div class="col-12">
              
              <table class="table table-bordered" id="laravel_unique_slug_table">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Title</th>
                    
                     <th>Description</th>
                     <th>Date Time</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($data['reminder'] as $reminder)
                  <tr>
                     <td>{{ $reminder->id }}</td>
                     <td>{{ $reminder->title }}</td>
                  
                     <td>{{ $reminder->description }}</td>
                     <td>{{ $reminder->datetime }}</td>
                     <td>
                        <a href="{{ route('reminders.edit',['id'=>$reminder->id]) }}">Edit </a> 
                        <button href="javascript:void(0)" data-toggle="tooltip" data-route="{{route('reminders.destroy',['id'=>$reminder->id])}}" id="deleteProduct"  data-id="{{ $reminder->id }}" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</button> 
                                                       
                       
                    </td>
                   
                  </tr>
                  @endforeach
               </tbody>
              </table>
              {!! $data['reminder']->links() !!}
           </div> 
      </div>
</section>
@endsection

@section('scripts')
<script type="text/javascript">

$(document).ready(function() {


    $("#deleteProduct").click(function() {
     
        var id = $(this).data("id");
        confirm("Are You sure want to delete this Reminder!");
       
        $.ajax({
            type: "DELETE",
            url: $(this).data('route'),
            headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
            data: {
                    '_method': 'delete'
                  },
           
                  success: function (response, textStatus, xhr) {
                    alert(response)
                    window.location.replace('{{route("reminders.index")}}');
                   // window.location = window.location.origin+'/reminders';
                
                    
                  },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});

    

</script>
@endsection