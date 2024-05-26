@extends('layouts.master')
@section('css')

<!---Internal  Prism css-->
<link href="{{URL::asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
<!---Internal Input tags css-->
<link href="{{URL::asset('assets/plugins/inputtags/inputtags.css')}}" rel="stylesheet">
<!--- Custom-scroll -->
<link href="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Elements</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Tabs</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row opened -->
				<div class="row row-sm">


					<div class="col-xl-12">
						<!-- div -->
						<div class="card mg-b-20" id="tabs-style2">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Basic Style2 Tabs
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
								<div class="text-wrap">
									<div class="example">
										<div class="panel panel-primary tabs-style-2">
											<div class=" tab-menu-heading">
												<div class="tabs-menu1">

													<!-- Tabs -->
													<ul class="nav panel-tabs main-nav-line">
														<li><a href="#tab4" class="nav-link active" data-toggle="tab"> تفاصيل الفاتورة</a></li>
														<li><a href="#tab5" class="nav-link" data-toggle="tab">حالات الدفع</a></li>
														<li><a href="#tab6" class="nav-link" data-toggle="tab">المرفقات</a></li>
													</ul>
												</div>
											</div>

											<div class="panel-body tabs-menu-body main-content-body-right border">
												<div class="tab-content">
													<div class="tab-pane active" id="tab4">
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
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @php
                                                                    $i = 0;

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

                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
													</div>
													<div class="tab-pane" id="tab5">
														<p>dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
														<p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime</p>
														<p class="mb-0">placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>
													</div>
													<div class="tab-pane" id="tab6">
														<p>praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,</p>
														<p class="mb-0">similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
                    </div>
					</div>
					<!-- /div -->


					<!-- /div -->


					</div>

                </div>
				<!-- /row -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Jquery.mCustomScrollbar js-->
<script src="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- Internal Input tags js-->
<script src="{{URL::asset('assets/plugins/inputtags/inputtags.js')}}"></script>
<!--- Tabs JS-->
<script src="{{URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js')}}"></script>
<script src="{{URL::asset('assets/js/tabs.js')}}"></script>
<!--Internal  Clipboard js-->
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.js')}}"></script>
<!-- Internal Prism js-->
<script src="{{URL::asset('assets/plugins/prism/prism.js')}}"></script>
@endsection
