@extends('admin.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div id="message"></div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Treatment Views
            </div>
            <div class="panel-body">
                <div id="treatment-content" class="table table-responsive">

                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function () {
            getTreatmentContent();
        });
        function getTreatmentContent() {
            $.ajax({
                type : 'get',
                url  : "{{route('view-treatment-content')}}",
                dataType : 'html',
                success:function (data) {
                    $('#treatment-content').html(data);
                    $('#treatmentViewTableCurrent').DataTable();
                }
            });
        }
        function turnOn(id) {
            $.ajax({
                type : 'get',
                url  : "{{url('/treatment/active/')}}"+"/"+id,
                dataType : 'html',
                success:function (data) {
                    getTreatmentContent();
                }
            });
        }
        function turnOff(id) {
            $.ajax({
                type : 'get',
                url  : "{{url('/treatment/deactive/')}}"+"/"+id,
                dataType : 'html',
                success:function (data) {
                    getTreatmentContent();
                }
            });
        }
    </script>
@endsection