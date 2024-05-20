@extends('backend.layouts.master')

@section('main-content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
            @include('backend.layouts.notification')
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Ligne detail Category Lists</h6>
      <a href="#" id="OpenModel" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add ligne detail Category</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($data)>0)
        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.N.</th>
              <th>body name</th>
              <th>heade name</th>

              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>S.N.</th>
              <th>Title</th>
              <th>Slug</th>

              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>

            @foreach($data as $item)
              @php
              @endphp
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->bodyname}}</td>
                    <td>{{$item->headename}}</td>


                    <td>
                        <a href="{{route('category.edit',$item->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                        <form method="POST" action="{{route('category.destroy',[$item->id])}}">
                            @csrf
                            @method('delete')
                          <button class="btn btn-danger btn-sm dltBtn" data-id={{$item->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
       {{--  <span style="float:right">{{$item->links()}}</span> --}}
        @else
          <h6 class="text-center">No Categories found!!! Please create Category</h6>
        @endif
      </div>
    </div>
</div>


<div class="modal fade" id="ModalAddBodyCategory" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="ModalAddBodyCategory" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="">Body Category</label>
            <input type="text" class="form-control" id="bodyname">
        </div>

        <div class="form-group">
            <label for="">Header category</label>
            <select name="" id="headername" class="form-control">
                @foreach ($headerCategory as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success" id="submit">Submit</button>
        </div>
    </div>
  </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#OpenModel').on('click',function()
        {
            $('#ModalAddBodyCategory').modal("show");
        });
        $('#submit').on('click',function()
        {
            var header = $('#headername').val();
            var body    = $("#bodyname").val();
            $.ajax({
                type: "post",
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                url: "{{url('StoreBodyCategorys')}}",
                data:
                {
                    header : header,
                    name   : body,
                },
                dataType: "json",
                success: function (response)
                {
                    if(response.status == 200)
                    {
                        $("#bodyname").val("")
                        // mhm hta diiri had code ila bghiti diri refersh location.realod();
                        location.realod();
                    }
                }
            });
        });
    });
</script>
@endsection

@push('styles')
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
      }
  </style>
@endpush

@push('scripts')

  <!-- Page level plugins -->
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>

      $('#banner-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[3,4,5]
                }
            ]
        } );

        // Sweet alert

        function deleteData(id){

        }
  </script>
  <script>
      $(document).ready(function(){




        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
              var dataID=$(this).data('id');
              // alert(dataID);
              e.preventDefault();
              swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        swal("Your data is safe!");
                    }
                });
          })
      })
  </script>
@endpush
