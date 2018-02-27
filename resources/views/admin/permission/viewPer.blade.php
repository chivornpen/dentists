@extends('admin.master')
@section('content')
<br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                Permission
            </div>
            <div class="panel-body container-fluid">
               <div class="row">
                   <div class="col-lg-12">
                        <div class="table-responsive" id="perList">
                        </div>
                   </div>
               </div>
            </div>
        </div>
    </div>    
@endsection
@section('script')
    <script>
        $(document).ready(function () { 
            getPerList();
            // $('#tblPermission').DataTable();
        });
        function getPerList() { 
            $.ajax({
                type:'GET',
                url:'{{url("/admin/permission/list")}}',
                dataType:'html',
                beforeSend:function () {  },
                success:function (data) { 
                    // console.log(data)
                    $('#perList').html(data)
                    // $('#tblPermission').DataTable();
                },
            })
        }
        function turnOn(id) { 
            $.ajax({
                type:'GET',
                url:'{{url("/admin/permission/on")}}'+'/'+id,
                beforeSend:function () {  },
                success:function (data) { 
                    // alert(data)
                    getPerList();
                },
            });
        }
        function turnOff(id) { 
            $.ajax({
                type:'GET',
                url:'{{url("/admin/permission/off")}}'+'/'+id,
                beforeSend:function () {  },
                success:function (data) { 
                    getPerList();
                },
            });
        }
    </script>
@endsection