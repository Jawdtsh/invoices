

@extends('layouts.master')
@section('title')
    قائمة الفواتير
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة الفواتير</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex justify-content-between">
                            <a href="invoices/create" class="modal-effect btn  btn-primary" data-effect="effect-scale">اضافة
                                فاتورة</a>
                            {{-- <a href="createInvoicesRequest/create" class="modal-effect btn btn-sm btn-primary" style="color:white"><i class="fas fa-plus"></i>&nbsp; اضافة فاتورة</a>--}}
                        </div>

                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">رقم الفاتورة</th>
                                <th class="wd-20p border-bottom-0">تاريخ الفاتورة</th>
                                <th class="wd-15p border-bottom-0">تاريخ الاستحقاق</th>
                                <th class="wd-10p border-bottom-0">المنتج</th>
                                <th class="wd-25p border-bottom-0">القسم</th>
                                <th class="wd-15p border-bottom-0">الخصم</th>
                                <th class="wd-20p border-bottom-0">نسبة الضريبة</th>
                                <th class="wd-15p border-bottom-0">قيمة الضريبة</th>
                                <th class="wd-10p border-bottom-0">الاجمالي</th>
                                <th class="wd-25p border-bottom-0">الحالة</th>
                                <th class="wd-25p border-bottom-0">ملاحظات</th>
                                <th class="wd-25p border-bottom-0">التفاصيل</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 0;
//                                 var_dump( $invoicesCollections);
//
                            @endphp
                            @foreach ($invoicesCollections as $invoicesCollection)
                                @php
                                    $i++
                                @endphp
                                <tr>

                                    <td>{{ $i }}</td>
                                    <td>{{ $invoicesCollection->invoice_number }} </td>
                                    <td>{{ $invoicesCollection->invoice_Date }}</td>
                                    <td>{{ $invoicesCollection->Due_date }}</td>
                                    <td>{{ $invoicesCollection->product_id }}</td>
                                    <td>
                                        <a href="{{ url('invoices') }}/{{ $invoicesCollection->id }}">{{ $invoicesCollection->sections->section_name }}</a>
                                    </td>
                                    <td>{{ $invoicesCollection->Discount }}</td>
                                    <td>{{ $invoicesCollection->Rate_VAT }}</td>
                                    <td>{{ $invoicesCollection->Value_VAT }}</td>
                                    <td>{{ $invoicesCollection->Total }}</td>
                                    <td>{{ $invoicesCollection->statuses?->last()?->name }}</td>
                                    <td>{{ $invoicesCollection->note }}</td>
                                    <td>
                                        <a
                                           class="modal-effect btn btn-sm btn-info"
                                           href="{{ url('invoices') }}/{{ $invoicesCollection->id }}"><i> تفاصيل </i></a>


                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">اضافة قسم</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('sections.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">اسم القسم</label>
                            <input type="text" class="form-control" id="section_name" name="section_name">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">ملاحظات</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">تاكيد</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Basic modal -->


    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection




















