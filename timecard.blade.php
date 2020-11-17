@extends('layout.index')
@section('content')
<style>
    .date {
        margin-top: 10px;
    }

    .date input {
        margin-left: 5px;
    }
</style>
<div class="col-md-offset-1 vlt-than">
    <section class="section-layout-1">
        <section class="hbox stretch">
            <div class="container">
                <div class="row">
                    <div class="row m-n">

                        <div id="menutop_thongke_doanhso" class="item-menu col-md-2 b-r m-t-xs m-b-xs  ">
                            <a target="_bank" href="#" onclick="event.preventDefault()">
                                <span class="i-s i-s-1-5x pull-left m-r-xs">
                                    <i class="i i-hexagon2 i-s-base text-success-lt hover-rotate"></i>
                                    <i class="fa fa fa-bar-chart-o text-white i-sm"></i>
                                </span>
                                <span class="clear">
                                    <span class="h5 block m-t-xs text-success">Thống kê</span>
                                    <small class="text-muted">Nhân sự</small>
                                </span>
                            </a>
                        </div>
                        <div id="menutop_chamcong" class="item-menu col-md-2 b-r m-t-xs m-b-xs">
                            @if (Auth::check())
                            <?php $id = Auth::user()->staff_id; ?>
                            @endif
                            <a href="staff/timecard/{{$id}}" class="block hover">
                                <span class="i-s i-s-1-5x pull-left m-r-xs">
                                    <i class="i i-hexagon2 i-s-base text-warning hover-rotate"></i>
                                    <i class="fa fa-check-circle text-white i-sm"></i>
                                </span>
                                <span class="clear">
                                    <span class="h5 block m-t-xs text-success">Chấm Công</span>
                                    <small class="text-muted">Điểm nhân sự</small>
                                </span>
                            </a>
                        </div>
                        <div class="col-md-12">
                            <?php

                            use Illuminate\Support\Facades\Auth;
                            use Illuminate\Support\Facades\DB;

                            $id = Auth::user()->staff_id;
                            ?>
                            <h1>CÔNG TY TNHH DOVA VIỆT NAM</h1>
                            <p><b>Tên nhân viên: </b>{{$staff->name}}</p>
                            <?php if (Auth::user()->type == 1) {
                                $office = "CEO";
                            }
                            if (Auth::user()->type == 2) {
                                $staff = DB::table('staff')
                                    ->where('id', $id)
                                    ->where('delete_status', 1)
                                    ->first();
                                $department = DB::table('department')
                                    ->where('id', $staff->department_id)
                                    ->where('delete_status', 1)
                                    ->first();
                                $office = "Leader của bộ phận $department->name";
                            }
                            if (Auth::user()->type == 3) {
                                $staff = DB::table('staff')
                                    ->where('id', $id)
                                    ->where('delete_status', 1)
                                    ->first();
                                $department = DB::table('department')
                                    ->where('id', $staff->department_id)
                                    ->where('delete_status', 1)
                                    ->first();
                                $office = "Nhân viên của bộ phận $department->name";
                            }
                            ?>
                            <p><b>Chức vụ: </b>{{$office}}</p>
                            <p><b>Địa chỉ : </b>Số 25,Thanh Bình, Hà Đông, Hà Nội</p>
                            <p><b>Email : </b>{{Auth::user()->email }}</p>
                            <p><b>Website : </b>www.dova-vn.com</p>

                        </div>
                    <div class="col-md-12" >
                        <div class="table-responsive listing">
                        <table class="table table-striped b-t b-light">
                                <thead class="thead-dark-one" >
                                    <tr class="text-center-a">
                                        <th class="td-b">STT</th>
                                        <th class="text-center-a">Ngày</th>
                                        <th class="text-center-a">Check in</th>
                                        <th class="text-center-a">Check out</th>
                                        <th class="text-center-a">Tổng thời gian(giờ)</th>
                                        <th class="text-center-a">Ghi chú</th>
                                        <th class="text-center-a">Chỉnh sửa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                                                        <!--------------- New -------------->

                                        <h2 class="center-one">BẢNG CHẤM CÔNG NHÂN SỰ CÔNG TY DOVA</h2>
                                    <!--------------- New -------------->

                                        <div class="div-month">
                                            <a class="month" href="staff/timecard/info/{{1}}">THÁNG 1 <b>|</b></a>
                                            <a class="month" href="staff/timecard/info/{{2}}">THÁNG 2 <b>|</b></a>
                                            <a class="month" href="staff/timecard/info/{{3}}">THÁNG 3 <b>|</b></a>
                                            <a class="month" href="staff/timecard/info/{{4}}">THÁNG 4 <b>|</b></a>
                                            <a class="month" href="staff/timecard/info/{{5}}">THÁNG 5 <b>|</b></a>
                                            <a class="month" href="staff/timecard/info/{{6}}">THÁNG 6 <b>|</b></a>
                                            <a class="month" href="staff/timecard/info/{{7}}">THÁNG 7 <b>|</b></a>
                                            <a class="month" href="staff/timecard/info/{{8}}">THÁNG 8 <b>|</b></a>
                                            <a class="month" href="staff/timecard/info/{{9}}">THÁNG 9 <b>|</b></a>
                                            <a class="month" href="staff/timecard/info/{{10}}">THÁNG 10 <b>|</b></a>
                                            <a class="month" href="staff/timecard/info/{{11}}">THÁNG 11 <b>|</b></a>
                                            <a class="month" href="staff/timecard/info/{{12}}">THÁNG 12 </a>
                                        </div>
                                    <!--------------- New -------------->
                                    <p class="Totaltime"><b>Tổng thời gian làm việc trong tháng: </b> giờ</p>
                                 <!--------------- New -------------->


                                    @foreach ($staff_timecard as $key=> $tc)
                                    <tr class="text-center">
                                        <td class="td-b">{{$key+1}}</td>
                                        <td class="td-a">{{date('d-m-Y',strtotime($tc['day']))}}</td>
                                        @if($tc['timecard']!=null)
                                        <td>
                                            {{date('H:i',strtotime($tc['timecard']->check_in))}}
                                        </td>
                                        <td>
                                            @if ($tc['timecard']->check_out != null)
                                            {{date('H:i',strtotime($tc['timecard']->check_out))}}
                                            @endif
                                        </td>
                                        <td>
                                            <?php
                                            if ($tc['timecard']->check_out != null) {
                                                $time1 = strtotime('08:00');
                                                $time2 = strtotime('12:00');
                                                $time3 = strtotime('13:30');
                                                $check_in = strtotime($tc['timecard']->check_in);
                                                $check_out = strtotime($tc['timecard']->check_out);

                                                if ($type_work == 1) {

                                                    $sum_time = abs($check_in - $check_out);
                                                    if ($sum_time >= 14400) {
                                                        echo 4;
                                                    }
                                                    if ($sum_time < 14400) {
                                                        echo $sum_time = ($sum_time - ($sum_time % 900)) / (900 * 4);
                                                    }
                                                }
                                                if ($type_work == 0) {
                                                    if ($check_in < $time1) {
                                                        $sum_time = abs($time1 - $check_out);
                                                    }
                                                    if ($check_in >= $time1) {
                                                        $sum_time = abs($check_in - $check_out);
                                                    }
                                                    if ($check_in <= $time2 && $check_out >= $time3) {
                                                        $sum_time = $sum_time - 5400;
                                                        echo $sum_time = ($sum_time - ($sum_time % 900)) / (900 * 4);
                                                    }
                                                    if ($check_in > $time2 || $check_out < $time3) {
                                                        echo $sum_time = ($sum_time - ($sum_time % 900)) / (900 * 4);
                                                    }
                                                }
                                            }
                                            //tính ra số giây được tính từ thời điểm 1970


                                            ?>
                                        </td>
                                        <td>
                                            {{$tc['timecard']->note}}
                                        </td>
                                        <td>
                                            <button onclick="editnote({{$tc['timecard']->id}})" href="#" class="btn btn-warning" value="{{$tc['timecard']->id}}">Ghi chú</button>
                                        </td>
                                        @endif
                                        @if($tc['timecard']==null)
                                        <td class="td-a"></td>
                                        <td class="td-a"></td>
                                        <td class="td-a"></td>
                                        <td class="td-a"></td>
                                        <td class="td-a"></td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
 <!---------------------------------Dưới------------------------------------------------------------------------------------------------------->
                <a class="btn btn-primary" style="width:200px" href="staff/exportExcel">Xuất file execl</a>

                <!-- The Modal -->
                <div class="modal fade" id="modal-editnote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thêm ghi chú</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="form-editnote" method="PUT">
                                    {{ csrf_field() }}
                                    <div>
                                        <input type="text" id="note" value="" name="note">
                                    </div>
                                    <input id="idUpdate" type="hidden" value="" name="update">
                                    <button type="submit" value="submit" id="submit" class="btn btn-danger">Lưu ghi chú</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</div>
@endsection
@section('script')
<script>
    function editnote(tc_id) {
        $.ajax({
            type: 'GET',
            url: 'editnote/' + tc_id,
            success: function(data) {
                //đưa dữ liệu controller gửi về điền vào input trong form edit.
                $("#form-editnote input[name=note]").val(data.tc_id.note);
                $("#form-editnote input[name=update]").val(data.tc_id.id);
                $('#modal-editnote').modal('show');
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#form-editnote').on('submit', function(e) {
            e.preventDefault();
            var id = $('#idUpdate').val();
            $.ajax({
                type: "PUT",
                url: 'editNote/edit/' + id,
                data: $("#form-editnote").serialize(),
                success: function(response) {
                    console.log(response);
                    location.reload();
                },

                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
@endsection